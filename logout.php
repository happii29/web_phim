<?php
session_start();
// remove all session
session_unset();
// destroy the session
session_destroy();
header("Location:dangnhap.php");
?>