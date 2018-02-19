<?php

include "../init.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = Database::instance();
    $product = $db->getProduct($id);
    $quantity = $product->quantity;
    $cart_quantity = Cookie::getProductsCount($id);
    if ($cart_quantity > 0) {
        Cookie::removeProduct($id);
        $productArray = [
            'id' => $id,
            'db_amount' => $quantity,
            'cart_amount' => $cart_quantity - 1,
            'total_amount' => Cookie::getAllProductCount() - 1
        ];
        echo json_encode($productArray);
    } else {
        header('HTTP/1.1 400 Bad Request');
    }
}