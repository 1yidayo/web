<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 假設 admin 是管理員帳號，密碼為 admin_password
    if ($username == "admin" && $password == "admin_password") {
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true; // 設置為管理員
        // 登入成功，刷新父頁面並關閉當前 iframe 頁面
        echo '<script>
                parent.location.reload();
              </script>';
        exit();
    }
    // 普通用戶登入
    elseif ($username == "root" && $password == "password") {
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = false; // 非管理員
        // 登入成功，刷新父頁面並關閉當前 iframe 頁面
        echo '<script>
                parent.location.reload();
              </script>';
        exit();
    } else {
        echo "登入失敗";
    }
} else {
    echo "請填寫帳號和密碼";
}
