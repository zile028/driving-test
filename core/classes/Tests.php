<?php
class Tests extends QueryBuilder{

function addOption($table, $data){
    $sql               = "INSERT INTO question_option (question_id, q_option, corect) VALUES (:question_id, :q_option, :corect)";

        $qry = $this->db->prepare($sql);
        $qry->execute($data);

        dd($data);
}

function getSolution (){
    $sql = "SELECT 
            *
            FROM question
            ";
}


}
?>