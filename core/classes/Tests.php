<?php
class Tests extends QueryBuilder
{

    public function addOption($table, $data)
    {
        $sql = "INSERT INTO question_option (question_id, q_option, corect) VALUES (:question_id, :q_option, :corect)";

        $qry = $this->db->prepare($sql);
        $qry->execute($data);

        dd($data);
    }

    public function getQuestions($data)
    {

        $sql = "SELECT
                id,
                question,
                atach,
                test_id
                FROM question
                WHERE test_id = :id";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);

        $question = $qry->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT
                question_id,
                id,
                solution,
                corect
                FROM solution s
                ";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        $qs=[];
        $solution = $qry->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);

        foreach ($question as $q) {
            array_push($qs, ["question"=>$q,"solution" => $solution[$q["id"]]]);

        }

        return $qs;

    }

}