<?php

class Product extends Database
{
    public static $table_name = 'products';

    public $id;
    public $title;
    public $category_id;
    public $price;
    public $quantity;
    public $description;
    public $created;
    public $modified;

//    public function displayProductCategory($id)
//    {
//        $query = "SELECT title FROM categories WHERE id = $id";
//        $query = "SELECT username FROM users WHERE email = ?";
//        $stmt = $this->conn->prepare($query);
//        $stmt->bindParam(1, $email, PDO::PARAM_STR);
//        $stmt->execute();
//        return $category->title
//    }
}