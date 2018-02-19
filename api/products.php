<?php
include '../init.php';
$db = Database::instance();
$id = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (!is_numeric($id)) {
    $id = null;
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($id == null) {
        $products = $db->getAllProducts();
        header('HTTP/1.1 200 OK!');
        echo json_encode($products);
    } else {
        $product = $db->getProduct($id);
        header('HTTP/1.1 200 OK!');
        echo json_encode($product);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawInput = file_get_contents("php://input");
    $postData = json_decode($rawInput);
    $db->addProduct($postData->title, $postData->category_id, $postData->price, $postData->quantity, $postData->description, $postData->image);
    header('HTTP/1.1 200 OK!');
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $rawInput = file_get_contents("php://input");
    $postData = json_decode($rawInput);
    if ($id = null) {
        header('HTTP/1.1 400 CANT UPDATE WITHOUT ID ');
    } else {
       $res =  $db->updateProduct($postData->title, $postData->category_id, $postData->price, $postData->quantity,
            $postData->description, $postData->image, $id);
        header('HTTP/1.1 200 OK!');
        echo json_encode($postData);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if ($id == null) {
        header('HTTP/1.1 400 CANT DELETE WITHOUT ID ');
    } else {
        $db->deleteProduct($id);
        header('HTTP/1.1 200 OK!');
    }
}