<?php

class User extends Database
{
    static public $table_name = 'users';

    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $password;
    public $role;
    public $email;
    public $image;


    public function isUserExists($username)
    {
        $query = "SELECT username FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function isEmailExists($email)
    {
        $query = "SELECT username FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

//    public function getUserPassword($id)
//    {
//        $this->getUser($id);
//        $user = self::instance();
//        return $user->password;
//    }

    public static function passwordHash($pass)
    {
        return $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' > 12]);
    }

//    public static function passwordVerify($pass)
//    {
//        return password_verify($pass, getUserPassword($id));
//    }
}