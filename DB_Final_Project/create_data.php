<?php
include "db_conn.php";
//增加店家
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('Intention','0287727265','17:00~2:00','台北市大安區敦化南路1段219號2樓') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `stor  e` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('ON TOP','0227415365','14:00~2:30','台北市大安區忠孝東路四段216巷11弄21號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('菱玖洋服',' 0227525009','19:00~3:00','台北市大安區光復南路308巷36號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('榕 RON Xinyi','0227200026','19:00~3:00','台北市信義區基隆路二段12號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('HANKO 60','0223810808','20:00~3:00','台北市萬華區漢口街二段108號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('窩台北','0287719813','14:00~2:00','台北市大安區忠孝東路四段205巷39號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('PUN','0227005000','18:30~3:00','台北市大安區信義路四段378巷5號') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `store` (`stName`,`stPhone`,`stWorkTime`,stAddress) VALUE ('窖父HideOut','0223625805','8:00~2:00','台北市中正區羅斯福路四段24巷13號') ";
$result = mysqli_query($db,$sql);
//增加酒譜
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('001','Martini') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('002','Margarita') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('003','Cosmopolitan') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('004','Sex on the beach') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('005',' Bloody Mary') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('006','Daiquiri') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('007','Mojito') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('008','Long Island Iced Tea') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('009','Negroni') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('010','Old Fashioned') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('011','Gimlet') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('012','French 75') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('013','Boulevardier') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('014','Tommy’s Margarita') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('015','Penicillin') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('016','Clover Club') ";
$result = mysqli_query($db,$sql);
$sql = "INSERT INTO  `drinkrecipe` (`drId`,`drName`) VALUE ('017','Gin Gin Mule') ";
$result = mysqli_query($db,$sql);
//增加供應商
$sql = "INSERT INTO  `supplier` (`spName`,`spPhone`,`spAddress`) VALUE ('costco','82587493','新北市板橋區民生路三段') ";
$result = mysqli_query($db,$sql);
//增加酒類

//$sql = "INSERT INTO  `drink` (`dId`,`dName`,`dDescription`,`dPrice`,`stName`,`spName`) VALUE ('1','絕對伏特加(ABSOLUT VODKA)','fwefw','500','fewfw','costco') ";
//$result = mysqli_query($db,$sql);

header('Location: home.html');
?>