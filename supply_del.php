<?php
    include "db_conn.php";
    $name = $_GET["name"];

    $stmt = $db->prepare("DELETE FROM supplier WHERE name=?");
    $stmt->bind_param("s",$name);
    $stmt->execute();
    

    header('Location: supply.php');
?>