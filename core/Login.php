<?php


class Login
{
    public $user_id;
    private static $notifications = [];

    public static function db()
    {
        return Database::instance();
    }

    public static function getNotification($notification)
    {
        if (!in_array($notification, self::$notifications)) {
            $notification = '';
        }
        return "<span class='errorMessage'>$notification</span>";
    }

    public static function getCurrentUser()
    {
        $db = Database::instance();
        return $db->getUser(1);
    }

    public static function loginUser($username, $password)
    {
        $user = self::db()->getUserByUsername($username);
        if ($user == null) {
            array_push(self::$notifications, Notification::$loginError);
            return false;
        }

        if (password_verify($password, $user->password)) {
            Session::setUserIfLogged($user);
            return true;
        } else {
            array_push(self::$notifications, Notification::$loginError);
            return false;
        }
    }

    public static function logoutUser()
    {
        Session::end();
    }
}