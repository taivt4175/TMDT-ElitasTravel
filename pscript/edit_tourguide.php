<?php
// Kết nối đến cơ sở dữ liệu
require ('../connector/connect.php');

// Lấy dữ liệu JSON từ yêu cầu
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra xem dữ liệu có hợp lệ không
if ($data) {
    $id_user = $data['id_user'];
    $hoten = $data['hoten'];
    $ngaysinh = $data['ngaysinh'];
    $gioitinh = $data['gioitinh'];
    $sdt = $data['sdt'];
    $email = $data['email'];
    $cccd = $data['cccd'];
    $ngayvaolam = $data['ngayvaolam'];
    $luongcoban = $data['luongcoban'];
    $heso = $data['heso'];
    $thuongthem = $data['thuongthem'];
    $password = $data['password'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql_user = "UPDATE user SET
                hoten = '$hoten',
                ngaysinh = '$ngaysinh',
                gioitinh = '$gioitinh',
                sdt = '$sdt',
                email = '$email',
                cccd = '$cccd',
                password = '$password'
                WHERE id_user = '$id_user'";

    $sql_chitietkh = "UPDATE chitiethdv SET
                ngayvaolam = '$ngayvaolam',
                luongcoban = '$luongcoban',
                heso = '$heso',
                thuongthem = '$thuongthem'
                WHERE id_user = '$id_user'";

    if ($conn->query($sql_user) === TRUE && $conn->query($sql_chitietkh) === TRUE) {
        echo "Cập nhật thông tin hướng dẫn viên thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ";
}

// Đóng kết nối
$conn->close();
?>