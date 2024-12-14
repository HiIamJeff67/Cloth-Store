<?php
    include "db_conn.php";
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM clothingstyle WHERE id=?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    

    header('Location: clothing_style.php');
?>