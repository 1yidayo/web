<?php
session_start();

// 獲取用戶輸入
$account = $_POST['account'];
$password = $_POST['password'];

// 檢查帳號密碼是否正確
if ($account == "root" && $password == "password") {
    // 將帳號存入 session 變數
    $_SESSION['is_login'] = true;
    header("Location: 預借教室.php?page=one");
    // 導向成功頁面
    exit();
} else {
    $_SESSION['is_login'] = false;
    // 如果不匹配，跳轉回 login.php 並傳遞 msg 變數
    header("Location: login.php?msg=帳號或密碼錯誤");
    exit();
}
