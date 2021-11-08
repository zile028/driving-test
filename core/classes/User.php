<?php
class User extends QueryBuilder
{



    public function validateData($user_data){

        foreach ($user_data as $key => $value) {
            echo $key . " - - " . $value . " | ".  empty($value)  . "<br>";
        }

        dd($user_data);
    }

    public function register($user_data)
    {
        $sql = "INSERT INTO users (first_name, last_name, date_birth, email, password) VALUES (:first_name, :last_name, :date_birth, :email, :password)";

        $query = $this->db->prepare($sql);
        
        $query->execute($user_data);
        dd($this->db);

    }
}