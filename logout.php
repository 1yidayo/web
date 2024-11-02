<?php
session_start();
session_destroy(); // 銷毀會話
header("Location: login.php"); // 重定向到登入頁面
exit();
