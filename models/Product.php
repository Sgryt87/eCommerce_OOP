<?php

class Product
{
    public static $table_name = 'products';

    public $id;
    public $title;
    public $category_id;
    public $price;
    public $quantity;
    public $description;
    public $image;
    public $created;
    public $modified;

}