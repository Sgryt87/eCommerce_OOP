<?php


class Sessions
{
    static public function start()
    {
        ob_start();
        session_start();
    }

    static public function end()
    {
        session_destroy();
    }

    static public function getProductsCount($id)
    {
        return $_SESSION['cart'][$id]['quantity'];
    }

    static public function getProductsInCart()
    {
        return $_SESSION['cart'];
    }

    static public function addToCart($id)
    {
        $_SESSION['cart'][$id]['quantity']++;
    }

    static public function removeFromCart($id)
    {
        $_SESSION['cart'][$id]['quantity']--;
    }

    static public function emptyCart()
    {
        unlink($_SESSION['cart']);
    }
}