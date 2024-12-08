<?php
    include "db_conn.php";
    //
    $name         = $_GET["name"];
    $phone_number        = $_POST["phone_number"];
    $address      = $_POST["address"];

    $query = sprintf(
        'update supplier set phone_number = "%s", address = "%s"  where name = "%s"',
        $phone_number,
        $address,
        $name
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: supply_edit.php');
?>