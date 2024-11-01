<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用者登入</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2>登入</h2>
            <form action="login_process.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input placeholder="帳號" class="form-control" type="text" name="account" require><br>
                    <label>Account</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input placeholder="密碼" class="form-control" type="password" name="password" require><br>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        記住我
                    </label>

                </div>
                <button type="submit" class="btn">Login</button>

                <?php
                session_start();

                // 顯示錯誤消息
                if (isset($_SESSION["error_message"])) {
                    echo '<script>alert("' . $_SESSION["error_message"] . '");</script>';
                    unset($_SESSION["error_message"]); // 清除錯誤消息
                }
                ?>


                <div class="login-register">
                    <p>還沒有帳號?<a href="register.php" class="regist-link">
                            註冊
                        </a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>