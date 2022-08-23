<?php

require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . '/../classes/Order.php';
require_once __DIR__ . '/../classes/OrdersDatabase.php';
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

if(isset($_POST["status"]) && isset($_GET["id"])){

    $user = $_SESSION['user'];
    $db = new OrdersDatabase();

    $order = new Order($user->id, $_POST['status'], $_POST['date'], $_GET['id']);
    
    $success = $db->update($order, $_GET["id"]);  

   if($success){
      $order = new Order($user->id, $_POST["status"], $_POST['date'], $_GET["id"]);

      $order_id = new OrdersDatabase;

      $db->update($order, $_GET["id"]);
   }
}
else{
   die("invalid input");
}

if($success){
   header("Location: /shop2/pages/admin.php");
   die();
}
else{
   die("error uptade status");
}