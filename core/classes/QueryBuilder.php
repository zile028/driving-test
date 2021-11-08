<?php
class QueryBuilder extends Connection
{

    // protected $db;
    // public function __construct($db)
    // {
    //     $this->db = $db;
    // }

    public function selectAll(string $table){
        $sql = "SELECT * FROM {$table}";
        $qry=$this->db->prepare($sql);
        $qry->execute();
        $result= $qry->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectSingle(string $table, $criteria){

        $key =  key($criteria);
        $sql = "SELECT * FROM {$table} WHERE {$key} = :{$key}";
        $qry=$this->db->prepare($sql);
        $qry->execute($criteria);
        $result= $qry->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}