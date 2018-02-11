<?php

class Template
{
    public static function header()
    {
        return include "includes/header.php";
    }

    public static function footer()
    {
        return include "includes/footer.php";
    }

    public static function top_nav()
    {
        return include "includes/top_nav.php";
    }

    public static function side_nav()
    {
        return include "includes/side_nav.php";
    }

    public static function slider()
    {
        return include "includes/slider.php";
    }
}