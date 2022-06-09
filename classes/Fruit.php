<?php

class Fruit 
{
    public $name;
    public $color;
    public $price;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro()
    {
        echo "Fruit name {$this->name} and my color is {$this->color} and my price is {$this->price}";
    }

    public static function info_about_fruit($count)
    {
        echo "Fruits are good to eat and easy to throw away and there are {$count} fruits <br>";
    }
}

class Strawberry extends Fruit
{
    public $berrynes;

    public function __construct($name, $color, $berrynes)
    {
        $this->name = $name;
        $this->color = $color;  
        $this->berrynes = $berrynes;
    }
   

    public function message()
    {
        echo "I am a Strawberry";
    }
}