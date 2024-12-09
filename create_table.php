<?php
    $servername = 'localhost';   //資料庫的IP
    $user = 'root'; //使用者名稱
    $password = '123456789';  //使用者密碼
    $database = 'clothstore';  //要連接的資料庫名稱
    // 創建連接
    $conn = new mysqli($servername, $user, $password, $database);
    // 檢測連接
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    } 
    // 創建多個tables
    $errors = [];
    // ClothStyleTable 創建服裝風格
    $ClothStyleTable = "CREATE TABLE ClothingStyle (
        id CHAR(6) NOT NULL,
        name VARCHAR(15) NOT NULL, 
        description VARCHAR(30) ,
        PRIMARY KEY (id)
    )";
    // StoreTable 創建店家(經銷商)
    $StoreTable="CREATE TABLE Store (
        name VARCHAR(15) NOT NULL,
        phone_number VARCHAR(15) NOT NULL,
        work_time VARCHAR(15) NOT NULL,
        address VARCHAR(50) NOT NULL, 
        PRIMARY KEY (name)
    )";
    // SupplierTable 創建供應商
    $SupplierTable ="CREATE TABLE Supplier (
        name VARCHAR(15) NOT NULL,
        phone_number VARCHAR(15) NOT NULL,
        address VARCHAR(50) NOT NULL, 
        PRIMARY KEY (name)
    )";
    // ClothTable 創建衣服
    $ClothTable ="CREATE TABLE Cloth (
        id CHAR(6) NOT NULL,
        name VARCHAR(15) NOT NULL, 
        description VARCHAR(100),
        price INT(10) NOT NULL,
        store_name VARCHAR(15),
        supplier_name VARCHAR(15),
        PRIMARY KEY (id),
        FOREIGN KEY(store_name) REFERENCES Store(name) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(supplier_name) REFERENCES Supplier(name) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    // Mending 創建衣服對應到
    $Mending = "CREATE TABLE Mending (
        cloth_id CHAR(6) NOT NULL,
        cloth_style_id CHAR(6) NOT NULL,
        PRIMARY KEY (cloth_id, cloth_style_id),
        FOREIGN KEY(cloth_id) REFERENCES Cloth(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(cloth_style_id) REFERENCES ClothingStyle(id) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    $tables = [$ClothStyleTable, $StoreTable, $SupplierTable, $ClothTable, $Mending];
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