<?php
abstract class FactoryAbstract
{
    protected static $instances = array();

    public static function getInstance()
    {
        $className = static::getClassName();
        if(!(self::$instances[$className] instanceof $className)) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }

    public static function removeInstance()
    {
        $className = static::getClassName();
        if(array_key_exists($className, self::$instances)) {
            unset(self::$instances[$className]);
        }
    }

    final protected static function getClassName()
    {
        return get_called_class();
    }

    public function __construct()
    {}
    public function __sleep()
    {}
    public function __clone()
    {}
    public function __wakeup()
    {}
}

abstract class Factory extends FactoryAbstract
{
    final public static function getInstance()
    {
        return parent::getInstance();
    }

    final public static function removeInstance()
    {
        parent::removeInstance();
    }
}

class FirstProduct extends Factory
{
    public $a = [];
}

class SecondProduct extends FirstProduct
{

}

FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] =3;
SecondProduct::getInstance()->a[] = 4;
print_r(FirstProduct::getInstance()->a);
print_r(SecondProduct::getInstance()->a);
