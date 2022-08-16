<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../scripts/delete-from-cart.php';

$products = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

Template::header("Cart"); ?>

<div id="product-details" hidden>
    <img src="" id="product-img">
<p id="product-title"></p>
<p id="product-description"></p>
<p id="product-price"></p>
</div>

<?php

foreach($products as $product) : ?>

    <div>
    <a href="single-product.php?id=<?= $product->id ?>">    <b><?= $product->title ?></b></a>
    <i><?= $product->price ?></i>
    <img src="<?= $product->img_url ?>" alt="image">

    <form action="/shop2/scripts/delete-from-cart.php" method="post">
    <input type="hidden" name="product-id" value="<?= $product->id ?>">
<input type="submit" value="delete from cart">
</form>
    
    </div>
    
    <?php
    
    endforeach; ?>

<div>
        <form action="" method="post">
            <input type="submit" value="Checkout">
        </form>
    </div>
        
Template::footer();