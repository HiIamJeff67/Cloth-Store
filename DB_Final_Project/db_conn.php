<?php
$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'drink';

//進行連線
$db = mysqli_connect($localhost, $user, $password, $database);
if(mysqli_connect_errno()){
	print "Connect failed:".mysqli_connect_error();
	exit();
}

mysqli_set_charset($db,"utf8");//設定編碼
mysqli_select_db($db,"drink");
?>