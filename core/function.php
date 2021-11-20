<?php
function dd($arg)
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die();
}

function vd($arg)
{
    echo "<pre>";
    var_dump($arg);
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

function displayDate($arg){
    return date("d.m.Y",strtotime($arg));
}

function displayDateTime($arg){
    return date("d.m.Y H:i",strtotime($arg));
}

function redirect ($location, $query_string=null){
    if(is_null($query_string)){
        header("location: " . $location);
    }else{
        header("location: " . $location . "?" . $query_string);
    }
}