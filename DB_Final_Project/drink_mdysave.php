<?php
    include "db_conn.php";
    //
    $id             = $_GET['id'];
    $name           = $_POST["name"];
    $description    = $_POST["description"];
    $price          = $_POST["price"];
    $stName         = $_POST["stName"];
    $spName         = $_POST["spName"];

    $query = sprintf(
        'update drink set dName = "%s", dDescription = "%s", dPrice = "%d", stName = "%s", spName = "%s"  where dId = "%s"',
        $name,
        $description,
        $price,
        $stName,
        $spName,
        $id
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: drink_edit.php');
?>