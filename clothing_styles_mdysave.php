<?php
    include "db_conn.php";
    
    $id           = $_GET['id'];
    $name         = $_POST["name"];
    $description  = $_POST["description"];

    // 更新 clothing_style 資料表中的 name 和 description 欄位
    $query = sprintf(
        'UPDATE clothing_style SET name = "%s", description = "%s" WHERE id = "%s"',
        $name,
        $description,
        $id
    );
    echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }

    // 刪除 mending 表中的資料
    $query_tmp = "DELETE FROM mending WHERE id=?";
    $stmt_tmp = $db->prepare($query_tmp);
    $stmt_tmp->bind_param("s", $id);
    $stmt_tmp->execute();

    // 插入 clothing_style 的 id 和 clothing_info 的 id 到 mending 表
    $clothing = $_POST["clothing"];

    foreach ($clothing as $value) {
        echo $value;
        $query_tmp = "INSERT INTO mending VALUES(?, ?)";
        $stmt_tmp = $db->prepare($query_tmp);
        $stmt_tmp->bind_param("ss", $id, $value);
        $stmt_tmp->execute();
    }

    header('Location: clothing_style_edit.php');
?>
