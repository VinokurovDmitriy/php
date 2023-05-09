<?php
interface Product
{
    public function getName();
}
class Factory
{
    protected $firstProduct;
    protected $secondProduct;

    public function getFirstProduct()
    {
        if(!$this->firstProduct) {
            $this->firstProduct = new FirstProduct();
        }
        return $this->firstProduct;
    }

    public function getSecondProduct()
    {
        if(!$this->secondProduct) {
            $this->secondProduct = new SecondProduct();
        }
        return $this->secondProduct;
    }

}

class FirstProduct implements Product
{
    public function getName()
    {
        return " this first product";
    }
}

class SecondProduct implements Product
{
    public function getName()
    {
       return "this second product";
    }
}

$factory  = new Factory();
echo $factory->getFirstProduct()->getName();
echo $factory->getSecondProduct()->getName();
echo $factory->getFirstProduct()->getName();
