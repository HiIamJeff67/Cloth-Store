<?php
    include "db_conn.php";
    if (empty($_POST['name'])) {
        die('請輸入供應商名稱');
    }
    $name         = $_POST["name"];
    $phone_number        = $_POST["phone_number"];
    $address      = $_POST["address"];

    $query = ("Insert into `supplier` (`name`,`phone_number`,`address`) values (?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss",$name,$phone_number,$address);
    $stmt->execute();

    header('Location: supply_edit.php');
?>