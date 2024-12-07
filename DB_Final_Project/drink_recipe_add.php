<?php
    include "db_conn.php";
    if (empty($_POST['id'])) {
        die('請輸入 id');
    }
    $id           = $_POST["id"];
    $name         = $_POST["name"];
    $description = $_POST["description"];

    $query = ("Insert into drinkrecipe values(?,?,?)");
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss",$id,$name,$description);
    $stmt->execute();
    //insert drId and dId to mending
    $drink=$_POST["drink"];
    foreach ($drink as $value) {
        echo $value;
        $query_tmp=("Insert into mending values(?,?)");
        $stmt_tmp = $db->prepare($query_tmp);
        $stmt_tmp->bind_param("ss",$id,$value);
        $stmt_tmp->execute();
    }
    header('Location: drink_recipe_edit.php');
?>