<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="1;url=使用者設定.php">
</head>

<body>
    <?php
    $method = $_GET['method'] ?? null;

    // 處理學期日期範圍的設定
    if ($method == 'setSemester') {
        // 取得表單傳來的開始日期和結束日期
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // 連接資料庫
        $link = mysqli_connect('localhost', 'root', '12345678', 'users');
        
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // 插入學期設定
        $sql = "INSERT INTO semester (start_date, end_date) VALUES ('$start_date', '$end_date')";

        if (mysqli_query($link, $sql)) {
            echo "學期區間設定成功！", "<br>";
        } else {
            echo "學期區間設定失敗：", mysqli_error($link), "<br>";
        }

        // 關閉資料庫連接
        mysqli_close($link);
    }

    // 原來的帳號修改和刪除處理
    elseif ($method == 'delete') {
        $username = $_GET['username'];
        $link = mysqli_connect('localhost', 'root', '12345678', 'users');
        $sql = "DELETE FROM accounts WHERE username='$username'";

        if (mysqli_query($link, $sql)) {
            echo "刪除成功", "<br>";
        } else {
            echo "刪除失敗", "<br>";
        }

        // 關閉資料庫連接
        mysqli_close($link);
    }
    ?>
</body>

</html>
