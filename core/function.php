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
    echo "<br>-----------------------------------------";
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    echo "-----------------------------------------<br>";
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

function errMesg($arg)
{
    if (isset($arg)) {
        echo "<p>" . $arg . "</p>";
    }
}

function displayDate($arg)
{
    return date("d.m.Y", strtotime($arg));
}

function displayDateTime($arg)
{
    return date("d.m.Y H:i", strtotime($arg));
}

function redirect(string $location, string $query_string = null, string $go_to = null)
{
    $bookmark = is_null($go_to) ? "" : "#" . $go_to;
    $destination=$query_string . $bookmark;
    if (is_null($query_string)) {
        header("location: " . $location . $bookmark);
    } else {
        header("location: " . $location . "?" . $destination);
    }
}

function haveQryUrl()
{
    $url = $_SERVER["REQUEST_URI"];
    if (isset(parse_url($url)["query"])) {
        return true;
    }
    ;
    return false;

}