<?php
    include "db_conn.php";
    
    if (empty($_POST['id'])) {
        die('請輸入 id');
    }
  
    $id             = $_POST["id"];
    $name           = $_POST["name"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $store_name     = $_POST["store_name"];
    $supplier_name  = $_POST["supplier_name"];

    $query = ("INSERT INTO clothing_info (id, name, description, Price, store_name, supplier_name) VALUES (?, ?, ?, ?, ?, ?)");
    
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssiss", $id, $name, $description, $price, $store_name, $supplier_name);
    
    $stmt->execute();

    header('Location: clothing_info_edit.php');
?>
