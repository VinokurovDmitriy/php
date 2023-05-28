<?php

//Шаблон «Адаптер» позволяет помещать несовместимый объект в обёртку, чтобы он оказался совместимым с другим классом.
interface connectUsb
{
    public function connectUsb();
}
class MicroSdCard
{
    private $size;
    public function __construct($size)
    {
        $this->size = $size;
    }

    public function __get($name)
    {
       return isset($this->$name) ? $this->$name : 'error';
    }

    public function copyData()
    {
        echo 'Данные успешно скопированы';
    }
}

class MicroMMCCard
{
    public $size = 200;
}



class CardReader implements connectUsb
{
    private $card;
    public function __construct($card)
    {
        $this->card = $card;
    }

    public function __set($name, $value)
    {
        if( isset($name)) {
            $this->$name = $value;
        }
    }

    public function connectUsb()
    {
        echo PHP_EOL . 'Карта ' . $this->card->size . ' успешно вставлена';
    }
}

$microSd = new MicroSdCard(10000);
$cardReader = new CardReader($microSd);
$cardReader->connectUsb();

$mmc = new MicroMMCCard();
$cardReader->card = $mmc;
$cardReader->connectUsb();



