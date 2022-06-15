<?php
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';


Template::header("Test Page");

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

foreach($products as $product) : ?>

<div>
    <a href="single-product.php?id=<?= $product->id ?>">    <b><?= $product->title ?></b></a>
    <i><?= $product->price ?></i>
    <img src="<?= $product->img_url ?>" alt="image">

    <form action="../admin-scripts/delete-product.php" method='post'>
        <a href="edit-product.php?id=<?= $product->id ?>">Edit Product</a>
        <input type="hidden" name='id' value='<?= $product->id ?>'>
        <input type="submit" value='Delete' >
    </form>

    <form action="/shop2/scripts/post-add-to-cart.php" method="post">
    <input type="hidden" name="product-id" value="<?= $product->id ?>">
<input type="submit" value="Add to cart">
</form>
</div>

<?php

endforeach;





Template::footer();