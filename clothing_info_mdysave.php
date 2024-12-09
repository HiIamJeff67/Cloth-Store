<?php
    include "db_conn.php";
    //
    $id             = $_GET['id'];
    $name           = $_POST["name"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $store_name     = $_POST["store_name"];
    $supplier_name  = $_POST["supplier_name"];

    $query = sprintf(
        'UPDATE clothing_info SET name = "%s", description = "%s", Price = "%d", store_name = "%s", supplier_name = "%s" WHERE id = "%s"',
        $name,
        $description,
        $price,
        $store_name,
        $supplier_name,
        $id
    );
    echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: clothing_info_edit.php');
?>
