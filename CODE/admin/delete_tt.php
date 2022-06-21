<?php
include_once("connection3.php");
        $sql_xoa = "DELETE FROM tintuc WHERE id_tt =".$_GET["id_tt"];
        mysqli_query($conn, $sql_xoa);
        header('Location: admin_tintuc.php');
        ?>