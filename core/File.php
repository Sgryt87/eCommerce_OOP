<?php


class File
{
    public static function delete($name)
    {
        unlink($name);
    }

    public static function deleteProductImage($name)
    {
        unlink(Config::getMediaProductRoot() . '/' . $name);
    }

    public static function deleteUserImage($name)
    {
        unlink(Config::getMediaUserRoot() . '/' . $name);
    }
}