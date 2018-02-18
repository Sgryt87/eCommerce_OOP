<?php
include "../init.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = Database::instance();
    $product = $db->getProduct($id);
    $quantity = $product->quantity;
    if ($quantity > Sessions::getProductsCount($id)) {
        Sessions::addToCart($id);
        $productArray = [
            'id' => $id,
            'db_amount' => $quantity,
            'cart_amount' => Sessions::getProductsCount($id),
            'total_amount' => Sessions::getAllProduct()
        ];
        echo json_encode($productArray);
    } else {
        header('HTTP/1.1 400 Bad Request');
    }
}