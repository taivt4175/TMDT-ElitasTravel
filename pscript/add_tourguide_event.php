<?php
require ('../connector/connect.php');
$hoten = $conn->real_escape_string($_POST['input-signup-name']);
$ngaysinh = $conn->real_escape_string($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
$gioitinh = $conn->real_escape_string($_POST['gender'] === 'Nam' ? 1 : 0); // Giả định Nam là 1, Nữ là 0
$email = $conn->real_escape_string($_POST['email']);
$sdt = $conn->real_escape_string($_POST['input-signup-phone']);
$password = $conn->real_escape_string($_POST['password']);
$cf_password = $conn->real_escape_string($_POST['cf-password']);

$password_md5 = md5($password);
$sql_check = "SELECT * FROM user WHERE sdt = '$sdt'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Số điện thoại đã được sử dụng!";
    return;
} else {
    // Tạo id_user mới
    $result = $conn->query("SELECT LPAD(IFNULL(MAX(SUBSTRING(id_user, 3)), 0) + 1, 5, '0') AS new_id FROM user");
    $row = $result->fetch_assoc();
    $newUserId = 'TG' . $row['new_id'];

    // Thêm vào bảng user
    $stmt = $conn->prepare("INSERT INTO user (id_user, hoten, gioitinh, ngaysinh, sdt, password, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $newUserId, $hoten, $gioitinh, $ngaysinh, $sdt, $password_md5, $email);
    if ($stmt->execute()) {
        // Thêm vào bảng chitiethdv
        $stmt2 = $conn->prepare("INSERT INTO chitiethdv (id_user) VALUES (?)");
        $stmt2->bind_param("s", $newUserId);
        if ($stmt2->execute()) {
            echo "Đăng ký thành công!";
        } else {
            echo "Lỗi khi thêm vào bảng chitietkh: " . $conn->error;
        }
        $stmt2->close();
        $stmt->close();
    } else {
        echo "Lỗi khi thêm vào bảng user: " . $conn->error;
    }
    $conn->close();
}
?>