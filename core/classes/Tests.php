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

    public function getQuestions($data = null)
    {

        $sql = "SELECT
                id,
                question,
                atach,
                test_id,
                answers,
                points
                FROM question";

        if (isset($data)) {
            $sql .= " WHERE test_id = :id";
        }
        $qry = $this->db->prepare($sql);
        if (isset($data)) {
            # code...
            $qry->execute($data);
        } else {
            $qry->execute();
            # code...
        }

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
        $qs       = [];
        $solution = $qry->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);

        foreach ($question as $q) {
            if (isset($solution[$q["id"]])) {
                array_push($qs, ["question" => $q, "solution" => $solution[$q["id"]]]);
            } else {
                array_push($qs, ["question" => $q, "solution" => null]);
            }

        }
        return $qs;
    }

    public function getNumberCorrect($data)
    {
        $sql = "SELECT * FROM solution WHERE question_id = :id AND corect = 1";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        return $qry->rowCount();
    }

    public function isCorrect($id_solution)
    {
        $sql = "SELECT
                q.points
                FROM solution s
                JOIN question q
                ON q.id = s.question_id
                WHERE s.id = :id AND corect = 1";

        $qry = $this->db->prepare($sql);
        $qry->execute($id_solution);
        $result = $qry->fetch(PDO::FETCH_ASSOC);
        if ($qry->rowCount() == 1) {
            return ["result" => true, "points" => $result["points"]];
        } else {
            return ["result" => false];
        };
    }

    public function getSolutions($questions_id)
    {
        $in_array = implode(",", $questions_id);
        $sql      = "SELECT
                question_id,
                id
                -- corect
                FROM solution
                WHERE (corect = 1 AND question_id IN ({$in_array}))";

        $qry = $this->db->prepare($sql);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
    }

    public function getAllTests()
    {
        $sql = "SELECT
            tc.category_name,
            tc.icon,
            t.id,
            t.test_name
            FROM tests t
            JOIN test_category tc ON t.category_id = tc.id
            ";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        $result = $qry->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
        return $result;

    }

    public function getTestQuestions($data)
    {
        $sql = "SELECT
                q.id,
                q.question,
                q.atach,
                q.answers,
                q.points,
                tq.test_id

                FROM test_question tq
                JOIN question q
                ON tq.question_id = q.id
                WHERE tq.test_id = :test_id";


        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        $result = $qry->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}