<?php

class Register
{
    /**
     * @var array
     */
    private static $data = array();

    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function get($name)
    {
        return isset(self::$data[$name]) ? self::$data[$name] : null;
    }

    public static function remove($key)
    {
        if(array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        }
    }
}

Register::set('host', 'www.ya.ru');
echo Register::get('host');
