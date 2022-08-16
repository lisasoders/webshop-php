<?php
require_once __DIR__ . '/../classes/UsersDatabase.php';

if(isset($_POST['id'])) {

    $success = false;

    $db = new UsersDatabase();

    $user_id = $_POST['id'];

    $success = $db->delete($user_id);
}

if($success) {
    header("Location: /shop2");
} else {
    echo "Error deleting user";
}