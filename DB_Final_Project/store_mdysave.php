<?php
    include "db_conn.php";
    //
    $stName         = $_GET["stName"];
    $stPhone        = $_POST["stPhone"];
    $stWorkTime        = $_POST["stWorkTime"];
    $stAddress      = $_POST["stAddress"];

    $query = sprintf(
        'update store set stPhone = "%s", stWorkTime = "%s", stAddress = "%s"  where stName = "%s"',
        $stPhone,
        $stWorkTime,
        $stAddress,
        $stName
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    header('Location: store_edit.php');
?>