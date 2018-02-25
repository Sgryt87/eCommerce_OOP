<?php


class Review
{
    static public $table_name = 'reviews';

    public $id;
    public $product_id;
    public $user_id;
    public $rating_id;
    public $review;
    public $created;
    public $modified;
}


