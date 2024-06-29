<?php
    session_start();
    // var_dump($_POST); // Thêm dòng này để kiểm tra dữ liệu POST
    require('../connector/connect.php');
    // $lichtrinhchitiet = $_POST['lichtrinhchitiet'];
    // echo 'Lịch trình chi tiết là: ' . $lichtrinhchitiet . '</br>';
    // print_r($_POST);
    // print_r($_GET);
    $madichvu = $_POST['madichvu'];
    $madoanhnghiep = $_SESSION['user_info']['id_user'];
    $tendichvu = $_POST['name'];
    $motadichvu = $_POST['description'];
    $motadchitiet = $_POST['detail'];
    $lichtrinhchitiet = $_POST['lichtrinhchitiet'];
    $gianguoilon = $_POST['person-price'];
    $giatreem = $_POST['child-price'];
    $donvitinh = $_POST['unit'];
    $tinhtrang = $_POST['status'];
    echo 'Lịch trình chi tiết là: ' . $lichtrinhchitiet . '</br>';
    echo 'Nôi dung textarea: ' . $lichtrinhchitiet . '</br>';
    echo 'Mã dịch vụ: ' . $madichvu . '</br>';
    $sql = "UPDATE dichvu SET 
            tendichvu = '$tendichvu', motadichvu = '$motadichvu', motachitiet = '$motadchitiet', lichtrinhchitiet = '$lichtrinhchitiet', gianguoilon = '$gianguoilon', giatreem = '$giatreem', donvitinh = '$donvitinh', tinhtrang = '$tinhtrang' 
            WHERE madichvu = '$madichvu' AND id_user = '$madoanhnghiep'";
    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật dịch vụ thành công!";
    } else {
        echo "Cập nhật dịch vụ thất bại!";
    }
?>