<?php
    include "db_conn.php";
    $spName = $_GET["spName"];

    $stmt = $db->prepare("DELETE FROM supplier WHERE spName=?");
    $stmt->bind_param("s",$spName);
    $stmt->execute();
    

    header('Location: supply_edit.php');
?>