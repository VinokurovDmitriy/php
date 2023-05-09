<?php
class Factory
{
    private static $products = array();

    public static function pushProduct(Product $product)
    {
        self::$products[$product->getId()] = $product;
    }

    public static function  getProduct($id)
    {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

    public static function removeProduct($id)
    {
        if(array_key_exists($id, self::$products[$id])) {
            unset(self::$products[$id]);
        }
    }
}

class Product
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}


Factory::pushProduct(new Product('first'));
Factory::pushProduct(new Product('second'));
print_r(Factory::getProduct('second')->getId());

