<?php
    include "db_conn.php";
    if (empty($_POST['name'])) {
        die('請輸入商店名稱');
    }
    $name         = $_POST["name"];
    $phone_number        = $_POST["phone_number"];
    $work_time     = $_POST["work_time"];
    $address      = $_POST["address"];

    $query = ("Insert into store values(?,?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $name, $phone_number, $work_time, $address);
    $stmt->execute();

    header('Location: store.php');
?>