<?php
session_start();
session_unset();
session_destroy();
header("Location: 首頁.php");
exit();
