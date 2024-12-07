<?php
    include "db_conn.php";
    if (empty($_POST['spName'])) {
        die('請輸入供應商名稱');
    }
    $spName         = $_POST["spName"];
    $spPhone        = $_POST["spPhone"];
    $spAddress      = $_POST["spAddress"];

    $query = ("Insert into `supplier` (`spName`,`spPhone`,`spAddress`) values (?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss",$spName,$spPhone,$spAddress);
    $stmt->execute();

    header('Location: supply_edit.php');
?>