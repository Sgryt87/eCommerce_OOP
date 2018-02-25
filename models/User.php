<?php

class User
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
    public $created;
    public $modified;



//    public function getUserPassword($id)
//    {
//        $this->getUser($id);
//        $user = self::instance();
//        return $user->password;
//    }



//    public static function passwordVerify($pass)
//    {
//        return password_verify($pass, $db_pass);
//    }
}