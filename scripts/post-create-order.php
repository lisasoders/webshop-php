<?php

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/Order.php";

session_start();

$success = false;

if (isset($_SESSION["user"]) && isset($_SESSION["cart"])) {

    $user = $_SESSION["user"];
    $db = new OrdersDatabase();
    $date = date("Y-m-d");
    $status = "Beställd";
    $order = new Order($user->id, $status, $date);
    $success = $db->create($order);

}else{

    echo "Invalid input";

}

if($success){

    header("Location: /shop2/pages/products.php");
}

else{
    echo "Error saving order";
}