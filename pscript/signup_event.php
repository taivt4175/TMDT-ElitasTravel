<?php
// Lấy dữ liệu từ form
// Kết nối cơ sở dữ liệu MySQL
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'webdulich';

$conn = mysqli_connect($host, $username, $password, $database);
// Kiểm tra kết nối
if (!$conn) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}
$hoten = $conn->real_escape_string($_POST['input-signup-name']);
$ngaysinh = $conn->real_escape_string($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
$gioitinh = $conn->real_escape_string($_POST['gender'] === 'Nam' ? 1 : 0); // Giả định Nam là 1, Nữ là 0
$email = $conn->real_escape_string($_POST['email']);
$sdt = $conn->real_escape_string($_POST['input-signup-phone']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$cf_password = $conn->real_escape_string($_POST['cf-password']);

// Kiểm tra password và confirm password
if ($password !== $cf_password) {
    echo "Mật khẩu và xác nhận mật khẩu không khớp.";
} else {
    // Mã hóa mật khẩu bằng MD5
    $password_md5 = md5($password);
    $sql_check = "SELECT * FROM user WHERE sdt = '$sdt'";
    $result_check = $conn->query($sql_check);
    $sql_check_username = "SELECT * FROM user WHERE username = '$username'";
    $result_check_username = $conn->query($sql_check_username);

    if ($result_check->num_rows > 0) {
        echo "Số điện thoại đã được sử dụng!";
    } else {
        if ($result_check_username->num_rows > 0) {
            echo "Username đã được sử dụng!";
        } else {
            // Tạo id_user mới
            $result = $conn->query("SELECT LPAD(IFNULL(MAX(SUBSTRING(id_user, 3)), 0) + 1, 5, '0') AS new_id FROM user");
            $row = $result->fetch_assoc();
            $newUserId = 'KH' . $row['new_id'];

            // Thêm vào bảng user
            $stmt = $conn->prepare("INSERT INTO user (id_user, hoten, gioitinh, ngaysinh, sdt, username, password, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $newUserId, $hoten, $gioitinh, $ngaysinh, $sdt, $username, $password_md5, $email);
            if ($stmt->execute()) {
                // Thêm vào bảng chitietkh
                $stmt2 = $conn->prepare("INSERT INTO chitietkh (id_user) VALUES (?)");
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
    }
}
?>