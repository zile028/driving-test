<?php
class QueryBuilder extends Connection
{
    public function selectAll(string $table)
    {
        $sql = "SELECT * FROM {$table}";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        $result = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectSingle(string $table, $criteria)
    {
        $key = key($criteria);
        $sql = "SELECT * FROM {$table} WHERE {$key} = :{$key}";
        $qry = $this->db->prepare($sql);
        $qry->execute($criteria);
        $result = $qry->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectAllJoin(array $table, String $join_on)
    {
        $sql = "SELECT {$table[0]}.*, {$table[1]}.* FROM {$table[0]} JOIN {$table[1]} ON {$table[0]}.{$join_on} = {$table[1]}.id";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectSingleJoin(array $table, String $join_on, $criteria)
    {
        $key = key($criteria);
        $sql = "SELECT {$table[0]}.*, {$table[0]}.id {$table[0]}_id, {$table[1]}.* FROM {$table[0]} JOIN {$table[1]} ON {$table[0]}.{$join_on} = {$table[1]}.id WHERE {$table[0]}.{$key} = :{$key}";
        $qry = $this->db->prepare($sql);
        $qry->execute($criteria);
        $result = $qry->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

}