<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . '/../classes/OrdersDatabase.php';


//<kontrollera att användaren är inloggad som admin
$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';
if(!$is_admin)
{
   http_response_code(401);
   die("You are not authorized to access this page");  
}

$products_db = new ProductsDatabase();
$users_db = new UsersDatabase();
$orders_db = new OrdersDatabase();

$users = $users_db->get_all();
$products = $products_db->get_all();
$orders = $orders_db->get_all();

Template::header("Admin area");

?>

<div class='create-product'>
<h2 class='title'>Add Product</h2>

<form action="/shop2/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" class='input'><br>
   <textarea name="description" placeholder="Description" class='input'></textarea><br>
    <input type="text" name="price" placeholder="Price" class='input'><br>
    <div class='file-input'>
    <input id="file" type="file" name="image" accept="image/*" class="btn file-btn" ><br>
    </div>
    <input type="submit" value="Add" class="btn input">
</form>
</div>


<div class='users'>

<h1 class='title'>users</h1>

<?php foreach ($users as $user) : ?>

    <p class='change-user'>
        <p class='title-small'><?= $user->username ?></p>

        <form action="/shop2/admin-scripts/post-edit-user.php?id=<?= $user->id?>" method="post">
    <select name="role" id="" class="btn">
    <option value="" disabled selected hidden><?= $user->role ?></option>
  <option value="admin">Admin</option>
  <option value="customer">Customer</option>
</select>
<input type="submit" value="Update" class="btn">
</form>
        <form action="../admin-scripts/delete-user.php" method='post'>
        <input type="hidden" name='id' value='<?= $user->id ?>'>
        <input type="submit" value='Delete <?= $user->username ?>' class="btn delete-btn" >
    </form>


    </p>





<?php endforeach; ?>



</div>

<?php foreach ($orders as $order) : ?>
<p> order id: <?= $order->id ?></p>
<p> user id: <?= $order->user_id ?></p>
<p> order status: <?= $order->status ?></p>
<p> order date: <?= $order->date ?></p>

<form action="/shop2/admin-scripts/post-edit-status.php?id=<?= $order->id?>" method="post">
    <select name="status" id="" class="btn">
    <option value="" disabled selected hidden><?= $order->status ?></option>
  <option value="beställd">Beställd</option>
  <option value="skickad">Skickad</option>
</select>
<input type="hidden" name="date" value="<?= $order->date ?>">
<input type="submit" value="Update" class="btn">

    <?php endforeach; ?>

<?php
Template::footer();