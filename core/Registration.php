<?php

class Registration
{
    private static $notifications = [];

    public static function db()
    {
        return Database::instance();
    }

    public static function register($username, $firstname, $lastname, $email, $password, $passwordConfirm)
    {
        self::validateUsername($username);
        self::validateEmail($email);
        self::validateFirstanme($firstname);
        self::validateLastname($lastname);
        self::validatePassword($password, $passwordConfirm);
        if (empty(self::$notifications) == true) {
            self::db()->addUser($username, $firstname, $lastname, self::passwordHash($password), $email);
        } else {
            return false;
        }
    }

    public static function getNotification($notification)
    {
        if (!in_array($notification, self::$notifications)) {
            $notification = '';
        }
        return "<span class='errorMessage'>$notification</span>";
    }

    private static function validateUsername($username)
    {
        if (empty($username)) {
            array_push(self::$notifications, Notification::$usernameReuired);
            return;
        }

        if (strlen($username) < 2 || strlen($username) > 25) {
            array_push(self::$notifications, Notification::$usernameLength);
            return;
        }

        if (self::db()->isUsernameExists($username)) {
            array_push(self::$notifications, Notification::$usernameExists);
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            array_push(self::$notifications, Notification::$usernameLettersAndWhiteSpace);
            return;
        }

    }

    private static function validateEmail($email)
    {
        if (empty($email)) {
            array_push(self::$notifications, Notification::$emailRequired);
            return;
        }

        if (self::db()->isUserEmailExists($email)) {
            array_push(self::$notifications, Notification::$emailExists);
            return;
        }

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            array_push(self::$notifications, Notification::$invalidEmail);
            return;
        }
    }


    private static function validateFirstanme($firstname)
    {
        if (empty($firstname)) {
            array_push(self::$notifications, Notification::$firstnameRequired);
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            array_push(self::$notifications, Notification::$firstnameLettersAndWhiteSpace);
            return;
        }
    }

    private static function validateLastname($lastname)
    {
        if (empty($lastname)) {
            array_push(self::$notifications, Notification::$lastnameRequired);
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            array_push(self::$notifications, Notification::$lastnameLettersAndWhiteSpace);
            return;
        }
    }

    private static function validatePassword($password, $passwordConfirm)
    {
        if (empty($password)) {
            array_push(self::$notifications, Notification::$passwordRequired);
            return;
        }

        if ($password != $passwordConfirm) {
            array_push(self::$notifications, Notification::$passwordDoesntMatch);
            return;
        }

        if (strlen($password) < 8 || strlen($password) > 25) {
            array_push(self::$notifications, Notification::$passwordLength);
            return;
        }

        if (!preg_match("#[0-9]+#", $password)) {
            array_push(self::$notifications, Notification::$passwordMustContainNumber);
            return;
        }

        if (!preg_match("#[A-Z]+#", $password)) {
            array_push(self::$notifications, Notification::$passwordMustContainCapLetter);
            return;
        }
    }

    public static function passwordHash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' > 12]);
    }
}