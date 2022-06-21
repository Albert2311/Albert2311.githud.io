<?php
session_start();
session_unset();
session_destroy();
header('location: QUẢN LÝ BÁN QUẦN ÁO\dangnhap.php');
?>