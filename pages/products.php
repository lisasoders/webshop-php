<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';


Template::header("Test Page");

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

foreach($products as $product) : ?>

<div>
    <b><?= $product->title ?></b>
    <i><?= $product->price ?></i>
    <img src="<?= $product->img_url ?>" alt="image">
</div>

<?php

endforeach;





Template::footer();