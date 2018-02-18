<?php


class Sessions
{
    // --? check ?? below
    /*
    private $signed_in = false;
    public $user_id;
    public $count;
    public $message;

    function __construct()
    {
        session_start();
        $this->visitor_count();
        $this->check_the_login();
        $this->check_message();
    }

    public function message($msg = '')
    {
        if (!empty($msg)) {
            return $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }

    }

    public function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = '';
        }
    }

    public function visitor_count()
    {
        if (isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;

    }

    private function check_the_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
    */

// for unauthorised users?


    static public function setMessage($msg)
    {
        $_SESSION['message'] = $msg;
    }

    static public function getMessage()
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            return $message;
        } else {
            return '';
        }
    }


    static public function start()
    {
        ob_start();
        session_start();
    }

    static public function end()
    {
        session_destroy();
    }

    static public function getAllProduct()
    {
        $sum = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $sum += $value['quantity'];
            }
        }
        return $sum;
    }

    static public function getProductsCount($id)
    {
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$id])) {
            return $_SESSION['cart'][$id]['quantity'];
        } else {
            return 0;
        }
    }

    static public function getProductsInCart()
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
    }

    static public function addToCart($id)
    {
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$id]) && isset($_SESSION['cart'][$id]['quantity'])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id]['quantity'] = 1;
        }
    }

    static public function removeFromCart($id)
    {
        $_SESSION['cart'][$id]['quantity']--;
        if ($_SESSION['cart'][$id]['quantity'] === 0) {
            unset($_SESSION['cart'][$id]);
        }
    }

    static public function emptyCart()
    {
        unlink($_SESSION['cart']);
    }
}


//$session = new Session();
//$message = $session->message();

