<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校內資源</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="icon"
        href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="index.css">

    <style>
        body {
            color: #00000099;
        }

        /* 連結顏色&禁用底線 */
        a {
            color: #125174;
            text-decoration: none;
        }

        /* 禁用游標懸停時的底線 */
        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body style="color: #00000099;">
    <form action="dblink.php?method=setSemester" method="POST">
        <p style="margin-top: 20px; ">
            <span style="font-size: 32px">設定學期區間</span>
            <?php
            // 連接資料庫
            $link = mysqli_connect('localhost', 'root', '12345678', 'users');
            if (!$link) {
                die("資料庫連線失敗：" . mysqli_connect_error());
            }

            // 查詢目前的學期區間
            $sql = "SELECT start_date, end_date FROM semester ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($link, $sql);
            $current_semester = mysqli_fetch_assoc($result);

            if ($current_semester) {
                echo "<span style='font-size: 20px;'>【目前學期區間為：</span><span style='color: #125174; font-size: 20px;'>" . $current_semester['start_date'] . " ~ " . $current_semester['end_date'] . "</span><span style='font-size: 20px;'>】</span>";
            } else {
                echo "<span style='font-size: 20px;'>【目前學期區間未設定】</span>";
            }


            mysqli_close($link);
            ?>
        </p>
        <div>
            <label for="start_date">開始日期：</label>
            <input type="date" id="start_date" name="start_date" class="form-control" style="width: 300px;" required>

            <label for="end_date">結束日期：</label>
            <input type="date" id="end_date" name="end_date" class="form-control" style="width: 300px;" required>
        </div>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;">設定</button>
    </form>
    <br>
    <h3>帳號管理</h3>
    <table class="List" width="500" border="solid 1px black">
        <tr align="center">
            <td>使用者名稱</td>
            <td>使用者Email</td>
            <td>功能</td>
        </tr>
        <?php
        //step1
        $link = mysqli_connect('localhost', 'root', '12345678', 'users');
        //step3
        $sql = "select * from accounts where level='user'";
        $result = mysqli_query($link, $sql);
        //step4
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>", $row['username'], "</td><td>", $row['email'], "</td><td align='center'><a href=dblink.php?method=delete&username=", $row['username'], ">[刪除]</a></td></tr>";
            //echo "<tr><td>", $row['username'], "</td><td>", $row['email'],"</td><td align='center'><a href=update.php?username=",$row['username'],">[修改]</a>&nbsp;<a href=dblink.php?method=delete&username=",$row['username'],">[刪除]</a></td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>評分反饋</h3>
    <table class="List" width="800" border="solid 1px black">
        <tr align="center">
            <td>姓名</td>
            <td>電子郵件</td>
            <td>電話號碼</td>
            <td>借用教室</td>
            <td>借用日期</td>
            <td>使用感受</td>
            <td>待改進之處</td>
        </tr>
        <?php
        //step1
        $link = mysqli_connect('localhost', 'root', '12345678', 'feedback');
        //step3
        $sql = "select * from content";
        $result = mysqli_query($link, $sql);
        //step4
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>", $row['name'], "</td>
                <td>", $row['email'], "</td>
                <td>", $row['phone'], "</td>
                <td>", $row['classroom'], "</td>
                <td>", $row['date'], "</td>
                <td>", $row['feeling'], "</td>
                <td>", $row['message'], "</td>
                </tr>";
        }
        ?>
    </table>
    </div>
    </div>
    <br>

    <script>
        function setDateRange() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (!startDate || !endDate) {
                alert("請選擇開始和結束日期。");
                return;
            }

            // 確保結束日期在開始日期之後
            if (new Date(startDate) > new Date(endDate)) {
                alert("結束日期必須在開始日期之後。");
                return;
            }

            // 在這裡可以處理日期範圍（例如，發送到伺服器或其他操作）
            alert("學期區間已設定：從 " + startDate + " 到 " + endDate);
        }
    </script>
</body>

</html>