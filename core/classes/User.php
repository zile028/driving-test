<?php
class User extends QueryBuilder
{
    public $register_status = null;
    public $register_msg    = null;
    public $login_msg       = null;

    public function register($user_data)
    {
        $check_exist = $this->selectSingle("users", ["email" => $user_data["email"]]);

        if (count($check_exist) == 0) {
            $sql   = "INSERT INTO users (first_name, last_name, date_birth, email, password) VALUES (:first_name, :last_name, :date_birth, :email, :password)";
            $query = $this->db->prepare($sql);
            $query->execute($user_data);
            if ($query) {
                $this->register_status = true;
                $this->register_msg    = "Uspesna registracija.";
            } else {
                $this->register_msg = "Registracija nije uspela.";
            }
        } else {
            $this->register_msg = "Korisnik sa ovom E-mail adresom vec postoji.";
        }
    }

    public function login($email, $password)
    {
        $get_user = $this->selectSingle("users", ["email" => $email]);
        if (!$get_user) {
            $this->login_msg = "Korisnik sa ovom E-mail adresom ne postoji";
        } else {
            $user_password = $get_user["password"];
            if (password_verify($password, $user_password)) {
                $_SESSION["id"]  = $get_user['id'];
                $this->login_msg = "Uspesno ste se logovali!";
                $sql = "UPDATE users SET last_login = NOW() WHERE id = :id";
                $query = $this->db->prepare($sql);
                $query->execute(["id"=>$get_user['id']]);
                return true;
            } else {
                $this->login_msg = "Email i password se ne podudaraju!";
                return false;
            }
        }
    }

    public function isLoged()
    {
        if (isset($_SESSION["id"])) {
            return true;
        } else {
            return false;
        }
    }

}