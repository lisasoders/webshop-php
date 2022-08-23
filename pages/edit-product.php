<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';

$db = new ProductsDatabase();

$product = $db->get_single($_GET['id']);

Template::header("Update product");

if($product === null): ?>

<h2>No product</h2>

<?php else: ?>

    <div class='create-product'>
<form action="/shop2/admin-scripts/post-edit-product.php?id=<?= $_GET["id"]?>" method="post" enctype="multipart/form-data">
    <input class='input' type="text" name="title" placeholder="Title" value="<?= $product->title?>" ><br>
   <textarea class='input' name="description" placeholder="Description"><?= $product->description?></textarea><br>
    <input class='input' type="number" name="price" placeholder="Price" value="<?= $product->price?>"><br>
    <input class="btn file-btn"  type="file" name="image" accept="image/*"><br>
    <input class="btn input" type="submit" value="Save">
</form>
</div>

<?php 

endif;

Template::footer();