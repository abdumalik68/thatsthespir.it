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
    function post()
    { }
    function put()
    { }
    function delete()
    { }

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
