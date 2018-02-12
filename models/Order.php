<?php

class Order
{
    public static $table_name = 'orders';

    public $id;
    public $price;
    public $transaction;
    public $status;
    public $currency;
}