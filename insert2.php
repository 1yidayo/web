<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="2;url=評分反饋.php">
</head>

<body>
    <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $classroom = $_POST['classroom'];
        $date = $_POST['date'];
        $feeling = $_POST['feeling'];
        $message = $_POST['message'];

        //step1
        $link = mysqli_connect('localhost', 'root', '12345678', 'feedback');
        //step3
        $sql = "insert into content(name,email,phone,classroom,date,feeling,message) values('$name','$email','$phone','$classroom','$date','$feeling','$message')";
        if (mysqli_query($link, $sql)) {
            echo "回饋成功", "<br>";
        } else {
            echo "回饋失敗", "<br>";
        }
    ?>
</body>

</html>