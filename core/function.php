<?php
function dd($arg)
{
    echo "<pre>";
    var_dump($arg);
    die();
    echo "</pre>";
}

function testInput($data)
{
    if (isset($data) || !empty($data)) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } else {
        return false;
    }
}

function errMesg($arg){
    if (isset($arg)) {
        echo "<p>" . $arg . "</p>";
    }
}