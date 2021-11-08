<?php
class QueryBuilder extends Connection
{

    protected $_db;
    public function __construct($db)
    {
        $this->db = $db;
    }

}