<!doctype html>
<html lang="en">
<title>服裝坊</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <style>
        * {
            font-family: Microsoft JhengHei;
        }

        button {
            margin: 5px;
            background: #df5334;
        }

        .delete,
        #expenseorincome {
            display: inline-block;
        }

        .edit,
        .delete,
        .choosecalendar,
        .addexpense,
        .addincome,
        .yes,
        .no,
        .complete {
            color: white;
            font-size: 5px;
            width: 43px;
            height: 40px;
            font-weight: bolder;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
        }

        .edit:hover,
        .delete:hover,
        .choosecalendar:hover,
        .add:hover,
        .addexpense:hover,
        .addincome:hover,
        .yes:hover,
        .no:hover,
        .signout:hover,
        .complete:hover {
            border: 2px;
            background-color: #db6937;
            border-style: solid;
        }

        .choosecalendar {
            width: 50px;
        }

        .row.content {
            height: 643px;
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        .y {
            background-color: pink;
            color: black;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bolder;
        }

        .y:hover {
            background-color: rgb(143, 240, 124);
            color: white;
        }

        .home_img {
            height: 150px;
            width: 150px;
            position: absolute;
            left: 0px;
            top: 0px;
        }

        .signout {
            height: 45px;
            width: 60px;
            position: absolute;
            right: 30px;
            top: 8px;
            color: white;
            font-weight: bolder;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
        }

        tr,
        th,
        td {
            width: 130px;
            height: 40px;
            border: 1px solid;
            text-align: center;
            vertical-align: middle;
        }

        .add {
            position: relative;
            left: 92%;
            top: -50px;
            color: white;
            width: 80px;
            height: 50px;
            font-weight: bolder;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
        }

        #expenseorincome {
            position: relative;
            left: 78%;
            top: -110px;
            text-align: center;
            width: 150px;
            height: 70px;
            background-color: rgb(255, 238, 0);
            border-radius: 10px;
            border: 1px solid;
        }

        .addexpense,
        .addincome {
            position: relative;
            top: 10px;
        }

        #expense_remind,
        #income_remind {
            position: relative;
            left: 450px;
            top: 10px;
            text-align: center;
            width: 250px;
            height: 130px;
            font-weight: bolder;
            background-color: rgb(255, 238, 0);
            border-radius: 10px;
            border: 1px solid;
            box-shadow: 0 0px 50px rgba(0, 0, 0, 0.1);
        }

        .yes,
        .no {
            margin-top: 50px;
            width: 100px;
            position: relative;
            top: -10px;
        }

        .accounting_record {
            position: relative;
            height: 50px;
        }

        body {
            height: 150px;
            width: 100%;
            position: absolute;
        }

        .container-fluid,
        .row-fluid {
            height: inherit;
        }

        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="background-color: pink;">
        <h1 style="font-size: 45px;"><strong><span style="left: 50%;position: relative;">服裝坊</span></strong></h1>
        <img src="logo.jpg" class="home_img" style="z-index: 1;">
    </div>
    <!--左邊目錄選單-->
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2" style="position:relative;padding:0;height:100%;width: 150px;background-color:pink;">
                <ul class="nav sidenav-nav">
                    <li class="dropdown">
                        <a href="home.html" style="padding:0;">
                            <p class="y">首頁</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="clothing_info.php" style="padding:0;">
                            <p class="y">服裝資訊</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="clothing_styles.php" style="padding:0;">
                            <p class="y">服裝搭配</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="brands.html" style="padding:0;">
                            <p class="y">熱門品牌</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="store.php" style="padding:0;">
                            <p class="y">店家</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="supply.php" style="padding:0;">
                            <p class="y">供應商</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!--此畫面主內容-->
            <div class="col-sm-10">
                <?php
                    include "db_conn.php";
                    $name = $_GET["name"];

                    $query = ("SELECT * FROM store WHERE name ='".$name."'");

                    if($stmt = $db->query($query)){
                        $result = mysqli_fetch_object($stmt);
                        echo "<br>商店名稱: ".$result->name."<br>";
                        echo "<form action='store_mdysave.php?name=".$result->name."' method='POST'>";
                        echo "商店電話: <input type='text' name='phone_number' value='".$result->phone_number."'><br>";
                        echo "營業時間: <input type='text' name='work_time' value='".$result->work_time."'><br>";
                        echo "商店地址: <input type='text' name='address' value='".$result->address."'><br>";
                        echo "<input type='submit' value='更改'></form>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
