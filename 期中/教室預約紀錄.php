<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輔仁大學教室預借系統</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="123.css">
</head>

<body>
    <header>
        <div class="headergrid">
            <div style="margin-top: 20px; margin-left: 30px;">
                <h1 style="color: black;">輔仁大學教室預借系統</h1>
                <!-- Nav Item - User Information -->
            </div>
            <div style="margin-top: 20px; margin-left: 30px;">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="text-align: right;">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 16px;">使用者登入/註冊</span>
                    <i class="fa-regular fa-user"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div id="login-block" style="text-align: center;">
                        <button type="button" class="custom-button" onclick="window.location.href='登入.php'">登入</button><br>
                        <button type="button" class="custom-button" onclick="window.location.href='註冊.php'" style="margin-top: 10px;">註冊</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="nav">
            <div class="sidebar">
                <ul><a href="首頁.php"><img class="img" src="https://cdn3.iconfinder.com/data/icons/fluent-regular-24px-vol-4/24/ic_fluent_home_24_regular-64.png"> 首頁</img></a></ul>
                <ul><a href="教室預約紀錄.php"><img class="img" src="https://cdn2.iconfinder.com/data/icons/school-set-5/512/6-64.png"> 教室預約紀錄</img></a></ul>
                <ul><a href="教室預約使用.php"><img class="img" src="https://cdn4.iconfinder.com/data/icons/user-interface-937/24/20.clock_time_watch_date_ui-64.png"> 預約教室使用</img></a></ul>
                <ul><a href="帳號管理.php"><img class="img" src="https://cdn1.iconfinder.com/data/icons/carbon-design-system-vol-3/32/cloud--service-management-64.png"></img> 帳號管理</a></ul>
                <ul><a href="教室統計功能.php"><img class="img" src="https://cdn-icons-png.flaticon.com/128/6850/6850740.png"></img>教室統計</a></ul>
                <ul><a href="校內資源.php"><img class="img" src="https://cdn0.iconfinder.com/data/icons/miscellaneous-4-bold/64/atomizing_nuclear_atomic_core_connect-64.png"> 校內資源</img></a></ul>
                <ul><a href="評分反饋.php"><img class="img" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/mail-64.png"> 評分反饋</img></a></ul>
            </div>
        </div>
        <div class="main">
            <h1 style="margin-top: 20px;margin-left: 20px;">教室預約紀錄</h1>
            <h3 style="margin-top: 20px;margin-left: 20px;">Reservation Schedule Search</h3>
            <div class="wrapper2">
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL200-1</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL200-1.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL200-3</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL200-3.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL201</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL201.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL245</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL245.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL246</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL246.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">SL471</p>
                        </div>
                        <img src="https://th.bing.com/th/id/OIP.F-Gl_CPFXZPh2YQzAZ4ahwHaEL?w=275&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/SL471.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">LM200</p>
                        </div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/FJU_SSMG01.jpg/345px-FJU_SSMG01.jpg" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/LM200.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card" style="margin: 20px;">
                        <div class="upper-text" style="background-color:#92b8d0;">
                            <p class="card-title">LM202</p>
                        </div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/FJU_SSMG01.jpg/345px-FJU_SSMG01.jpg" class="card-img-top"
                            alt="...">
                        <div class="lower-text" style="background-color: #92b8d0;">
                            <small class=" text-muted"><a href="./教室預約紀錄/LM202.php">預約紀錄</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <footer>
        <div class="copy-right">2024 © 輔仁大學 研究資源整合發展中心
            <br>建議使用 Chrome / Safari / Firefox瀏覽
        </div>
        <div class="copy-right">
            <i class="fa-solid fa-location-dot"></i> 地址：242062 新北市新莊區中正路 510 號 天主教輔仁大學
            <br><i class="fa-solid fa-phone"></i>電話：(02) 29052000
            <br><i class="fa-solid fa-envelope"></i>信箱：<a href="mailto:pubwww@mail.fju.edu.tw">pubwww@mail.fju.edu.tw</a>
        </div>
        <a href="#top" id="gototop"><span>返回頂端</span></a>
    </footer>
</body>

</html>