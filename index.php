<?php
session_start();

// 判斷是否登入和是否為管理員
$is_logged_in = isset($_SESSION['username']);
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輔仁大學教室預借系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="icon"
        href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
    <style>
        body {
            background: linear-gradient(315deg, #ffffff 0%, rgb(215, 225, 224) 74%);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        .header {
            display: flex;
            /* flex-direction: column; */
            padding: 10px 20px;
        }

        .header h1 {
            margin-top: 10px;
            margin-left: 45px;
            margin-bottom: 15px;
        }

        .nav {
            display: flex;
            gap: 15px;
            flex-wrap: nowrap;
        }

        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: none;
            width: 50px;
            height: 50px;
            background-color: #aec4d2;
            color: #ffffff;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            transition: background-color 0.3s ease, opacity 0.3s ease;
            opacity: 0.8;
            z-index: 1000;
        }

        .back-to-top:hover {
            background-color: rgb(215, 225, 224);
            color: white;
            opacity: 1;
        }

        .back-to-top i {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <!--導覽列-->
    <div class="header">
        <h1>輔仁大學教室預借系統</h1>
        <div class="nav">
            <a href="首頁.php" target="contentFrame" style="text-decoration: none;">首頁</a>
            <a href="預借教室.php" target="contentFrame" style="text-decoration: none;" <?php if (!$is_logged_in)
                echo 'onclick="window.open(\'login.php\', \'contentFrame\'); return false;"'; ?>>預借教室</a>
            <a href="預借紀錄.php" target="contentFrame" style="text-decoration: none;">教室預借紀錄</a>
            <a href="教室統計.php" target="contentFrame" style="text-decoration: none;">教室統計</a>
            <a href="評分反饋.php" target="contentFrame" style="text-decoration: none;">評分反饋</a>
            <a href="校內資源.php" target="contentFrame" style="text-decoration: none;">校內資源</a>

            <!-- 顯示「設定」選項 -->
            <?php if ($is_logged_in): ?>
                <a href="<?= $is_admin ? '管理者設定.php' : '使用者設定.php' ?>" target="contentFrame"
                    style="text-decoration: none;">設定</a>
            <?php endif; ?>
        </div>

        <!-- 顯示登入或登出按鈕 -->
        <?php if ($is_logged_in): ?>
            <a href="logout.php" target="contentFrame"><button type="button" class="btn btn-outline-danger">登出</button></a>
        <?php else: ?>
            <a href="login.php" target="contentFrame"><button type="button" class="btn btn-outline-success">登入</button></a>
        <?php endif; ?>
    </div>

    <!--iframe-->
    <div class="content">
        <iframe name="contentFrame" src="首頁.php" width="100%" height="1000" allowtransparency="true"></iframe>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="copy-right">
            <i class="fa-solid fa-location-dot"></i> 地址：242062 新北市新莊區中正路 510 號 天主教輔仁大學
            <br><i class="fa-solid fa-phone"></i>電話：(02) 29052000
            <br><i class="fa-solid fa-envelope"></i>信箱：<a
                href="mailto:pubwww@mail.fju.edu.tw">pubwww@mail.fju.edu.tw</a>
        </div>
    </div>

    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e19963bd49.js" crossorigin="anonymous"></script>
    <script>
        // 顯示回到頂部按鈕
        window.onscroll = function () {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.querySelector('.back-to-top').style.display = 'block';
            } else {
                document.querySelector('.back-to-top').style.display = 'none';
            }
        };

        // 點擊回到頂部
        document.querySelector('.back-to-top').addEventListener('click', function (event) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    <a href="#" class="back-to-top" style="text-decoration: none; font-size: 30px">
        <p class="ri-arrow-up-line"><b>↑</b></p>
    </a>
</body>

</html>