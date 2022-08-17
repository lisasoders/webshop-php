<?php


require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/Database.php";


$success = false;

if(isset($_GET["role"]) && isset($_GET["username"])){
    $role = $_GET["role"];
    $username = $_POST["username"];
    
  
    $user = new User($role, $username);

    $db = new Database();

    $success = $db->update_role($user);

}
else{
    echo "invalid input";
}

if($success){
   echo "success update role";
}
else{
    echo "error changing user";
}