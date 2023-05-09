<?php

interface Product
{
    public function getName();
}


interface Factory
{
    public function getProduct();
}

class FirstFactory implements Factory
{
    public function getProduct()
    {
        return new Pencil();
    }
}

class SecondFactory implements Factory
{
    public function getProduct()
    {
        return new Pen();
    }
}

class Pencil implements Product
{
    public function getName()
    {
       return "red pencil";
    }
}

class Pen implements Product
{
    public function getName()
    {
        return "black pen";
    }

}

$firstFactory = new FirstFactory();
$firstFactoryProduct = $firstFactory->getProduct();
$secondFactory = new SecondFactory();
$secondFactoryProduct = $secondFactory->getProduct();
echo $firstFactoryProduct->getName();
echo PHP_EOL;
echo $secondFactoryProduct->getName();
