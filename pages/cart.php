<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Template.php';


$products = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

Template::header("Cart"); ?>

<div id="product-details" hidden>
    <img src="" id="product-img">
<p id="product-title"></p>
<p id="product-description"></p>
<p id="product-price"></p>
</div>

<div class='cart-items'>

<?php

foreach($products as $product) : ?>

    <div class='cart-product'>
    <img src="<?= $product->img_url ?>" alt="image" class='cart-img'>
    <a class='cart-title' href="single-product.php?id=<?= $product->id ?>">    <b><?= $product->title ?></b></a>
    <i class='cart-price'><?= $product->price ?> kr</i>

    </div>
    
    <?php
    
    endforeach; ?>

<div class='cart-total-checkout'>

    <form action="/shop2/scripts/post-create-order.php" method="post">

<input type="hidden" name="id" value="<?= $product->id ?>">
<input type="submit" value="Checkout" class="btn add-to-cart-btn">

</form>
    </div>

    </div>

    <?php
        
Template::footer();