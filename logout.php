<?php
session_start();
session_unset();
header("Location: login.php"); // 重定向到登入頁面
exit();
