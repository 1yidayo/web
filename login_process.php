<?php

//必須在使用session變數之前啟動session
session_start();

//檢查是否取得POST內容
$account = $_POST['account'] ?? ["N/A"];
$password = $_POST['password'] ?? ["N/A"];

//檢查帳號密碼是否正確
if ($account == "root" && $password == "password") {
    // 將帳號存入 session 變數
    $_SESSION["account"] = $account;
    // 導向成功頁面
    header("Location: 預借教室.php?page=one");
    exit();
} else {
    // 登入失敗，將錯誤消息存入 session
    $_SESSION["error_message"] = "登入失敗，請檢查您的帳號和密碼。";
    // 導向回登入頁
    header("Location: login.php");
    exit();
}
