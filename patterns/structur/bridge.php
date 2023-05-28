<?php
//Шаблон «Мост» означает отделение абстракции от реализации, чтобы их обе можно было изменять независимо друг от друга.
abstract class WebPAge
{
    protected $theme;

    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    public function __set($name, $value)
    {
        if(isset($name)) {
            $this->theme = $value;
        }
    }

    public abstract function getContent();
}

class HomePage extends WebPAge
{
    public function getContent()
    {
        echo PHP_EOL . 'This is Home Ppage in ' . $this->theme->getColor();
    }
}

class AboutPage extends WebPAge
{
    public function getContent()
    {
        echo PHP_EOL . 'This is about page in ' . $this->theme->getColor();
    }
}


interface ThemeColor
{
    function getColor();
}

class DarkTheme implements ThemeColor
{
    function getColor()
    {
        return 'dark colors';
    }
}

class LightTheme implements ThemeColor
{

    function getColor()
    {
        return 'light color';
    }
}

$darkTheme = new DarkTheme();
$lightTheme = new LightTheme();

$homePage = new HomePage($darkTheme);
$homePage->getContent();
$homePage->theme = $lightTheme;
$homePage->getContent();

$aboutPage = new AboutPage($darkTheme);
$aboutPage->getContent();
$aboutPage->theme = $lightTheme;
$aboutPage->getContent();