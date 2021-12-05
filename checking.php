<?php
require "core/init.php";

$data = json_decode($_POST["poslato"],true);
$question_id = $data["question_id"];
$solution = $data["solution_id"];
$result = $Tests->checkQuestion($question_id,$solution);
echo json_encode($result,JSON_PRETTY_PRINT);

?>