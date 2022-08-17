<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';

$db = new ProductsDatabase();

$product = $db->get_single($_GET['id']);
?>

<div>
    <h1><?= $product->title ?></h1>
    <p>
        <?= $product->description ?>
        <?= $product->price ?>
    </p>
</div>