<!doctype html>
<html lang="en">
<title>會醉坊</title>
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
            /*去邊框*/
            border-radius: 10px;
            cursor: pointer;
            /*可以指*/
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

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 643px;
        }

        /* Set gray background color and 100% height */
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

        .dropdown-menu {
            margin: 0;
            border: none;
            border-radius: 0;
            padding: 0;
            width: 100%;
            box-shadow: none;
            position: relative;
            text-align: center;
            margin-bottom: 10px;

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
            /*去邊框*/
            border-radius: 10px;
            cursor: pointer;
            /*可以指*/
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
            /*去邊框*/
            border-radius: 10px;
            cursor: pointer;
            /*可以指*/
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
            /*框的角*/
            border: 1px solid;
            /*box-shadow: 0 0px 50px rgba(0, 0, 0, 0.1); /*rgba的a為陰影部分*/
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
            /*框的角*/
            border: 1px solid;
            box-shadow: 0 0px 50px rgba(0, 0, 0, 0.1);
            /*rgba的a為陰影部分*/
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
        .row-fluid { height: inherit; }

        /* On small screens, set height to 'auto' for sidenav and grid */
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
    <script type="text/javascript" src="home.js"></script>
</head>

<body>
    <div class="container-fluid" style="background-color: pink;">
        <h1 style="font-size: 45px;"><strong><span style="left: 50%;position: relative;">會醉坊</span></strong></h1>
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
                        <a href="drink.php" style="padding:0;">
                            <p class="y">酒類資訊</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="drink_recipe.php" style="padding:0;">
                            <p class="y">酒譜資訊</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="basicdrink.html" style="padding:0;">
                            <p class="y">六大基酒</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="store.php" style="padding:0;">
                            <p class="y">店家</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="supply.php" style="padding:0;">
                            <p class="y">廠商</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!--此畫面主內容-->
            <div class="col-sm-10">
                <br/>
                <table style="background-color: black;">
                <tr>
                <th><span style="color: white;">酒類編號</th>
                <th><span style="color: white;">酒類名稱</th>
                <th><span style="color: white;">酒類描述</th>
                <th><span style="color: white;">酒類價錢</th>
                <th><span style="color: white;">商家名稱</th>
                <th><span style="color: white;">供應商名稱</th>
                </tr>
                </table>
                <?php
                    include "db_conn.php";

                    // 要改SQL語法
                    $query = ("Select * From drink");
                    
                    
                    if($stmt = $db->query($query)){
                        echo "<table border = '1'>";
                        while($result=mysqli_fetch_object($stmt)){
                            echo "<tr>";
                            echo "<td>".$result->dId."</td>";
                            echo "<td>".$result->dName."</td>";
                            echo "<td>".$result->dDescription."</td>";
                            echo "<td>".$result->dPrice."</td>";
                            echo "<td>".$result->stName."</td>";
                            echo "<td>".$result->spName."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                ?>
                <a href = "drink_edit.php"  style="position:absolute;right: 10%;background-color: rgb(255, 238, 0);border-radius: 10px;border: 1px solid;">
                    編輯
                </a>
            </div>
        </div>
    </div>
    <!--
            <footer class="container-fluid text-center"></footer>
        -->
</body>

</html>