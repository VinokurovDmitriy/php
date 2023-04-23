<?php

class MessageType
{
    private $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __toString()
    {
        return $this->type;
    }

}
class Message
{
    private $id;
    private $text;
    private $db_connection_link;
    private $type;
    private $date;

    public function __construct($id, $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->type = new MessageType('email');
        $this->date = '2023-03-01';
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }


    public function __destruct()
    {
//        echo PHP_EOL . 'Вызывается во время уничтожения объекта...';
        // сохранение состояния объекта или другие действия
    }

    public function __toString()
    {
        return 'id = ' . $this->id . PHP_EOL . 'text: ' . $this->text . PHP_EOL . $this->type . PHP_EOL . $this->date;
    }

    public function __call($name, $data)
    {
        if(method_exists()){
            return call_user_func_array(array($this->location, $method), $parameters);
        }
        echo 'You call uncnown method ' . $name . ', with params: ' . implode(', ', $data);
    }

    public function __isset($name)
    {
        echo 'You try call undefined variable ' . $name;
    }

    public function __sleep()
    {
        return array($this->text, $this->id);
    }

    public function __wakeUp()
    {
        $this->db_connection_link = 'www.db.com';
    }

    public function __invoke()
    {
        echo 'You try call object as method';
    }

    public function __clone()
    {
        $this->type = new MessageType('skype');
        $this->date = date('Y-m-d');
    }

    public function __debugInfo()
    {
        return array(['id' => $this->id, 'php version' => 100]);
    }

    public static function __set_state($data)
    {
        $obj = new Message;
        $obj->id = $data['id'];
        $obj->text = $data['text'];
        return $obj;
    }
}

$message = new Message(1, 'Hi');
//$message->type = new MessageType('telegramm');
var_export($message);
//echo $message . PHP_EOL;
//$messageSkype = clone $message;
//echo $messageSkype;
//var_dump($message);
//echo $message;
//$message->id = 2;
//echo $message->id . PHP_EOL;
//echo $message->my_method(1, 'www');
//isset($message->test);