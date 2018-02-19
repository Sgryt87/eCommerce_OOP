<?php


class Cookie
{
    public static function expireAfter($time = 86400)
    {
        return time() + ($time * 30); // 1 month
    }

    public static function expireBefore($time = 86400)
    {
        return time() - ($time * 30);
    }

    public static function setCookie($name, $value)
    {
        setcookie($name, $value, self::expireAfter(), '/');
    }

    public static function unsetCookie($name)
    {
        setcookie($name, '', self::expireBefore(), '/');
    }

    public static function getCart()
    {
        if (isset($_COOKIE['cart'])) {
            return unserialize($_COOKIE['cart']);
        } else {
            return [];
        }
    }

    public static function setCart($cart_array)
    {
        $cart_string = serialize($cart_array);
        self::setCookie('cart', $cart_string);
    }

    public static function addProduct($id)
    {
        $cart_array = self::getCart();
        if (isset($cart_array[$id])) {
            $cart_array[$id]++;
        } else {
            $cart_array[$id] = 1;
        }
        self::setCart($cart_array);
    }

    public static function removeProduct($id)
    {
        $cart_array = self::getCart();
        if (isset($cart_array[$id])) {
            $cart_array[$id]--;
            if ($cart_array[$id] == 0) {
                unset($cart_array[$id]);
            }
        }
        self::setCart($cart_array);
    }

    static public function getAllProductCount()
    {
        $sum = 0;
        $cart_array = self::getCart();
        foreach ($cart_array as $key => $value) {
            $sum += $value;
        }
        return $sum;
    }

    static public function getAllProducts()
    {
        return self::getCart();
    }

    static public function getProductsCount($id)
    {
        $cart_array = self::getCart();
        if (isset($cart_array[$id])) {
            return $cart_array[$id];
        }
        return 0;
    }

    static public function emptyCart()
    {
        self::unsetCookie('cart');
    }
}