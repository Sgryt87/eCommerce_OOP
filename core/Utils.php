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

    static public function redirectIfSet($key, $location)
    {
        if (!isset($_GET[$key])) {
            header("Location: $location");
        };
    }

    static public function redirect($location)
    {
        header("Location: $location");
    }
}