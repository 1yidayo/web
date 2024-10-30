<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>輔仁大學教室預借系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <!-- <link rel="stylesheet" href="123.css"> -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!--導覽列-->
    <div class="header">
        <h1>輔仁大學教室預借系統</h1>
        <div class="nav">
            <a href="首頁.php" target="contentFrame" style="text-decoration: none;">首頁</a>
            <a href="預借教室.php" target="contentFrame" style="text-decoration: none;">預借教室</a>
            <a href="預約紀錄.php" target="contentFrame" style="text-decoration: none;">教室預約紀錄</a>
            <a href="" target="contentFrame" style="text-decoration: none;">教室統計</a>
            <a href="" target="contentFrame" style="text-decoration: none;">評分反饋</a>
            <a href="" target="contentFrame" style="text-decoration: none;">校內資源</a>
        </div>
        <a href="" target="contentFrame"> <button type="button" class="btn btn-outline-success">帳號管理</button></a>
    </div>

    <!--iframe-->
    <div class="content">
        <iframe name="contentFrame" src="首頁.php" width="100%" height="1000" allowtransparency="true"></iframe>
    </div>
    



    <!--footer-->
    <div class="footer">
    <div class="copy-right">2024 © 輔仁大學 研究資源整合發展中心
            <br>建議使用 Chrome / Safari / Firefox瀏覽
        </div>
        <div class="copy-right">
            <i class="fa-solid fa-location-dot"></i> 地址：242062 新北市新莊區中正路 510 號 天主教輔仁大學
            <br><i class="fa-solid fa-phone"></i>電話：(02) 29052000
            <br><i class="fa-solid fa-envelope"></i>信箱：<a href="mailto:pubwww@mail.fju.edu.tw">pubwww@mail.fju.edu.tw</a>
        </div>
        <a href="#top" id="gototop"><span>返回頂端</span></a>
    </div>

    <style>
    /* 響應式設計：當視窗寬度小於600像素時 */
        @media (max-width: 600px) {
            .info, .map {
                flex: 1 1 100%;
                margin: 10px;
            }
        }
    </style>

    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>




    <script src="https://kit.fontawesome.com/e19963bd49.js" crossorigin="anonymous"></script>

    <script>
        // 页面加载完毕后执行
        document.addEventListener("DOMContentLoaded", function() {
            // 当点击回馈表单链接时显示模态框
            document.getElementById("feedback-link").addEventListener("click", function(event) {
                event.preventDefault(); // 阻止默认链接跳转行为
                document.getElementById("feedback-modal").style.display = "block";
            });
    
            // 关闭模态框的按钮点击事件
            document.getElementsByClassName("close")[0].addEventListener("click", function() {
                document.getElementById("feedback-modal").style.display = "none";
            });
    
            // 点击模态框外部关闭模态框
            window.onclick = function(event) {
                var modal = document.getElementById("feedback-modal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
    
            // 提交表单事件（这里可以添加你的提交逻辑）
            document.getElementById("feedback-form").addEventListener("submit", function(event) {
                event.preventDefault(); // 阻止表单默认提交行为
                alert("提交成功！");
                document.getElementById("feedback-modal").style.display = "none";
                // 这里可以添加更多的处理逻辑，比如提交数据到后端等
            });
        });
    </script>
    

</body>

</html>