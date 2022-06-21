<?php
include_once("connection3.php");
        $sql_xoa = "DELETE FROM nhanvien WHERE id_nv=".$_GET["id_nv"];
        mysqli_query($conn, $sql_xoa);
        header('Location: nhanvien.php');
        ?>