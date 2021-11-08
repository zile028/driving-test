<?php
class QueryBuilder extends Connection
{
    public $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
}