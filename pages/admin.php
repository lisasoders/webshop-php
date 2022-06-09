<?php
require_once __DIR__ . '/../classes/Template.php';


//<kontrollera att användaren är inloggad som admin
$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';
if(!$is_admin)
{
   http_response_code(401);
   die("You are not authorized to access this page");  
}

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










<?php
Template::footer();