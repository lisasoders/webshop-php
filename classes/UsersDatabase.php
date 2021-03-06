<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/User.php';

class UsersDatabase extends Database
{
    //get_one (by username)
    public function get_one_by_username($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $db_user = mysqli_fetch_assoc($result);
        $user = null;
        if($db_user){ 
        $user = new User($db_user['username'], $db_user['role'], $db_user['id']);
        $user -> set_password_hash($db_user['password-hash']);
        }
        return $user;
    }

    //get_all
    //create 
    public function create(User $user)
    {
        $query = "INSERT INTO users (username, `password-hash`, `role`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("sss", $user->username, $user->get_password_hash(), $user->role);
        $success = $stmt->execute();
        return $success;

    }
    //update
    //delete

}