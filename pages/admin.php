<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';


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

$users = $users_db->get_all();
$products = $products_db->get_all();

Template::header("Admin");

?>

<h2>Create Product</h2>

<form action="/shop2/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title"><br>
   <textarea name="description" placeholder="Description"></textarea><br>
    <input type="text" name="price" placeholder="Price"><br>
    <input type="file" name="image" accept="image/*"><br>
    <input type="submit" value="Save">
</form>

<hr>

<h1>users</h1>

<?php foreach ($users as $user) : ?>

    <p>
        <a href="/shop2/pages/admin-user.php?id=<?= $user->id ?>"><?= $user->username ?></a>
        <i><?= $user->role ?></i>

        <form action="../admin-scripts/delete-user.php" method='post'>
        <input type="hidden" name='id' value='<?= $user->id ?>'>
        <input type="submit" value='Delete' >
    </form>
    </p>

    <form action="/shop2/admin-scripts/post-edit-user.php?id=<?= $user->id?>" method="post">
    <select name="role" id="">
    <option value="" disabled selected hidden><?= $user->role ?></option>
  <option value="admin">Admin</option>
  <option value="customer">Customer</option>
</select>
<input type="submit" value="Save">
</form>


<?php endforeach; ?>









<?php
Template::footer();