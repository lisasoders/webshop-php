<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . '/../classes/OrdersDatabase.php';


Template::header("My orders");


$orders_db = new OrdersDatabase();

$orders = $orders_db->get_all($_SESSION["user"]->id);

foreach ($orders as $order) : ?>
    <p> order id: <?= $order->id ?></p>
    <p> user id: <?= $order->user_id ?></p>
    <p> order status: <?= $order->status ?></p>
    <p> order date: <?= $order->date ?></p>

    
        <?php endforeach; ?>