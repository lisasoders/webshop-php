<?php

// Db-class 
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$sucess = false;
// User-class


if(
    isset($_POST['username']) && 
    isset($_POST['password']) && 
    isset($_POST['confirm-password']) &&
    strlen($_POST['username']) > 0 &&
    strlen($_POST['password']) > 0 &&
    $_POST['password'] === $_POST['confirm-password']
) {
    $user_db = new UsersDatabase();
    $user = new User($_POST['username'], 'customer');
    $user->hash_password($_POST['password']);

    $existing_user = $user_db->get_one_by_username($_POST['username']);

    if($existing_user) 
    {
        die("User already exists");
    }
    else
    {
       $sucess = $user_db->create($user);
    }
    
} else
{
   die("Invalid input");

    // redirect till register eller felmeddelande
}

if($sucess)
{
    header("Location: /shop2/pages/login.php");
}
else
{
    die("Something went wrong");
}