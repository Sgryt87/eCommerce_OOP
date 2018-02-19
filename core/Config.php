<?php

class Config
{
    public static function getRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/ecommerce_oop/'; // delete when deployed todo
    }

    public static function getAdminRoot()
    {
        return self::getRoot() . 'admin/';
    }

    public static function getMediaProductRoot()
    {
        return self::getRoot() . 'media/product_images/';
    }

    public static function getMediaUserRoot()
    {
        return self::getRoot() . 'media/user_images/';
    }

    public static function getMediaProductImageUrl()
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
        return $protocol . $_SERVER['HTTP_HOST'] . '/ecommerce_oop/media/product_images/';
    }
}