<?php

class Config
{
    public static function getRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getAdminRoot()
    {
        return self::getRoot() . '/admin';
    }

    public static function getMediaProductRoot()
    {
        return self::getRoot() . '/media/product_images';
    }

    public static function getMediaUserRoot()
    {
        return self::getRoot() . '/media/user_images';
    }
}