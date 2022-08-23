<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';


Template::header("Products");

$products_db = new ProductsDatabase();
$products = $products_db->get_all();
?>

<div class='products'>

<?php foreach($products as $product) : ?>

    

<div class='product'>
<div class='edit-delete'>
    <form action="../admin-scripts/delete-product.php" method='post'>
        <a href="edit-product.php?id=<?= $product->id ?>" class='edit-product material-symbols-outlined'>edit</a>
        <input type="hidden" name='id' value='<?= $product->id ?>'>
        <input type="submit" value='Delete' class="material-symbols-outlined bin-btn">
    </form>
</div>
<img src="<?= $product->img_url ?>" alt="image" class='product-img'>
    <a href="single-product.php?id=<?= $product->id ?>">    <b><?= $product->title ?></b></a>
    <i><?= $product->price ?> kr</i>

    <form action="/shop2/scripts/post-add-to-cart.php" method="post">
    <input type="hidden" name="product-id" value="<?= $product->id ?>">
<input type="submit" value="Add to cart" class='btn add-to-cart-btn'>
</form>



</div>

<?php

endforeach; ?>

</div>


<?php


Template::footer();