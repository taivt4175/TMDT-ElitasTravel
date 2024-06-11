<?php
session_start();
require ('../connector/connect.php');
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$password_md5 = md5($password);
$sql_check = "SELECT * FROM user
                WHERE email = '$email' and password = '$password_md5'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    $row = $result_check->fetch_assoc();
    if ($row['account_status'] == 1) {
        echo ('Login Success!');
        $id_user = $row['id_user'];
        $pos_check = substr($id_user, 0, 2);
        switch ($pos_check) {
            case 'KH':
                echo "Người dùng là Khách hàng";
                $userInfo = [
                    'id_user' => $row['id_user'],
                    'hoten' => $row['hoten'],
                ];
                // Lưu vào session
                $_SESSION['user_info'] = $userInfo;
                header('Location: index.php');
                echo ('Login Success!');
                // print_r($userInfo);
                // Thực hiện các hành động cho Khách hàng
                break;
            case 'TG':
                echo "Người dùng là Tour Guide";
                // Thực hiện các hành động cho Tour Guide
                break;
            case 'AD':
                echo "Người dùng là Admin";
                header('Location: ../admin/adminform.php');
                // Thực hiện các hành động cho Admin
                break;
            case 'KS':
                echo "Người dùng là KS";
                $userInfo = [
                    'id_user' => $row['id_user'],
                    'hoten' => $row['hoten'],
                ];
                // Lưu vào session
                $_SESSION['user_info'] = $userInfo;
                header('Location: ../customer/index_company.php');
                break;
            case 'CT':
                echo "Người dùng là Công ty";
                break;
            case 'NH':
                echo "Người dùng là Nha hàng";
                break;
            case 'NX':
                echo "Người dùng là Nhà xe";
                break;
            default:
                echo "Không xác định được loại người dùng";
            // Xử lý nếu prefix không khớp với bất kỳ trường hợp nào trên
        }
    } else {
        echo ('Tài khoản đã bị khóa!Vào mục "HỖ TRỢ" để biết thêm thông tin!');
    }
} else {
    echo ('Sai tên đăng nhập hoặc mật khẩu!');
}
?>