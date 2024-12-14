<?php
    include "db_conn.php";
    //
    $name         = $_GET["name"];
    $phone_number      = $_POST["phone_number"];
    $work_time        = $_POST["work_time"];
    $address      = $_POST["address"];

    $query = sprintf(
        'update store set phone_number = "%s", work_time = "%s", address = "%s"  where name = "%s"',
        $phone_number,
        $work_time,
        $address,
        $name
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: store.php');
?>