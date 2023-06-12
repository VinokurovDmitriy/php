<?php

class Product
{
    private static $instance;

    public $a;

    public static function getInstance()
    {
        if(!self::$instance instanceof  self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        //закрыто создание обьекта через конструктор
    }
    public function __sleep()
    {
        // закрыта сериализация
    }

    public function __clone()
    {
        // закрыто создание создание через клонирование
    }

    public function __wakeup()
    {
        // десиарилизация запрещена
    }
}

$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->a =  1;
$firstProduct->a =  2;

echo $firstProduct->a;
echo PHP_EOL;
echo $secondProduct->a;
