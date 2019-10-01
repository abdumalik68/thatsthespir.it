<?php

/**
 * Author : Restful Template class
 *
 */
class Author
{
    public $db;
    public $author;
    public $f3;
    public $fields = '*';
    public $fields_r = [];

    private $validation_rules = array(
        'fullname'  => 'required|min_len,3',
        'photo'     => 'required',
        'gender'    => 'required|contains_list,m;f;unknown',
    );
    private $filter_rules = array(
        'fullname'  => 'trim|sanitize_string|ms_word_characters',
        'slug'      => 'trim|sanitize_string|slug',
        'photo'     => 'trim',
        'gender'    => 'trim'
    );
    public function beforeRoute(\Base $f3, $params)
    {
        // Allow remote ajax calls to this route.
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *, Content-Type, Authorization, X-Requested-With, tokenrequest, token, token-request');
        // Check if the resultset should be limited to specific columns.
        if ($f3->exists('GET.fields') && !empty($f3->get('GET.fields'))) {
            $this->fields = sanitize_for_sql($f3->get('GET.fields'));
            $this->fields_r = explode(',', $this->fields);
        }
    }
    function __construct()
    {
        global $f3, $db;
        $this->f3 = $f3;
        $this->db = $db;
        $this->author = new DB\SQL\Mapper($this->db, 'authors', null, $this->f3->DB_CACHE_EXPIRATION);
        $f3->set('CORS.origin', '*');
    }

    function get($f3, $params)
    {
        /** Read Author */
        $this->author->load(
            array('slug=?', $params['slug']),
            array(
                'limit' => 1
            )
        );
        if ($this->author->dry()) {
            $f3->error(404, 'No record matching criteria');
        }
        $author = $this->author->cast();

        if (in_array('quotes', $this->fields_r)) {
            $author['quotes'] = $this->get_quotes($f3, $params);
        }
        send_json($author);
    }
    public function get_quotes($f3, $params)
    {
        if (!isset($params['id']) || empty(trim($params['id']))) {
            return [];
        }
        $quotes = $this->db->exec('SELECT * FROM all_quotes_full WHERE author_id=?', $params['id'], $f3->DB_CACHE_EXPIRATION);
        return $quotes;
    }

    public function get_quotes_count($f3, $params)
    {
        if (!isset($params['id']) || empty(trim($params['id']))) {
            return [];
        }
        $count = $this->db->exec('SELECT count(*) as total FROM all_quotes_full WHERE author_id=?', $params['id']);
        return $count[0]['total'];
    }
    function put($f3, $params)
    {
        /** Update Author */
        /**
         * PUT request: Update Element
         */
        if (!$f3->exists('POST')) {
            $f3->error(403, 'No data sent.');
        }

        $this->author->load(
            array('id=?', $f3->get('POST.id')),
            array(
                'limit' => 1
            )
        );
        if ($this->author->dry()) {
            $f3->error(404, 'Could not edit author ' . $params['id'] . ': it does not exist.');
            exit;
        }
        $gump = new GUMP();
        // sanitize
        $f3->PUT = $gump->sanitize($f3->get('POST'));
        // validate
        $this->validation_rules['id'] = 'required|numeric';
        $gump->validation_rules($this->validation_rules);
        $gump->filter_rules($this->filter_rules);
        $validated_data = $gump->run($f3->PUT);
        // Until Gump fixes its slug filter, we need this:

        // execute
        if ($validated_data === false) {
            echo $gump->get_readable_errors(true);
        } else {
            // validation successful

            // Get Slug
            if (empty($validated_data['slug'])) {
                $validated_data['slug'] = create_slug($validated_data['fullname']);
            }

            // Get Quotes Total count
            $validated_data['total'] = $this->get_quotes_count($f3, $params);
            $this->author->copyfrom($validated_data);
            if (!$this->author->save()) {
                $f3->error(410, 'Author could not be updated.');
            } else {
                send_json(array('code' => 200, 'message' => 'Author successfully updated.', 'data' => $validated_data));
            }
        }
        // return
    }
    function post($f3, $params)
    {
        /** Create Author */

        if (!$f3->exists('POST')) {
            $f3->error(403, 'No data sent.');
        }

        $gump = new GUMP();
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
            // Until Gump fixes its slug filter, we need this:
            if (empty($validated_data['slug'])) {
                $validated_data['slug'] = create_slug($validated_data['fullname']);
            }
            // validation successful
            $this->author->copyfrom($validated_data);
            if (!$this->author->save()) {
                $f3->error(410, 'Author could not be saved.');
            } else {
                send_json(array('code' => 200, 'message' => 'Author successfully created with id:' . $this->author->id, 'data' => $this->author->cast()));
            }
        }
        // return
    }
    function delete($f3, $params)
    {
        /** Delete Author */

        $this->author->load(
            array('id=?', $params['id']),
            array(
                'limit' => 1
            )
        );
        if ($this->author->dry()) {
            $f3->error(404, 'Could not delete author ' . $params['id'] . ': it does not exist.');
        } else {
            if (!$this->author->erase()) {
                $f3->error(410, 'Author matching id: ' . $params['id'] . ' does not exist or was previously deleted.');
            } else {
                send_json(array('code' => 200, 'message' => 'Author ' . $params['id'] . ' successfully deleted.'));
            }
        }
    }

    function get_all_authors($f3, $params)
    {
        if (in_array('quotes', $this->fields_r)) { }
        $authors = $this->db->exec('SELECT * FROM authors WHERE total > 0 ORDER BY total DESC, slug ASC', NULL, $f3->DB_CACHE_EXPIRATION);
        if (in_array('quotes', $this->fields_r)) {
            foreach ($authors as $k => $v) {
                $authors[$k]['quotes'] = $this->get_quotes($f3, $v);
            }
        }
        send_json($authors);
    }
}
