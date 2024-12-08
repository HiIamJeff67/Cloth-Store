<!<!doctype html>
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
            background-color: lightblue;
            color: black;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bolder;
        }

        .y:hover {
            background-color: #5e9dd1;
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
    </style>
    <script type="text/javascript" src="home.js"></script>
</head>

<body>
    <!-- 頂部標題 -->
    <div class="container-fluid" style="background-color: lightblue;">
        <h1 style="font-size: 45px;"><strong><span style="left: 50%;position: relative;">服裝坊</span></strong></h1>
        <img src="fashion_logo.jpg" class="home_img" style="z-index: 1;">
    </div>

    <!-- 左側目錄選單 -->
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2" style="position:relative;padding:0;height:100%;width: 150px;background-color:lightblue;">
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

            <!-- 右側主內容 -->
            <div class="col-sm-10">
                <br />
                <table style="background-color: black;">
                    <tr>
                        <th><span style="color: white;">供應商名稱</span></th>
                        <th><span style="color: white;">供應商電話</span></th>
                        <th><span style="color: white;">供應商地址</span></th>
                    </tr>
                </table>
                <?php
                include "db_conn.php";
                $query = ("Select * From supplier");
                if ($stmt = $db->query($query)) {
                    echo "<table border='1'>";
                    while ($result = mysqli_fetch_object($stmt)) {
                        echo "<tr>";
                        echo "<td>$result->spName</td>";
                        echo "<td>$result->spPhone</td>";
                        echo "<td>$result->spAddress</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                ?>
                <a href="supply_edit.php" style="position:absolute;right: 10%;background-color: rgb(255, 238, 0);border-radius: 10px;border: 1px solid;">
                    編輯
                </a>
            </div>
        </div>
    </div>
</body>

</html>
