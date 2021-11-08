<?php

class Connection
{

    public static function connect($database)
    {
        try {
            return new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database["user"], $database["password"]);

        } catch (PDOException $err) {
            //throw $th;
            die("Doslo je do greske. Nije moguce konektovati se sa bazom - " . $err->getMessage());
        }

        // mysqli_report(MYSQLI_REPORT_STRICT);

        // try {
        //     // $this->db = mysqli_connect($database["host"],$database["user"],$database["password"],
        //     // $database["dbname"]) ;
        //     return new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database["user"], $database["password"]);

        // } catch (PDOException $err) {
        //     //throw $th;
        //     die("Doslo je do greske. Nije moguce konektovati se sa bazom - " . $err->getMessage());
        // }
        // mysqli_set_charset($this->db,"utf8mb4");
    }

}