<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="2;url=SL200-1(2).php">
</head>

<body>
    <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // 將 "semester_reservation" 的值轉換為 1 或 0
    $semester_reservation = ($_POST['semester_reservation'] == 'yes') ? 1 : 0; // 如果選擇 "yes"，設為 1，否則設為 0
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];

    //step1
    $link = mysqli_connect('localhost', 'root', '12345678', 'users');
    //step3
    $sql = "insert into reservation(name,email,phone,semester_reservation,start_date,start_time,end_date,end_time) values('$name','$email','$phone','$semester_reservation','$start_date','$start_time','$end_date','$end_time')";
    if (mysqli_query($link, $sql)) {
        echo "預約成功", "<br>";
    } else {
        echo "預約失敗", "<br>";
    }
    ?>
</body>

</html>