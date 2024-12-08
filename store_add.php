<?php
    include "db_conn.php";
    if (empty($_POST['name'])) {
        die('請輸入商店名稱');
    }
    $stName         = $_POST["name"];
    $stPhone        = $_POST["phone_number"];
    $stWorkTime     = $_POST["work_ime"];
    $stAddress      = $_POST["address"];

    $query = ("Insert into store values(?,?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $name, $phone_number, $work_time, $address);
    $stmt->execute();

    header('Location: store_edit.php');
?>