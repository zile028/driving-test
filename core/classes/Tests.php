<?php
class Tests extends QueryBuilder{

    function getQuestions(){
        $sql = "SELECT
                question.*,
                question.id q_id,
                option.*,
                option.id o_id
                FROM question q
                JOIN option o
                ON q.id = o.question_id
                WHERE
                ";
    }
}
?>