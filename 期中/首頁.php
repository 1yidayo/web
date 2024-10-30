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
    <link rel="stylesheet" type="text/css" href="123.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
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
                <ul><a href="教室預約使用.php"><img class="img" src="https://cdn4.iconfinder.com/data/icons/user-interface-937/24/20.clock_time_watch_date_ui-64.png"> 預約教室使用</img></a></ul>
                <ul><a href="教室預約紀錄.php"><img class="img" src="https://cdn2.iconfinder.com/data/icons/school-set-5/512/6-64.png"> 教室預約紀錄</img></a></ul>
                <ul><a href="帳號管理.php"><img class="img" src="https://cdn1.iconfinder.com/data/icons/carbon-design-system-vol-3/32/cloud--service-management-64.png"></img> 帳號管理</a></ul>
                <ul><a href="教室統計功能.php"><img class="img" src="https://cdn-icons-png.flaticon.com/128/6850/6850740.png"></img>教室統計</a></ul>
                <ul><a href="校內資源.php"><img class="img" src="https://cdn0.iconfinder.com/data/icons/miscellaneous-4-bold/64/atomizing_nuclear_atomic_core_connect-64.png"> 校內資源</img></a></ul>
                <ul><a href="評分反饋.php"><img class="img" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/mail-64.png"> 評分反饋</img></a></ul>
            </div>
        </div>
        <div class="main">
            <div class="wrapper1">
                <div></div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="margin: 40px;">
                        <div class="carousel-item active">
                            <img src="https://www.fju.edu.tw/showImg/focus/focus1684.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.fju.edu.tw/showImg/focus/focus2293.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.fju.edu.tw/showImg/focus/focus2236.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.fju.edu.tw/showImg/focus/focus1495.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="https://newspeople.com.tw/wp-content/uploads/20160321154119_92.jpg">
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div></div>
            </div>
            <div class="main">
                <h2 style="text-align: center;">使用規則與管理辦法</h2>
                <div><br>

                    <p>&nbsp;一、輔仁大學（以下簡稱本校）提供優質教學環境而設立，為有效管理及合理使用，特訂立「輔仁大學教學場地使用管理要點」，<br>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 以下簡稱本要點。</p>
                    <p>二、權責單位：本校總務處負責場地修繕與清潔；管理學院負責場地借用管理與儀器設備維護。</p>
                    <p>三、場地類別：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1.利瑪竇大樓：LM200、LM202<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.聖言樓：SL200-1、SL200-3、SL201、SL245、SL246、SL471<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3.專業教室：</p>
                    <p>四、使用對象：本場地之使用對象及時間衝突時之優先順序如下：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1.管理學院辦公室。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.管理學院各系、所、學程及研究中心。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3.本校行政、學術單位。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4.本校校友、校外機構。</p>
                    <p>五、使用規範：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; 1.本場地以提供前項單位作為教學、學術相關活動，不得有下列情事，如有違反規定除立即停止其使用權並依法處理。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(1)違反國家法令者。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(2)違反本校規定者。 <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(3)妨害公序良俗或損害本校校譽者。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(4)使用事實與申請登記事項不符，或將場地私自轉讓他人使用、或有未經核可之營業行為者。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(5)有損害場地設備，或危及公共安全之虞時，不宜繼續使用者。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp;2.借用單位請於使用日前確認場地並測試視聽、燈光設備，使用及佈置範圍僅限原申請之借用場地，以免影響其他場地運作。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp;3.借用單位應負場地及設備維護之責，嚴禁擅自加裝燈光、音響吊具等各項設備，不得臨時另接電源或安裝其他電器設備。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;倘因使用不當致使器材或設備受損，借用單位應負賠償責任及其他法律責任。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp;4.借用單位應維護場地整潔，嚴禁吸菸、嚼檳榔，攜帶任何易燃、爆裂物等違禁品，未經同意不得食物、飲料入內。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp;5.使用單位未經同意不得調整場地內設備(含桌椅)，佈置紅布條、標語、海報、旗幟、宣傳品等，禁止使用釘槍、圖釘、<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;一般膠帶、雙面膠、泡棉膠等物品，如有損壞場地裝潢或設備，需修復原狀或照價賠償。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp;6.場地使用完畢需將桌椅回復原狀，離開前關閉電燈、空調及設備電源，離開時門、窗關閉上鎖，並切勿超過借用時間。&nbsp;</p>
                    <p>六、借用程序：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; 1. (1) 校內單位：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;需於使用日前提出申請、繳交職員證及設備使用認證卡。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(2) 校友、校外機構：<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;需備文且於使用日二週前派員至管理學院辦公室辦理。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; 2. 經核准使用本場地後，如遇管理學院有特殊需要時，得停止借用或改期使用。<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; 3. 借用單位於完成借用後，得於使用日前三日終止使用關係，並通知管理單位。<br>
                    <p style="text-align: left;">七、本場地專業教室之學期借用依管理學院專業教室使用辦法規範之。<br>
                        八、本要點經行政會議通過，報請校長核定後公布施行。修正時亦同。</p>
                    <p style="text-align: left;">&nbsp;</p>
                    <p class="center paTxs20 maTxs20 top-dotline" style="text-align: center;"><a class="btn blue" href="教室預約使用.php" target="">我要預約場地</a></p>
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