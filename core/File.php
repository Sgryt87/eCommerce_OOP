<?php


class File
{
    public static function delete($name)
    {
        unlink($name);
    }

    public static function makeImageUnique($image)
    {
        return time() . '_' . $image;
    }

    public static function uploadProductImage($tmp_image, $image)
    {
        move_uploaded_file($tmp_image, Config::getMediaProductRoot() . $image);
    }

    public static function uploadUserImage($tmp_image, $image)
    {
        move_uploaded_file($tmp_image, Config::getMediaUserRoot() . $image);
    }

    public static function deleteProductImage($name)
    {
        self::delete(Config::getMediaProductRoot() . $name);
    }

    public static function deleteUserImage($name)
    {
        self::delete(Config::getMediaUserRoot() . $name);
    }
}