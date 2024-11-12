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
    <div class="main container">
        <h1 style="margin-top: 20px; font-size: 30px">設定學期區間</h1>
        <div>
            <label for="startDate">開始日期：</label>
            <input type="date" id="startDate" class="form-control" required>

            <label for="endDate">結束日期：</label>
            <input type="date" id="endDate" class="form-control" required>
        </div>
        <button class="btn btn-outline-dark" onclick="setDateRange()" style="margin-top: 10px;">設定</button>

        <h1 style="margin-top: 20px; font-size: 30px">刪除帳號</h1>
        <button type="button" class="btn btn-outline-danger">確定刪除</button>
    </div>
    <br>
    <div>
        <table class="List" width="500" border="solid 1px black" style="margin: left 300px;">
            <caption class="ListCap">帳號管理</caption>
            <tr align="center">
                <td>使用者名稱</td>
                <td>使用者Email</td>
            </tr>
            <?php
            //step1
            $link = mysqli_connect('localhost', 'root', '12345678', 'users');
            //step3
            $sql = "select * from account";
            $result = mysqli_query($link, $sql);
            //step4
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>", $row['username'], "</td><td>", $row['email'], "</td></tr>";
            }
            ?>
        </table>
    </div>


    <script>
        function setDateRange() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

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