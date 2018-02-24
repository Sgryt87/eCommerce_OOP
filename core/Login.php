<?php


class Login
{
    public $user_id;

    public static function getCurrentUser()
    {
        $db = Database::instance();
        return $db->getUser(1);
    }
}