<?php

class Quote
{
    protected $selected_fields = 'SELECT q.id, q.id as quote_id, q.quote, q.source, q.status, q.creation_date, a.id as author_id, a.fullname,a.slug,a.photo,a.total,a.gender, tags_id, (SELECT group_concat(name) from tags as t where t.id=q.tags_id) as tags, (SELECT group_concat(fullname) FROM `favourites` LEFT JOIN users as u on u.email=favourites.user_email WHERE quote_id=q.id) as likers ';
    public $quote;

    function __construct()
    {
        global $f3, $db;
        $this->f3 = $f3;
        $this->quote = new DB\SQL\Mapper($db, 'all_quotes_full', null, $this->f3->DB_CACHE_EXPIRATION);
        $f3->set('CORS.origin', '*');
    }

    function get($f3, $params)
    {
        $this->quote->load(
            array('quote_id=?', $params['id']),
            array(
                'limit' => 1
            )
        );
        if ($this->quote->dry()) {
            $f3->error(404, 'No record matching criteria');
        }
        send_json($this->quote->cast());
    }
    function post($f3, $params)
    { }
    function put($f3, $params)
    {
        if (!$f3->exists('POST')) {
            $f3->error(403, 'No data sent.');
        }
        $gump = new GUMP();
        // Prepare for slug creation, based on the quote itself
        $f3->set('POST.slug', $f3->get('POST.quote'));
        // sanitize
        $f3->POST = $gump->sanitize($f3->get('POST'));
        // validate
        $gump->validation_rules(array(
            'quote'    => 'required|alpha_numeric|min_len,6',
            'author_id'    => 'required|integer',
            'source'       => 'required|valid_url',
            'tags_id'      => 'required|integer',
            'submitted_by' => 'required|integer'
        ));
        $gump->filter_rules(array(
            'quote' => 'trim|sanitize_string',
            'source'    => 'trim|sanitize_url',
            'slug'   => 'slug',
        ));

        $validated_data = $gump->run($f3->POST);
        // execute
        if ($validated_data === false) {
            echo $gump->get_readable_errors(true);
        } else {
            pr($validated_data);
            // validation successful
            $this->quote = $f3->copyFrom($validated_data);
            if (!$this->quote->save()) {
                $f3->error(410, 'Quote could not be saved.');
            } else {
                send_json(array('code' => 200, 'message' => 'Quote successfully created.'));
            }
        }
        // return

    }
    function delete($f3, $params)
    {
        $this->quote->load(
            array('quote_id=?', $params['id']),
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
        send_json($this->quote->cast());
    }
}
