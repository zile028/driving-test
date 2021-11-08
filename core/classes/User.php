<?php
class User extends Connection
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function validateData($user_data){

        foreach ($user_data as $key => $value) {
            echo $key . " - - " . $value . " | ".  empty($value)  . "<br>";
        }

        dd($user_data);
    }

    public function register($user_data)
    {
        $sql = "INSERT INTO users (first_name, last_name, date_birth, email, password) VALUES (?, ?, ?, ?, ?)";

        $query = $this->db->prepare($sql);
        $query->bind_param("sssss",...$user_data);
        $query->execute();


    }
}