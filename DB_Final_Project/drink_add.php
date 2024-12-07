<?php
    include "db_conn.php";
    if (empty($_POST['id'])) {
        die('請輸入 id');
    }
    $id             = $_POST["id"];
    $name           = $_POST["name"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $stName         = $_POST["stName"];
    $spName         = $_POST["spName"];

    $query = ("Insert into drink values(?,?,?,?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssiss", $id, $name, $description, $price, $stName, $spName);
    $stmt->execute();
    header('Location: drink_edit.php');
?>