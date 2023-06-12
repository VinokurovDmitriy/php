<?php

interface IComponent
{
    function getPrice();
}

class Ingradient implements IComponent
{
    public $name;
    protected $price;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    function getPrice()
    {
        echo $this->name . ' = ' . $this->price . PHP_EOL;
        return $this->price;
    }
}


class Product implements IComponent
{
    public $name;
    protected $children = array();
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addChild($child)
    {
        $this->children[$child->name] = $child;
    }

    public function removeChild($child)
    {
        unset($this->children[$child->name]);
    }

    public function getPrice()
    {
        $result = 0;
        foreach ($this->children as $item) {
            $itemPrice = $item->getPrice();
            $result += $itemPrice;
        }

        return $result;
    }
}

$ingradientA = new Ingradient('Шоколад', 10);
$ingradientB = new Ingradient('Коржи', 12);
$ingradientC = new Ingradient('Крем', 13);
$ingradientE = new Ingradient('Напиток', 2);
$ingradienF = new Ingradient('Красивая обертка', 4);

$product1 = new Product('Торт');
$product1->addChild($ingradientA);
$product1->addChild($ingradientB);
$product1->addChild($ingradientC);

echo 'Итого ' . $product1->name . ': ' . $product1->getPrice() . PHP_EOL . PHP_EOL;

$product2 = new Product('Праздничный торт');
$product2->addChild($product1);
$product2->addChild($ingradientE);
$product2->addChild($ingradienF);

echo 'Итого ' . $product2->name . ': ' . $product2->getPrice()  . PHP_EOL . PHP_EOL;

$product2->removeChild($ingradientE);
echo 'Итого ' . $product2->name . ': ' . $product2->getPrice();

