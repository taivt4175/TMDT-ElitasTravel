<?php
    session_start();
    $madichvu = $_GET['madichvu'];
    $id_congty = $_GET['id_congty'];
    $id_user = $_SESSION['user_info']['id_user'];
    require ('../connector/connect.php');
    $sql1 = "SELECT id_gio FROM gioyeucau WHERE id_user = '$id_user'"; // Lấy id_gio của user
    $result1 = $conn->query($sql1);
    if($result1==true)
    {   
        $row1 = $result1->fetch_assoc();
        $id_gio = $row1['id_gio'];
        $sql2 = "INSERT INTO chitietgioyeucau(id_gio,madichvu,id_congty,sl,ngayyeucau,ngaybatdau,daxacnhan) VALUES
        ('$id_gio','$madichvu','$id_congty',1,now(),now(),0)";
        $result2 = $conn->query($sql2);
        if($result2==true)
        {
            echo "Đã thêm vào giỏ";
            $_GET = array();
        }
        else
        {
            echo "Lỗi thêm vào giỏ";
        }
    }
?>