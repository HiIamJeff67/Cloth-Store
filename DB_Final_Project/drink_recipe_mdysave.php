<?php
    include "db_conn.php";
    //
    $id           = $_GET['id'];
    $name         = $_POST["name"];
    $description = $_POST["description"];

    $query = sprintf(
        'update drinkrecipe set drName = "%s", drDescription = "%s"  where drId = "%s"',
        $name,
        $description,
        $id
      );
      echo $query . '<br>';
    $stmt = $db->query($query);
    if (!$stmt) {
        die($db->error);
    }
    //delete mending
    
    $query_tmp=("DELETE FROM mending WHERE drid=?");
    $stmt_tmp = $db->prepare($query_tmp);
    $stmt_tmp->bind_param("s",$id);
    $stmt_tmp->execute();
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