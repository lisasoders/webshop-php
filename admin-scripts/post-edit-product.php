<?php

require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
session_start();


$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';
if(!$is_admin)
{
   http_response_code(401);
   die("You are not authorized to access this page");  
}

$success = false;

if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_GET["id"])){

   $upload_directory = __DIR__ . "/../assets/uploads/"; // filnamn

   $upload_name = basename($_FILES["image"]["name"]);

   $name_parts = explode(".", $upload_name);

   $file_extension = end($name_parts);

   $timestamp = time();

   $file_name = "{$timestamp}.{$file_extension}";

   $full_upload_path = $upload_directory . $file_name;

   $full_relative_url = "/shop2/assets/uploads/{$file_name}";

   $success = move_uploaded_file($_FILES["image"]["tmp_name"], $full_upload_path);

   if($success){
      $prodcut = new Product($_POST["title"], $_POST["description"], $_POST["price"], $full_relative_url);

      $products_db = new ProductsDatabase;

      $products_db->update($prodcut, $_GET["id"]);
   }
}
else{
   die("invalid input");
}

if($success){
   header("Location: /shop2/pages/products.php");
   die();
}
else{
   die("error uptade product");
}