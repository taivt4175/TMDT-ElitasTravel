<?php
require ('../connector/connect.php');
$company_name = $_POST['company_name'];
$company_tax_code = $_POST['company_tax_code'];
$company_address = $_POST['company_address'];
$company_phone = $_POST['company_phone'];
$company_email = $_POST['company_email'];
$company_password = $_POST['company_password'];
$company_password_confirm = $_POST['company_password_confirm'];
$com_type = $_POST['com_type'];
switch ($com_type) {
    case 'NX':
        $com_type = 'NX';
        break;
    case 'CT':
        $com_type = 'CT';
        break;
    case 'KS':
        $sql = "SELECT * FROM chitietks WHERE masothue = '$company_tax_code' AND trust='1'";
        break;
    case 'NH':
        $sql = "SELECT * FROM chitietnh WHERE masothue = '$company_tax_code' AND trust='1'";
        break;
    default:
        break;
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "Công ty/Doanh nghiệp này đã tồn tại!";
} else {
    $result = $conn->query("SELECT LPAD(IFNULL(MAX(SUBSTRING(id_user, 3)), 0) + 1, 5, '0') AS new_id FROM user");
    $row = $result->fetch_assoc();
    $madoanhnghiep = $com_type . $row['new_id'];
    // Thêm vào bảng user
    $stmt = $conn->prepare("INSERT INTO user (id_user, hoten, sdt, password, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $madoanhnghiep, $company_name, $company_phone, $company_password, $company_email);
    if ($stmt->execute()) {
        // Thêm vào bảng chitietkh
        $com_type = $conn->real_escape_string($com_type);
        switch ($com_type) {
            case 'CT':
                $stmt2 = $conn->prepare("INSERT INTO chitietct (id_user) VALUES (?)");
                $stmt2->bind_param("s", $madoanhnghiep);
                $name = "Công ty";
                break;
            case 'NX':
                $stmt2 = $conn->prepare("INSERT INTO chitietnhaxe (id_user) VALUES (?)");
                $stmt2->bind_param("s", $madoanhnghiep);
                $name = "Nhà xe";
                break;
            case 'KS':
                $stmt2 = $conn->prepare("INSERT INTO chitietks(id_user) VALUES (?)");
                $stmt2->bind_param("s", $madoanhnghiep);
                $name = "Khách sạn";
                break;
            case 'NH':
                $stmt2 = $conn->prepare("INSERT INTO chitietnh(id_user) VALUES (?)");
                $stmt2->bind_param("s", $madoanhnghiep);
                $name = "Nhà hàng";
                break;
            default:
                break;
        }
        if ($stmt2->execute()) {
            echo "Đăng ký thành công!, Chào mừng " . $company_name . " gia nhập vào hệ thống!";
        } else {
            echo "Lỗi khi thêm dữ liệu: " . $conn->error;
        }
        $stmt2->close();
        $stmt->close();
    } else {
        echo "Lỗi khi thêm dữ liệu! " . $conn->error;
    }
    $conn->close();
}
?>