<?php
    require ('../connector/connect.php');
    session_start();
    $madichvu = $_GET['madichvu'];
    $id_congty = $_GET['id_congty'];
    $id_gio = $_GET['id_gio'];
    $sql = "DELETE FROM chitietgioyeucau WHERE madichvu = '$madichvu' AND id_congty = '$id_congty' AND id_gio = '$id_gio'";
    $result = $conn->query($sql);
    if($result==true)
    {
        echo "Đã xóa dịch vụ khỏi giỏ";
    }
    else
    {
        echo "Lỗi xóa dịch vụ khỏi giỏ";
    }   
?>