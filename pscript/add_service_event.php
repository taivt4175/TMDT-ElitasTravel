<?php
    session_start();
    require('../connector/connect.php');
    $name = $_POST['name'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $userInfo = $_SESSION['user_info'];
    $id_user = $userInfo['id_user'];
    echo $id_user;
    $sql = "INSERT INTO dichvu(tendichvu,id_user,motadichvu,gia,donvitinh,tinhtrang) VALUES 
            ('$name', '$id_user', '$description', '$price', '$unit', '$status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'alert("Thêm dịch vụ thành công")';
    } else {
        echo 'alert("Thêm dịch vụ thất bại")';
    }
?>