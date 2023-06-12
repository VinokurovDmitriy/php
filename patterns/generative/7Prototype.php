<?php
//Некоторые объекты приходится создавать многократно. Есть смысл сэкономить на их инициализации,
// особенно, если инициализация требует времени и ресурсов. Прототип – это заранее инициализированный и сохранённый объект.
// В случае необходимости он клонируется:
class Factory
{
    private $pencil;
    public function __construct(ColorPencil $pencil)
    {
        $this->pencil = $pencil;
    }

    public function getProduct()
    {
        return clone $this->pencil;
    }
}

class ColorPencil
{
    public $color;
}

$prototypeFactory = new Factory(new ColorPencil());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->color = 'red pencil';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->color = 'green pencil';

echo $firstProduct->color;
echo PHP_EOL;
echo $secondProduct->color;