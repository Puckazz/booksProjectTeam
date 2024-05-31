<?php
session_start();
unset($_SESSION['is-login']);
header("Location: ./dangNhap.php");
?>