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
                        <a href="clothing_style.php" style="padding:0;">
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
                <br/>
                <table style="background-color: black;">
                    <tr>
                        <th><span style="color: white;">服裝編號</th>
                        <th><span style="color: white;">服裝名稱</th>
                        <th><span style="color: white;">服裝描述</th>
                        <th><span style="color: white;">服裝來源</th>
                    </tr>
                </table>
                <?php
                include "db_conn.php";
                $query = ("SELECT clothing_style.id, clothing_style.name, clothing_style.description, clothing.name AS source 
                           FROM clothing_style 
                           LEFT JOIN (mending NATURAL JOIN cloth) 
                           ON clothing_style.id = mending.id 
                           ORDER BY clothing_style.id");
                if ($stmt = $db->query($query)) {
                    echo "<table border='1'>";
                    $temp = 9999;
                    $flag = 0;
                    $flag2 = 0;
                    $temp_id = [];
                    $temp_name = [];
                    $temp_description = [];
                    $temp_source = [];

                    while ($result = mysqli_fetch_object($stmt)) {
                        $flag2 = 1;
                        if ($temp != 9999 && $temp_id[$temp] != $result->id) {
                            echo "<tr>";
                            echo "<td>" . $temp_id[0] . "</td>";
                            echo "<td>" . $temp_name[0] . "</td>";
                            echo "<td>" . $temp_description[0] . "</td>";
                            echo "<td>";
                            echo $temp_source[0];
                            for ($i = 1; $i <= $temp; $i++) {
                                echo ", " . $temp_source[$i];
                            }
                            echo "</td>";
                            echo "</tr>";
                            $temp = 0;
                            $temp_id[$temp] = $result->id;
                            $temp_name[$temp] = $result->name;
                            $temp_description[$temp] = $result->description;
                            $temp_source[$temp] = $result->source;
                            continue;
                        }
                        if ($temp == 9999) {
                            $temp = 0;
                        } else if ($temp == 0) {
                            $temp = 1;
                        }
                        $temp_id[$temp] = $result->id;
                        $temp_name[$temp] = $result->name;
                        $temp_description[$temp] = $result->description;
                        $temp_source[$temp] = $result->source;
                        echo "<tr>";
                        echo "<td>" . $result->id . "</td>";
                        echo "<td>" . $result->name . "</td>";
                        echo "<td>" . $result->description . "</td>";
                        while ($result = mysqli_fetch_object($stmt)) {
                            if ($temp_id[$temp] == $result->id) {
                                $temp++;
                                $temp_id[$temp] = $result->id;
                                $temp_name[$temp] = $result->name;
                                $temp_description[$temp] = $result->description;
                                $temp_source[$temp] = $result->source;
                            } else {
                                echo "<td>";
                                echo $temp_source[0];
                                for ($i = 1; $i <= $temp; $i++) {
                                    echo ", " . $temp_source[$i];
                                }
                                echo "</td>";
                                $temp = 0;
                                $temp_id[$temp] = $result->id;
                                $temp_name[$temp] = $result->name;
                                $temp_description[$temp] = $result->description;
                                $temp_source[$temp] = $result->source;
                                break;
                            }
                        }
                        if ($result == NULL) {
                            echo "<td>";
                            echo $temp_source[0];
                            for ($i = 1; $i <= $temp; $i++) {
                                echo ", " . $temp_source[$i];
                            }
                            echo "</td>";
                            $flag = 1;
                        }
                        echo "</tr>";
                    }
                    if ($result == NULL && $flag == 0 && $flag2 != 0) {
                        echo "<tr>";
                        echo "<td>" . $temp_id[0] . "</td>";
                        echo "<td>" . $temp_name[0] . "</td>";
                        echo "<td>" . $temp_description[0] . "</td>";
                        echo "<td>";
                        echo $temp_source[0];
                        for ($i = 1; $i <= $temp; $i++) {
                            echo ", " . $temp_source[$i];
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                ?>
                <a href="clothing_styles_edit.php" style="position:absolute;right: 10%;background-color: rgb(255, 238, 0);border-radius: 10px;border: 1px solid;">
                    編輯
                </a>
            </div>
        </div>
    </div>
</body>

</html>
