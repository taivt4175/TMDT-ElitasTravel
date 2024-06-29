<?php
    require('../connector/connect.php');
    $id_user = $userInfo['id_user'];
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $stkmomo = $_POST['stkmomo'];
    $stkbidv = $_POST['stknbidv'];
    $stkmastercard = $_POST['mastercard'];
    $sql1 = "UPDATE user SET hoten = '$hoten', email = '$email', sdt = '$sdt' WHERE id_user = '$id_user'";
    $sql2 = "UPDATE chitietkh SET stk_momo = '$stkmomo', stk_bidv = '$stkbidv', mastercard = '$stkmastercard' WHERE id_user = '$id_user'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if ($result1 && $result2) {
        echo '<script>alert("Chỉnh sửa thông tin cá nhân thành công");</script>';
    } else {
        echo '<script>alert("Chỉnh sửa thông tin cá nhân thất bại");</script>';
        //Hiện chi tiêt lỗi
        echo '<script>alert("Chỉnh sửa thông tin cá nhân thất bại' .mysqli_error($conn). '");</script>';
    }
?>