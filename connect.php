<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "ltw3_db";

$conn = mysqli_connect('localhost', 'root', '', 'ltw3_db');

if (!$conn) {
    die("<script>alert('Lỗi kết nối')</script>");
}
session_start();
?>