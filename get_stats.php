<?php
// 資料庫連接
$host = "localhost";
$username = "root";
$password = "12345678";
$dbname = "users";

$link = mysqli_connect($host, $username, $password, $dbname);

// SQL 查詢：根據預約的開始日期來統計每月的預約次數
$sql = "SELECT DATE_FORMAT(start_date, '%Y-%m') AS month, COUNT(*) AS borrow_count
        FROM reservation
        GROUP BY month
        ORDER BY month";

// 執行 SQL 查詢
$result = mysqli_query($link, $sql);

// 初始化統計結果
$stats = [];

// 如果查詢成功，處理結果
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $month = $row['month'];
        $borrow_count = $row['borrow_count'];

        // 將每月的借用次數存入陣列
        $stats[$month] = $borrow_count;
    }
}

// 關閉資料庫連接
mysqli_close($link);

// 輸出統計資料作為 JSON
header('Content-Type: application/json');
echo json_encode($stats);
