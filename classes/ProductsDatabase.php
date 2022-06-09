<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Product.php';


class ProductsDatabase extends Database{
    //get_one
    //get_all
    public function get_all()
    {
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $query);
        $db_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $products = [];
        foreach ($db_products as $db_product) {
            $db_id = $db_product['id'];
            $db_title = $db_product['title'];
            $db_description = $db_product['description'];
            $db_price = $db_product['price'];
            $db_img_url = $db_product['img-url'];
            $products[] = new Product($db_title, $db_description, $db_price, $db_img_url, $db_id);
        }
        return $products;
    }
    //create

    public function create(Product $product){
        $query = "INSERT INTO products (title, `description`, price, `img-url`) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssis", $product->title, $product->description, $product->price, $product->img_url);

       $success = $stmt->execute();

       return $success;


    }
    //update
    //delete
}