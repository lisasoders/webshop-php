<?php

require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';
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

if(isset($_POST["username"]) && isset($_POST["role"]) && isset($_GET["id"])){

    $user = $_SESSION['user'];
    $db = new UsersDatabase();

    $user = new User($_POST['username'], $_POST['role'], $_GET['id']);
    
    $success = $db->update($user, $_GET["id"]);  

   if($success){
      $user = new User($_POST["username"], $_POST["role"]);

      $user_id = new UsersDatabase;

      $db->update($user, $_GET["id"]);
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
