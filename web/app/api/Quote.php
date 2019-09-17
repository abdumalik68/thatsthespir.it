<?php

/**
 * Quote : Restful Template class
 *
 */
class Quote
{
    protected $default_fields = ['body', 'quote_id', 'fullname', 'slug', 'photo', 'author_slug', 'source', 'total'];
    public $quote;
    private $db;
    private $validation_rules = array(
        'quote'         => 'required|min_len,6',
        'author_id'     => 'required|integer',
        'source'        => 'required|valid_url',
        'submitted_by'  => 'required|integer'
    );
    private $filter_rules = array(
        'quote'         => 'trim|sanitize_string',
        'source'        => 'trim',
        'slug'          => 'trim|sanitize_string|slug',
    );

    function __construct()
    {
        global $f3, $db;
        $this->f3 = $f3;
        $this->db = $db;
        $this->quote = new DB\SQL\Mapper($db, 'quotes', null, $this->f3->DB_CACHE_EXPIRATION);
        $f3->set('CORS.origin', '*');
    }

    function get($f3, $params)
    {
        $this->quote = new DB\SQL\Mapper($this->db, 'all_quotes_full', null, $this->f3->DB_CACHE_EXPIRATION);

        $this->quote->load(
            array('quote_id=?', $params['id']),
            array(
                'limit' => 1
            )
        );
        if ($this->quote->dry()) {
            $f3->error(404, 'No record matching criteria');
        }

        // Fix missing slugs
        if (empty($this->quote->slug)) {
            $quote = new DB\SQL\Mapper($this->db, 'quotes');
            $quote->load(
                array('id=?', $params['id']),
                array(
                    'limit' => 1
                )
            );
            $this->quote->slug = $quote->slug = create_slug($quote->quote);
            $quote->save();
        }


        send_json($this->quote->cast());
    }
    function post($f3, $params)
    {
        /**
         * Create Element
         */
        if (!$f3->exists('POST')) {
            $f3->error(403, 'No data sent.');
        }

        $gump = new GUMP();
        // Prepare for slug creation, based on the quote itself
        $f3->set('POST.slug', $f3->get('POST.quote'));
        // sanitize
        $f3->POST = $gump->sanitize($f3->get('POST'));
        // validate
        $gump->validation_rules($this->validation_rules);
        // filter
        $gump->filter_rules($this->filter_rules);

        $validated_data = $gump->run($f3->POST);
        // execute
        if ($validated_data === false) {
            echo $gump->get_readable_errors(true);
        } else {
            // validation successful

            // Until Gump fixes its slug filter, we need this:
            if (empty($validated_data['slug'])) {
                $validated_data['slug'] = create_slug($validated_data['quote']);
            }

            $this->quote->copyfrom($validated_data);
            if (!$this->quote->save()) {
                $f3->error(410, 'Quote could not be saved.');
            } else {
                send_json(array('code' => 200, 'message' => 'Quote successfully created with id:' . $this->quote->id, 'data' => $this->quote->cast()));
            }
        }
        // return
    }
    function put($f3, $params)
    {
        /**
         * PUT request: Update Element
         */
        if (!$f3->exists('POST')) {
            $f3->error(403, 'No data sent.');
        }
        $this->quote->load(
            array('id=?', $f3->get('POST.id')),
            array(
                'limit' => 1
            )
        );
        if ($this->quote->dry()) {
            $f3->error(404, 'Could not update quote ' . $params['id'] . ': it does not exist.');
            exit;
        }
        $gump = new GUMP();
        // Prepare for slug creation, based on the quote itself
        $f3->set('POST.slug', $f3->get('POST.quote'));
        // sanitize
        $f3->PUT = $gump->sanitize($f3->get('POST'));
        // validate
        $validation_rules = $this->validation_rules;
        $validation_rules['id'] = 'required|numeric';
        $gump->validation_rules($validation_rules);
        $gump->filter_rules($this->filter_rules);

        $validated_data = $gump->run($f3->PUT);
        // execute
        if ($validated_data === false) {
            echo $gump->get_readable_errors(true);
        } else {

            // validation successful
            $this->quote->copyfrom($validated_data);
            if (!$this->quote->save()) {
                $f3->error(410, 'Quote could not be updated.');
            } else {
                send_json(array('code' => 200, 'message' => 'Quote successfully updated.'));
            }
        }
        // return

    }
    function delete($f3, $params)
    {
        $this->quote->load(
            array('id=?', $params['id']),
            array(
                'limit' => 1
            )
        );
        if ($this->quote->dry()) {
            $f3->error(404, 'Could not delete quote ' . $params['id'] . ': it does not exist.');
        } else {
            if (!$this->quote->erase()) {
                $f3->error(410, 'Quote matching id: ' . $params['id'] . ' does not exist or was previously deleted.');
            } else {
                send_json(array('code' => 200, 'message' => 'Quote ' . $params['id'] . ' successfully deleted.'));
            }
        }
    }

    function get_random($f3)
    {
        /** Random Quote */
        $this->quote = new DB\SQL\Mapper($this->db, 'all_quotes_full', $this->default_fields, 0);
        $this->quote->load(
            array('status=?', "online"),
            array(
                'order' => 'RAND()',
                'limit' => 1
            )
        );
        if ($this->quote->dry()) {
            $f3->error('No record matching criteria');
        }
        // Fix missing slugs by creating one and then saving it back in the db.
        if (empty($this->quote->slug)) {
            $quote = new DB\SQL\Mapper($this->db, 'quotes');
            $quote->load(
                array('id=?', $this->quote->quote_id),
                array(
                    'limit' => 1
                )
            );
            $this->quote->slug = $quote->slug = create_slug($quote->quote);
            $quote->save();
        }
        send_json($this->quote->cast());
    }
}
