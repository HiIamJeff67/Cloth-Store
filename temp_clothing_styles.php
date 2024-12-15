<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+HR:wght@100..400&family=SUSE:wght@100..800&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./main.style.css">
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
        <div class="hide editor-container editor-add" id="add-editor" onclick="handleAddInputFieldOnClose()"></div>
        <div>
            <form class="hide editor add-editor-form" id="add-editor-form" method="POST" action="clothing_style_add.php">
                <h2 class="add-editor-title">新增一筆資料</h2>
                <input placeholder="ID" class="add-editor-input add-id-input" type="text" name="id">
                <input placeholder="名稱" class="add-editor-input add-name-input" type="text" name="name">
                <input placeholder="描述" class="add-editor-input add-description-input" type="text" name="description">
                <div class="add-editor-buttons">
                    <input class="add-editor-submit-button" type="submit" value="新增">
                    <button class="add-editor-cancel-button" onclick="handleAddInputFieldOnClose()">取消</button>
                </div>
            </form>
        </div>
        <div class="hide editor-container editor-modify" id="modify-editor" onclick="handleModifyInputFieldOnClose()"></div>
        <div>
            <form class="hide editor modify-editor-form" id="modify-editor-form" method="POST" action="clothing_style_mdysave.php?id=">
                <h2 class="modify-editor-title">修改一筆資料</h2>
                <input placeholder="ID" class="modify-editor-input modify-name-input" type="text" name="id" readonly>
                <input placeholder="名稱" class="modify-editor-input modify-phoneNumber-input" type="text" name="name">
                <input placeholder="描述" class="modify-editor-input modify-workTime-input" type="text" name="description">
                <div class="modify-editor-buttons">
                    <input class="modify-editor-submit-button" type="submit" value="修改">
                    <button class="modify-editor-cancel-button" onclick="handleAddInputFieldOnClose()">取消</button>
                </div>
            </form>
        </div>
        <div class="content">
            <div class="content-header">
                <button class="add-button" onclick="handleAddInputFieldOnOpen()">
                    <svg class="add-button-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <p class="add-button-title">新增</p>
                </button>
            </div>
            <table class="data-table">
                <tr class="data-column-names">
                    <th class="table-col table-col-1">風格ID</th>
                    <th class="table-col table-col-2">風格名稱</th>
                    <th class="table-col table-col-3">風格描述</th>
                    <th class="table-col table-col-4">相關衣服</th>
                    <th class="table-option-col table-col-5">選項</th>
                </tr>
                <?php
                    include "db_conn.php";

                    $query = "SELECT clothing_style.id, clothing_style.name, clothing_style.description, GROUP_CONCAT(cloth.name SEPARATOR ', ') AS sources 
                              FROM clothing_style 
                              LEFT JOIN mending ON clothing_style.id = mending.id 
                              LEFT JOIN cloth ON mending.cloth_id = cloth.id 
                              GROUP BY clothing_style.id 
                              ORDER BY clothing_style.id";

                    if ($stmt = $db->query($query)) {
                        while ($result = mysqli_fetch_object($stmt)) {
                            echo "<tr class='data-row'>";
                            echo "<td class='table-sub-col'>$result->id</td>";
                            echo "<td class='table-sub-col'>$result->name</td>";
                            echo "<td class='table-sub-col'>$result->description</td>";
                            echo "<td class='table-sub-col'>" . htmlspecialchars($result->sources) . "</td>";
                            echo "<td class='table-sub-option-col'>";
                            echo "<form class='table-option-form' method='POST' action='store_del.php?id=" . urlencode($result->id) . "'>";
                            echo '<svg class="delete-button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">';
                            echo '<path d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"/>';
                            echo '</svg>';
                            echo '<input class="table-option-submit-button" type="submit" value="刪除">';
                            echo '</form>';
                            echo "<form class='table-option-form'>";
                            echo '<svg class="modify-button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">';
                            echo '<path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"/>';
                            echo '</svg>';
                            echo "<input class='table-option-submit-button' type='button' value='修改' onclick=\"handleModifyInputFieldOnOpen('$result->id', '$result->name', '$result->description')\">";
                            echo '</form>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
        </div>
    </div>
    <div class="navbar">
        <div class="navbar-container">
            <a href="home.html">
                <div class="nav-button home-nav-button">
                    <svg class="home-icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 64 64">
                        <path d="M 32 3 L 1 28 L 1.4921875 28.654297 C 2.8591875 30.477297 5.4694688 30.791703 7.2304688 29.345703 L 32 9 L 56.769531 29.345703 C 58.530531 30.791703 61.140812 30.477297 62.507812 28.654297 L 63 28 L 54 20.742188 L 54 8 L 45 8 L 45 13.484375 L 32 3 z M 32 13 L 8 32 L 8 56 L 56 56 L 56 35 L 32 13 z M 26 34 L 38 34 L 38 52 L 26 52 L 26 34 z"/>
                    </svg>
                </div>
            </a>
            <a href="clothing_info.php">
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
            <a href="clothing_style.php">
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
            <a href="store.php">
                <div class="nav-button store-nav-button">
                    <svg class="store-icon" viewBox="0 -52 616 616" xmlns="http://www.w3.org/2000/svg">
                        <path d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
    <script>
        function handleModifyInputFieldOnOpen(id, name, description) {
            showInputElement("modify-editor");
            showInputElement("modify-editor-form");
            hideInputElement("add-editor");
            hideInputElement("add-editor-form");

            document.querySelector('.modify-id-input').value = id;
            document.querySelector('.modify-name-input').value = name;
            document.querySelector('.modify-description-input').value = description;

            const form = document.getElementById('modify-editor-form');
            form.action = `clothing_style_mdysave.php?id=${encodeURIComponent(id)}`;
        }

        const handleAddInputFieldOnOpen = () => {
            showInputElement("add-editor");
            showInputElement("add-editor-form");
            hideInputElement("modify-editor");
            hideInputElement("modify-editor-form");
        }

        const handleAddInputFieldOnClose = () => {
            hideInputElement("add-editor");
            hideInputElement("add-editor-form");
        }

        const handleModifyInputFieldOnClose = () => {
            hideInputElement("modify-editor");
            hideInputElement("modify-editor-form");
        }

        const showInputElement = function(elementId) {
            event.preventDefault();
            const inputElement = document.getElementById(elementId);
            inputElement.classList.remove("hide");
        }

        const hideInputElement = function(elementId) {
            event.preventDefault();
            const inputElement = document.getElementById(elementId);
            inputElement.classList.add("hide");
        }
    </script>
</body>
</html>