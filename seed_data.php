<?php
include "db_conn.php"; // 引入資料庫連線

// 插入店家資料
$stores = [
    ['PChome', '02-12345678', '17:00~2:00', '台北市信義區松高路18號'],
    ['Shopee', '02-23456789', '14:00~2:30', '台北市中正區忠孝西路1段47號'],
    ['Amazon', '02-34567890', '19:00~3:00', '台中市南屯區文心路一段100號'],
    ['Costco', '02-45678901', '19:00~3:00', '高雄市左營區博愛二路777號'],
    ['IKEA', '02-56789012', '20:00~3:00', '台北市大安區敦化南路1段221號'],
    ['Pazzion', '02-67890123', '14:00~2:00', '新北市永和區永貞路15號'],
    ['Yahoo Shopping', '02-78901234', '18:30~3:00', '台北市內湖區民權東路六段15號'],
    ['Walmart', '02-89012345', '8:00~2:00', '高雄市前鎮區中華五路100號'],
    ['Best Buy', '02-90123456', '8:00~2:00', '新北市板橋區中山路1段152號'],
];

foreach ($stores as $store) {
    $sql = "INSERT INTO `store` (`name`, `phone_number`, `work_time`, `address`) 
            VALUES ('{$store[0]}', '{$store[1]}', '{$store[2]}', '{$store[3]}')";
    mysqli_query($db, $sql);
}

// 插入服裝風格資料
$clothStyles = [
    ['001', 'Casual', '輕便休閒風'],
    ['002', 'Formal', '正式商務風'],
    ['003', 'Sport', '運動風格'],
    ['004', 'Vintage', '復古風'],
    ['005', 'Street', '街頭潮流'],
    ['006', 'Minimalist', '極簡風格'],
    ['007', 'Bohemian', '波希米亞風'],
    ['008', 'Preppy', '學院風'],
    ['009', 'Chic', '時尚風格'],
    ['010', 'Kawaii', '可愛日系']
];

foreach ($clothStyles as $style) {
    $sql = "INSERT INTO `clothingstyle` (`id`, `name`, `description`) 
            VALUES ('{$style[0]}', '{$style[1]}', '{$style[2]}')";
    mysqli_query($db, $sql);
}

// 增加供應商資料
$suppliers = [
    ['UNIQLO', '0288772765', '台北市信義區松高路18號'],
    ['NET', '0287525009', '新北市板橋區中山路1段152號'],
    ['LATIV', '0287111234', '台中市南屯區文心路一段100號'],
    ['OB嚴選', '0223456789', '高雄市左營區自由一路120號'],
    ['ZARA', '0282571234', '台北市中正區忠孝西路1段47號'],
    ['GU', '0227610987', '台中市西屯區河南路三段168號'],
    ['PAZZO', '0223679876', '台北市大安區敦化南路1段221號'],
    ['QUEEN SHOP', '0224512345', '新北市永和區永貞路15號'],
    ['GAP', '0223887654', '台北市內湖區民權東路六段15號'],
    ['SO NICE', '0224119999', '高雄市前鎮區中華五路100號']
];

foreach ($suppliers as $supplier) {
    $sql = "INSERT INTO `supplier` (`name`, `phone_number`, `address`) 
            VALUES ('{$supplier[0]}', '{$supplier[1]}', '{$supplier[2]}')";
    mysqli_query($db, $sql);
}

// 插入衣服資料
$clothes = [
    ['A0001', 'Basic T-Shirt', '100% 棉材質，適合日常穿著', 390, 'PChome', 'LATIV'],
    ['A0002', 'Formal Shirt', '商務風格襯衫，適合正式場合', 1290, 'IKEA', 'PAZZO'],
    ['A0003', 'Joggers', '輕便運動長褲', 990, 'Best Buy', 'UNIQLO'],
    ['A0004', 'Denim Jacket', '復古牛仔外套', 1590, 'PChome', 'NET'],
    ['A0005', 'Floral Dress', '波希米亞風連身裙', 1890, 'Pazzion', 'GU'], 
];

foreach ($clothes as $cloth) {
    $sql = "INSERT INTO `cloth` (`id`, `name`, `description`, `price`, `store_name`, `supplier_name`) 
            VALUES ('{$cloth[0]}', '{$cloth[1]}', '{$cloth[2]}', {$cloth[3]}, '{$cloth[4]}', '{$cloth[5]}')";
    mysqli_query($db, $sql);
}

// 插入衣服對應風格資料
$clothStylesMapping = [
    ['A0001', '001'], ['A0001', '005'], 
    ['A0002', '002'], 
    ['A0003', '003'], ['A0003', '005'], 
    ['A0004', '004'], 
    ['A0005', '007'], ['A0005', '009']
];

foreach ($clothStylesMapping as $mapping) {
    $sql = "INSERT INTO  `mending` (`cloth_id`, `cloth_style_id`) 
            VALUES ('{$mapping[0]}', '{$mapping[1]}')";
    mysqli_query($db, $sql);
}

echo "資料已成功插入！";
?>