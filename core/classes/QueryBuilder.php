<?php
class QueryBuilder extends Connection
{
    public function selectAll(string $table, array $criteria = [])
    {
        $sql = "SELECT * FROM {$table}";
        if (count($criteria) > 0) {
            $key = key($criteria);
            $sql .= " WHERE {$key} = :{$key}";
        }
        $qry = $this->db->prepare($sql);
        if (count($criteria) > 0) {
            $qry->execute($criteria);
        } else {
            $qry->execute();
        }
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

    public function selectAllJoin(array $table, String $join_on, String $order = null)
    {
        $sql = "SELECT
                {$table[0]}.*,{$table[0]}.id {$table[0]}_id, {$table[1]}.*
                FROM {$table[0]}
                JOIN {$table[1]}
                ON {$table[0]}.{$join_on} = {$table[1]}.id";
        if (isset($order)) {
            $sql .= " ORDER BY {$order}";
        }
        $qry = $this->db->prepare($sql);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectSingleJoin(array $table, String $join_on, $criteria)
    {
        $key = key($criteria);
        $sql = "SELECT
                {$table[0]}.*, {$table[0]}.id {$table[0]}_id, {$table[1]}.*
                FROM {$table[0]}
                JOIN {$table[1]}
                ON {$table[0]}.{$join_on} = {$table[1]}.id
                WHERE {$table[0]}.{$key} = :{$key}";

        $qry = $this->db->prepare($sql);
        $qry->execute($criteria);
        $result = $qry->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function insertInto($table, $data)
    {

        $column = [];
        $value  = [];
        foreach ($data as $key => $val) {
            array_push($column, $key);
            array_push($value, ":" . $key);
        };
        $col_name          = implode(", ", $column);
        $value_placeholder = implode(", ", $value);
        $sql               = "INSERT INTO {$table} ({$col_name}) VALUES ({$value_placeholder})";

        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        return $this->db->lastInsertId();
    }

}