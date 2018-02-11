<?php

include "../init.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (Sessions::getProductsCount($id) > 0) {
        Sessions::removeFromCart($id);
        echo json_encode(Sessions::getProductsCount($id));
    } else {
        header('HTTP/1.1 400 Bad Request');
    }
}