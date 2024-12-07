<?php
    include "db_conn.php";
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM drinkrecipe WHERE drid=?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    

    header('Location: drink_recipe_edit.php');
?>