<?php
    include "db_conn.php";
    if (empty($_POST['id'])) {
        die('請輸入 id');
    }
    $id           = $_POST["id"];
    $name         = $_POST["name"];
    $description = $_POST["description"];

    $query = ("Insert into clothingstyle values(?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss",$id,$name,$description);
    $stmt->execute();
    //insert clothing_style_Id and clothing_info_Id to mending
    $clothing_info=$_POST["cloth"];
    foreach ($cloth as $value) {
        echo $value;
        $query_tmp=("Insert into mending values(?,?)");
        $stmt_tmp = $db->prepare($query_tmp);
        $stmt_tmp->bind_param("ss",$id,$value);
        $stmt_tmp->execute();
    }
    header('Location: clothing_style.php');
?>