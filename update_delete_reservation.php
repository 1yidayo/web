<?php
// 資料庫連接
$host = "localhost";
$username = "root";
$password = "12345678";
$dbname = "users";

$link = mysqli_connect($host, $username, $password, $dbname);

if (!$link) {
    die("資料庫連接失敗: " . mysqli_connect_error());
}

if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];

    // 根據 'action' 執行不同的操作
    if ($_POST['action'] == 'update') {
        // 更新操作
        $start_date = $_POST['start_date'];
        $start_time = $_POST['start_time'];
        $end_date = $_POST['end_date'];
        $end_time = $_POST['end_time'];

        // 執行更新 SQL 查詢
        $sql = "UPDATE reservation SET 
                    start_date='$start_date', start_time='$start_time', 
                    end_date='$end_date', end_time='$end_time' 
                WHERE id='$id'";

        if (mysqli_query($link, $sql)) {
            echo "預約時間更新成功";
        } else {
            echo "錯誤: " . mysqli_error($link);
        }
    } elseif ($_POST['action'] == 'delete') {
        // 刪除操作
        $sql = "DELETE FROM reservation WHERE id='$id'";

        if (mysqli_query($link, $sql)) {
            echo "預約刪除成功";
        } else {
            echo "錯誤: " . mysqli_error($link);
        }
    } else {
        echo "未知的操作";
    }
} else {
    echo "缺少必要的參數";
}

mysqli_close($link);
?>
