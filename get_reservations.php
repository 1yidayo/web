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

$sql = "SELECT * FROM reservation";
$result = mysqli_query($link, $sql);

$reservations = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = [
            'id' => $row['id'],
            'title' => $row['name'],
            'start' => $row['start_date'] . 'T' . $row['start_time'],
            'end' => $row['end_date'] . 'T' . $row['end_time'],
            'extendedProps' => [
                'email' => $row['email'],
                'phone' => $row['phone']
            ]
        ];
    }
}

mysqli_close($link);

echo json_encode($reservations);
