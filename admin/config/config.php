<?php
    session_start();
    $mysqli = new mysqli("localhost","root","","film");

    if($mysqli->connect_errno){
        echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
        exit();
    }
?>