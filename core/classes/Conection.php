<?php

class Connection{

    public $db;
    public function __construct($database)
    {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $this->db = mysqli_connect($database["host"],$database["user"],$database["password"],
            $database["dbname"]) ;


        } catch (Exception $err) {
            //throw $th;
            die("Doslo je do greske. Nije moguce konektovati se sa bazom" . $err->getMessage());
        }
        mysqli_set_charset($this->db,"utf8mb4");
    }

    public static function connect($database)
    {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            return mysqli_connect($database["host"],$database["user"],$database["password"],
            $database["dbname"]) ;


        } catch (Exception $err) {
            //throw $th;
            die("Doslo je do greske. Nije moguce konektovati se sa bazom" . $err->getMessage());
        }
    }

}