<?php

    require_once __DIR__ . '/../classes/Fruit.php';
    require_once __DIR__ . '/../classes/Template.php';


    Template::header("Test Page");
    Fruit::info_about_fruit(5);


    $my_fruit = new Fruit("apple", "red");

    $my_fruit->price = 10;

    //$my_fruit->name = "Apple";
    //$my_fruit->color = "Red";

    $my_fruit->intro();

   $my_strawberry = new Strawberry("Strawberry", "Red", "250");

    $my_strawberry->price = 5;
    $my_strawberry->berrynes = "300";

    var_dump($my_strawberry);

    $my_strawberry->intro();

    $my_strawberry->message();

    //var_dump($my_fruit);

    Template::footer();

    ?>