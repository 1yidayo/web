<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $username = $_GET['username'];
    //step1
    $link = mysqli_connect('localhost', 'root', '12345678', 'users');
    //step3
    $sql = "select distinct * from account where username='$username'";
    $result = mysqli_query($link, $sql);
    //step4
    if ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $password = $row['password'];
    }
    ?>
    <form action="dblink.php" method="post">
        <table class="RedList" width="500" align="center">
            <tr align="center">
                <td>使用者名稱</td>
                <td><input type="text" name="username" value="<?php echo $username ?>" readonly></td>
            </tr>
            <tr align="center">
                <td>使用者Email</td>
                <td><input type="text" name="email" value="<?php echo $email ?>" required></td>
            </tr>
            <tr align="center">
                <td>密碼</td>
                <td><input type="text" name="password" value="<?php echo $password ?>" required></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit"><input type="reset"></td>
            </tr>
        </table>
    </form>
</body>

</html>