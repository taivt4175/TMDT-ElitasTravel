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
    $sl_ecoin = $data['sl_ecoin'];
    $stk_momo = $data['stk_momo'];
    $stk_bidv = $data['stk_bidv'];
    $mastercard = $data['mastercard'];
    $wrongpass = $data['wrongpass'];
    $account_status = $data['account_status'];
    $password = $data['password'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql_user = "UPDATE user SET
                hoten = '$hoten',
                ngaysinh = '$ngaysinh',
                gioitinh = '$gioitinh',
                sdt = '$sdt',
                email = '$email',
                cccd = '$cccd',
                password = '$password',
                wrongpass = '$wrongpass',
                account_status = '$account_status'
                WHERE id_user = '$id_user'";

    $sql_chitietkh = "UPDATE chitietkh SET
                sl_ecoin = '$sl_ecoin',
                stk_momo = '$stk_momo',
                stk_bidv = '$stk_bidv',
                mastercard = '$mastercard'
                WHERE id_user = '$id_user'";

    if ($conn->query($sql_user) === TRUE && $conn->query($sql_chitietkh) === TRUE) {
        echo "Cập nhật thông tin khách hàng thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ";
}

// Đóng kết nối
$conn->close();
?>