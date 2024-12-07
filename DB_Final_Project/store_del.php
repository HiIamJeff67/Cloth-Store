<?php
    include "db_conn.php";
    $stName = $_GET['stName'];
    
    $stmt = $db->prepare("DELETE FROM store WHERE stName=?");
    $stmt->bind_param("s",$stName);
    $stmt->execute();
    

    header('Location: store_edit.php');
?>