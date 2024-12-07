<?php
    $servername = 'localhost';   //資料庫的IP
    $user = 'root'; //使用者名稱
    $password = '';  //使用者密碼
    $database = 'drink';  //要連接的資料庫名稱
    // 創建連接
    $conn = new mysqli($servername, $user, $password, $database);
    // 檢測連接
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    } 
    // 創建多個tables
    $errors = [];
    //table1 創建酒譜
    $table1 = "CREATE TABLE DrinkRecipe (
        drId CHAR(6) NOT NULL,
        drName VARCHAR(15) NOT NULL, 
        drDescription VARCHAR(30) ,
        PRIMARY KEY (drId)
    )";
    //table2 創建商店
    $table2="CREATE TABLE Store (
        stName VARCHAR(10) NOT NULL,
        stPhone VARCHAR(15) NOT NULL,
        stWorkTime VARCHAR(15) NOT NULL,
        stAddress VARCHAR(15) NOT NULL, 
        PRIMARY KEY (stName)
    )";
    //table3 創建供應商
    $table3 ="CREATE TABLE Supplier (
        spName VARCHAR(10) NOT NULL,
        spPhone VARCHAR(15) NOT NULL,
        spAddress VARCHAR(15) NOT NULL, 
        PRIMARY KEY (spName)
    )";
    //table4 創建酒類資訊
    $table4 ="CREATE TABLE Drink (
        dId CHAR(6) NOT NULL,
        dName VARCHAR(15) NOT NULL, 
        dDescription VARCHAR(30) ,
        dPrice INT(10) NOT NULL,
        stName VARCHAR(10) ,
        spName VARCHAR(10) ,
        PRIMARY KEY (dId),
        FOREIGN KEY(stName) REFERENCES Store(stName) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(spName) REFERENCES Supplier(spName) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    //table5 創建酒類與酒譜從ERD轉變成關聯模式時新增的資料表
    $table5 = "CREATE TABLE Mending (
        drId CHAR(6) NOT NULL,
        dId CHAR(6) NOT NULL,
        PRIMARY KEY (drId,dId),
        FOREIGN KEY(drId) REFERENCES DrinkRecipe(drId) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(dId) REFERENCES Drink(dId) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    $tables = [$table1, $table2,$table3, $table4,$table5];
    foreach($tables as $k => $sql){
        $query = @$conn->query($sql);

        if(!$query)
            $errors[] = "Table $k : Creation failed ($conn->error)";
        else
            $errors[] = "Table $k : Creation done";
    }


    foreach($errors as $msg) {
        echo "$msg <br>";
    }
    
    $conn->close();
    // header('Location: create_data.php');
?>