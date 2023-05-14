<?php
//мы не знаем какую фабрику использовать
//мы инкапсулируем логику выбора фабрики в абстрактном классе
class Config
{
    public static $factory = 1;
}

interface Product
{
    public function getName();
}

abstract class AbstractFactory
{
    /**
     * Возвращает фабрику
     */
    public static function getFactory()
    {
        if(Config::$factory ==  1) {
            return new FirstFactory();
        }
        return new SecondFactory();
    }

    abstract public function getProduct();
}

class FirstFactory extends AbstractFactory
{
    public function getProduct()
    {
        return new Pencil();
    }
}

class Pencil implements Product
{
    public function getName()
    {
        return "green pencil";
    }
}

class SecondFactory
{
    public function getProduct()
    {
        return new Pen();
    }
}
class Pen implements Product
{
    public function getName()
    {
        return "new Pen";
    }
}

$pencil = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$pen = AbstractFactory::getFactory()->getProduct();

echo $pencil->getName();
echo PHP_EOL;
echo $pen->getName();