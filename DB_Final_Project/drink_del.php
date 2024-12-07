<?php
    include "db_conn.php";
    $id = $_GET['id'];
    
    $stmt = $db->prepare("DELETE FROM drink WHERE did=?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    

    header('Location: drink_edit.php');
?>