




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+HR:wght@100..400&family=SUSE:wght@100..800&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./home.style.css">
    <title>Cloth Store</title>
</head>
<body>
    <div class="header">
        <div class="header-container">
            <div class="header-right">
                Powered by <span class="team-number">Team 26.</span>
            </div>
            <div class="title text-glow">
                Cloth Store
            </div>
            <div class="header-left">
                <div class="header-left-link email-link">
                    <a href="mailto:iamjeffhi67@gmail.com" target="_blank">
                        <img src="./images/email.png" class="header-left-icon email-icon">
                    </a>
                </div>
                <div class="header-left-link github-link">
                    <a href="https://github.com/HiIamJeff67/Cloth-Store.git" target="_blank">
                        <img src="./images/github.png" class="header-left-icon github-icon">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <table class="data-table">
                <tr class="data-column-names">
                    <th class="table-col table-col-1">商店名稱</th>
                    <th class="table-col table-col-2">商店電話</th>
                    <th class="table-col table-col-3">營業時間</th>
                    <th class="table-col table-col-4">商店地址</th>
                </tr>
                <?php
                    include "db_conn.php";
                    $query = ("Select * From store");
                    if($stmt = $db->query($query)){
                        // echo "<table border = '1'>";
                        while($result=mysqli_fetch_object($stmt)){
                            echo "<tr class='data-row'>";
                            echo "<td class='table-sub-col table-col-1'>$result->name</td>";
                            echo "<td class='table-sub-col table-col-1'>$result->phone_number</td>";
                            echo "<td class='table-sub-col table-col-1'>$result->work_time</td>";
                            echo "<td class='table-sub-col table-col-1'>$result->address</td>";
                            echo "</tr>";
                        }
                        // echo "</table>";
                    }
                ?>

                <tr class="data-row">
                    <th class="table-sub-col table-col-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, odit.</th>
                    <th class="table-sub-col table-col-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis deleniti culpa dicta. Doloremque unde necessitatibus hic culpa incidunt corporis amet.</th>
                    <th class="table-sub-col table-col-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam repellendus facilis accusamus nesciunt reiciendis saepe quos adipisci obcaecati placeat, debitis sed velit minus molestiae excepturi porro laborum earum. Asperiores, molestias.</th>
                    <th class="table-sub-col table-col-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam, voluptas.</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="navbar">
        <div class="navbar-container">
            <a href="">
                <div class="nav-button cloth-nav-button">
                    <svg class="cloth-icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" >
                        <path d="M0 0h48v48H0z" fill="none"/>
                        <g id="Shopicon">
                            <path d="M40,6H28.997C28.997,6.011,29,6.021,29,6.032c0,2.761-2.239,5-5,5s-5-2.239-5-5C19,6.021,19.003,6.011,19.003,6H8
                                c-2.2,0-4,1.8-4,4v8c0,2.2,1.8,4,4,4l1.978,0v16c0,2.2,1.8,4,4,4L34,42c2.2,0,4-1.8,4-4V22h2c2.2,0,4-1.8,4-4v-8
                                C44,7.8,42.2,6,40,6z"/>
                        </g>
                    </svg>
                </div>
            </a>
            <a href="">
                <div class="nav-button cloth-info-nav-button">
                    <svg class="cloth-info-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z"/>
                    </svg>
                </div>
            </a>
            <a href="">
                <div class="nav-button supplier-nav-button">
                    <svg class="supplier-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 2V15H13V10H11V15H1V5L7 2H8V5L14 2H15ZM9 8H7V12H9V8ZM5 8H3V12H5V8Z"/>
                    </svg>
                </div>
            </a>
            <a href="temp_store.html">
                <div class="nav-button store-nav-button">
                    <svg class="store-icon" viewBox="0 -52 616 616" xmlns="http://www.w3.org/2000/svg">
                        <path d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</body>
</html>