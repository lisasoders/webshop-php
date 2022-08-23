<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';

$db = new ProductsDatabase();

$product = $db->get_single($_GET['id']);

Template::header("Single product");
?>

<div class='single-product'>

<div>
<img src="<?= $product->img_url ?>" alt="image" class='single-img'>
</div>
<div class='single-info'>

<div class='edit-delete'>
    <form action="../admin-scripts/delete-product.php" method='post'>
        <a href="edit-product.php?id=<?= $product->id ?>" class='edit-product material-symbols-outlined'>edit</a>
        <input type="hidden" name='id' value='<?= $product->id ?>'>
        <input type="submit" value='Delete' class="material-symbols-outlined bin-btn">
    </form>
</div>

    <h1 class='single-title'><?= $product->title ?></h1>
    <p class='single-desc-price'>  <?= $product->price ?> kr</p>
    <p class='single-desc-price'>
        <?= $product->description ?>


    <form action="/shop2/scripts/post-add-to-cart.php" method="post">
    <input type="hidden" name="product-id" value="<?= $product->id ?>">
<input type="submit" value="Add to cart" class='add-to-cart-btn btn'>
</form>
    </p>

    </div>

    <?php

