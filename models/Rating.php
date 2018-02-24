<?php

class Rating
{
    public static $table_name = 'ratings';

    public $id;
    public $product_id;
    public $user_id;
    public $points;
    public $created;
    public $modified;
}