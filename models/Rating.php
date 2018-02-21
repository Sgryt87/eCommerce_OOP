<?php

class Rating
{
    public static $table_name = 'rating';

    public $id;
    public $product_id;
    //public $user_id; todo
    public $points;
    public $votes;
    public $created;
    public $modified;
}