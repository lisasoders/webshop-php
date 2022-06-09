<?php

require_once __DIR__ . '/../classes/UsersDatabase.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
   $user_db = new UsersDatabase();
   $user = $user_db->get_one_by_username($_POST['username']);
   if($user && $user->test_password($_POST["password"]))
   {
    session_start();
    $_SESSION['user'] = $user;
    header("Location: /shop2/index.php");
   }
   else
   {
        die("Invalid username or password");
   }

}
else
{
    die("Invalid input");
}