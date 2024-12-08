<?php
    include "db_conn.php";
    //
    $spName         = $_GET["spName"];
    $spPhone        = $_POST["spPhone"];
    $spAddress      = $_POST["spAddress"];

    $query = sprintf(
        'update supplier set spPhone = "%s", spAddress = "%s"  where spName = "%s"',
        $spPhone,
        $spAddress,
        $spName
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: supply_edit.php');
?>