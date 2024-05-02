<?php
// Kết nối cơ sở dữ liệu MySQL
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'webdulich';

$conn = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}
?>