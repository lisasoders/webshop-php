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

        <form action="../admin-scripts/delete-product.php" method='post'>
        <a href="edit-product.php?id=<?= $product->id ?>">Edit Product</a>
        <input type="hidden" name='id' value='<?= $product->id ?>'>
        <input type="submit" value='Delete' >
    </form>

    <form action="/shop2/scripts/post-add-to-cart.php" method="post">
    <input type="hidden" name="product-id" value="<?= $product->id ?>">
<input type="submit" value="Add to cart">
</form>
    </p>