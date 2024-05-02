<?php
session_start();
require ('../connector/connect.php');
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$password_md5 = md5($password);

$sql_check = "SELECT u.id_user, u.hoten, k.sl_ecoin FROM user u
                INNER JOIN chitietkh k ON u.id_user = k.id_user
                WHERE u.username = '$username' and u.password = '$password_md5'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo ('Login Success!');
    $row = $result_check->fetch_assoc();
    // print_r ($row);
    $id_user = $row['id_user'];
    $pos_check = substr($id_user, 0, 2);
    switch ($pos_check) {
        case 'KH':
            echo "Người dùng là Khách hàng";
            $userInfo = [
                'id_user' => $row['id_user'],
                'hoten' => $row['hoten'],
                'ecoin' => $row['sl_ecoin']
            ];
            // Lưu vào session
            $_SESSION['user_info'] = $userInfo;
            header('Location: ../customer/index_customer.php');
            // print_r($userInfo);
            // Thực hiện các hành động cho Khách hàng
            break;
        case 'TG':
            echo "Người dùng là Tour Guide";
            // Thực hiện các hành động cho Tour Guide
            break;
        case 'AD':
            echo "Người dùng là Admin";
            // Thực hiện các hành động cho Admin
            break;
        case 'NV':
            echo "Người dùng là Nhân viên";
            // Thực hiện các hành động cho Nhân viên
            break;
        default:
            echo "Không xác định được loại người dùng";
        // Xử lý nếu prefix không khớp với bất kỳ trường hợp nào trên
    }
} else {
    echo ('Wrong Username or Password!');
}
?>