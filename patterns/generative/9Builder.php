<?php
//. Он полезен, когда мы хотим инкапсулировать создание сложного объекта. Мы просто расскажем фабрике, какому строителю доверить создание продукта:
class Product //какой то продукт
{
  private $name;

  public function setName($name)
  {
      $this->name = $name;
  }

  public function getName()
  {
      return $this->name;
  }
}

class Factory //фабрика
{
    private $builder; //мы не знаем какой именно буилдер

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->builder->buildProduct();
    }

    public function getProduct() // получаем продукт
    {
        return $this->builder->getProduct();
    }
}

abstract class Builder //абстрактный буилдер
{
    protected $product;

    final public function getProduct()
    {
        return $this->product;
    }

    public  function buildProduct()
    {
        $this->product = new Product();
    }
}

class FirstBuilder extends Builder
{
    public function buildProduct()
    {
        parent::buildProduct(); //создаетмся продукт в суперклассе
        $this->product->setName('produced of first builder'); //присваивсется имя методом суперкласса
    }
}

class SecondBuilder extends Builder
{
    public function buildProduct()
    {
        parent::buildProduct();
        $this->product->setName('produced of second builder');
    }
}

$firstDirector = new Factory(new FirstBuilder());
$secondDirector = new Factory(new SecondBuilder());

echo $firstDirector->getProduct()->getName();
echo PHP_EOL;
echo $secondDirector->getProduct()->getName();
