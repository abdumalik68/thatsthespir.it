<?php

class User
{
    public $quote;
    private $db;
    private $validation_rules = array(
        'email'     => 'required|valid_email',
        'password'  => '',
        'role'      => 'contains_list,admin;editor;subscriber',
        'image'     => 'valid_url',
        'url'       => '',
        'fullname'  => ''
    );
    private $filter_rules = array(
        'email'         => 'trim|sanitize_email',
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
    { }
    function put($f3, $params)
    { }
    function post($f3, $params)
    { }
    function delete($f3, $params)
    { }
}
