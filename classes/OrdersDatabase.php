<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Order.php';

class OrdersDatabase extends Database{

    //get_one

    public function get_single($id) {

        $query = 'SELECT * FROM orders WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_order = mysqli_fetch_assoc($result);

        $db_id = $db_order['id'];
        $db_user_id = $db_order['user-id'];
        $db_status = $db_order['status'];
        $db_date = $db_order['date'];

   
        $order = new Order($db_user_id, $db_status, $db_date, $db_id);

        return $order;
    }

    public function get_all()

    {

        $query = "SELECT * FROM orders";

        $result = mysqli_query($this->conn, $query);

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

        foreach ($db_orders as $db_order) {

            $db_id = $db_order['id'];

            $db_user_id = $db_order['user-id'];

            $db_status = $db_order['status'];

            $db_date = $db_order['date'];

            $orders[] = new Order($db_user_id, $db_status, $db_date, $db_id);

        }

        return $orders;

    }

    //create

    public function create(Order $order){

        $query = "INSERT INTO orders (`user-id`, `status`, `date`) VALUES (?, ?, ?)";



        $stmt = mysqli_prepare($this->conn, $query);



        $stmt->bind_param("iss", $order->user_id, $order->status, $order->date);



       $success = $stmt->execute();



       return $success;




    }

    //update

    public function update(Order $order, $id) {

        $query = 'UPDATE orders SET `status`= ? WHERE id = ?';



        $stmt = mysqli_prepare($this->conn, $query);



        $stmt->bind_param('si', $order->status, $id);



        return $stmt->execute();

    }

}