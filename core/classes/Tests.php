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
                test_id,
                answers,
                points
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
            if(isset($solution[$q["id"]])){
                array_push($qs, ["question"=>$q,"solution" => $solution[$q["id"]]]);
            }else{
                array_push($qs, ["question"=>$q,"solution" => null]);
            }

        }
        return $qs;
    }

    function getNumberCorrect($data){
        $sql = "SELECT * FROM solution WHERE question_id = :id AND corect = 1";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        return $qry->rowCount();
    }

    function getSolutions($questions_id){
        $in_array=implode(",",$questions_id);
        $sql = "SELECT
                question_id,
                id
                -- corect
                FROM solution
                WHERE (corect = 1 AND question_id IN ({$in_array}))";

        $qry = $this->db->prepare($sql);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
    }

}