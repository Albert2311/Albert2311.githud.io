<?php
include_once("connection3.php");
        $sql_xoa = "DELETE FROM khachhang WHERE id_kh = " . $_GET["id_kh"];
        mysqli_query($conn, $sql_xoa);
        header('Location: user.php');
        ?>