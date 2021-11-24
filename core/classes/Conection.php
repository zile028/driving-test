<?php

class Connection
{

    public $db;
    public function __construct($database)
    {

        try {
            $this->db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database["user"], $database["password"]);
        } catch (PDOException $err) {
            //throw $th;
            die("Doslo je do greske. Nije moguce konektovati se sa bazom - " . $err->getMessage());
        }


    }

}