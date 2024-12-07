<?php
    include "db_conn.php";
    if (empty($_POST['stName'])) {
        die('請輸入商店名稱');
    }
    $stName         = $_POST["stName"];
    $stPhone        = $_POST["stPhone"];
    $stWorkTime     = $_POST["stWorkTime"];
    $stAddress      = $_POST["stAddress"];

    $query = ("Insert into store values(?,?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $stName, $stPhone, $stWorkTime, $stAddress);
    $stmt->execute();

    header('Location: store_edit.php');
?>