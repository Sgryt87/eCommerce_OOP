<?php
include "../init.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = Database::instance();
    $product = $db->getProduct($id);
    $quantity = $product->quantity;
    if ($quantity > Sessions::getProductsCount($id)) {
        Sessions::addToCart($id);
        echo json_encode(Sessions::getProductsCount($id));
    } else {
        header('HTTP/1.1 400 Bad Request');
    }
}