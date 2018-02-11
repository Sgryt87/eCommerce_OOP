<?php

class Utils
{
    static public function shrinkString($text)
    {
        if (strlen(substr($text, 0, 100)) <= 100) {
            return substr($text, 0, 100) . '...';
        } else {
            return $text;
        }
    }

    static public function isSet($key)
    {
        if (!isset($_GET[$key])) {
            header('Location: ../index.php');
        };
    }
}