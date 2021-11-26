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
                answers,
                points
                FROM question";

        if (isset($data)) {
            $sql .= " WHERE test_id = :id";
        }
        $qry = $this->db->prepare($sql);
        if (isset($data)) {
            $qry->execute($data);
        } else {
            $qry->execute();
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
            t.test_name,
            COUNT(tq.test_id) number_question
            FROM tests t
            JOIN test_category tc ON t.category_id = tc.id
            JOIN test_question tq ON t.id = tq.test_id
            GROUP BY tq.test_id
            ";
        $qry = $this->db->prepare($sql);
        $qry->execute();
        $result = $qry->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
        return $result;

    }

    public function avalibleQuestion($data)
    {

        $sql = "SELECT
        q.id,
        q.question,
        q.points
        FROM question q
        WHERE q.id NOT IN (SELECT question_id FROM test_question WHERE test_id = :test_id)
        ";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        $unused_question = $qry->fetchAll(PDO::FETCH_ASSOC);
        $result          = $unused_question;

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

    public function testInfo($data)
    {
        $sql = "SELECT
                t.id,
                t.test_name,
                tc.category_name,
                COUNT(tq.test_id) number_questions,
                SUM(tq.points) max_points
                FROM tests t
                LEFT JOIN test_question tq ON t.id = tq.test_id
                JOIN test_category tc ON tc.id = t.category_id
                WHERE t.id = :id
                GROUP BY t.id
                ";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);

        $result = $qry->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    function previewTest($data){

        $sql = "SELECT
                ut.*,
                tc.category_name,
                COUNT(tq.test_id) number_questions,
                SUM(tq.points) max_points,
                t.test_name
                FROM user_test ut
                JOIN tests t ON ut.test_id = t.id
                LEFT JOIN test_question tq ON t.id = tq.test_id
                JOIN test_category tc ON tc.id = t.category_id
                WHERE ut.id = :id
                GROUP BY ut.id";
        $qry = $this->db->prepare($sql);
        $qry->execute($data);
        $info =$qry->fetch(PDO::FETCH_ASSOC);

        // $sql = "SELECT
        //         ut.*,
        //         tc.category_name,
        //         COUNT(tq.test_id) number_questions,
        //         SUM(tq.points) max_points,
        //         t.test_name
        //         FROM user_test ut
        //         JOIN tests t ON ut.test_id = t.id
        //         LEFT JOIN test_question tq ON t.id = tq.test_id
        //         JOIN test_category tc ON tc.id = t.category_id
        //         WHERE ut.id = :id
        //         GROUP BY ut.id";
        // $qry = $this->db->prepare($sql);
        // $qry->execute($data);
        // $info =$qry->fetch(PDO::FETCH_ASSOC);


        return ["info" => $info];

    }
}