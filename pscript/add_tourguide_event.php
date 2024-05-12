<?php
$hoten = $conn->real_escape_string($_POST['input-signup-name']);
$ngaysinh = $conn->real_escape_string($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
$gioitinh = $conn->real_escape_string($_POST['gender'] === 'Nam' ? 1 : 0); // Giả định Nam là 1, Nữ là 0
$email = $conn->real_escape_string($_POST['email']);
$sdt = $conn->real_escape_string($_POST['input-signup-phone']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$cf_password = $conn->real_escape_string($_POST['cf-password']);

if (empty($hoten) || empty($ngaysinh) || empty($gioitinh) || empty($email) || empty($sdt) || empty($username) || empty($password) || empty($cf_password)) {
    echo "Vui lòng điền đầy đủ thông tin!";
    exit();
} else {
    require ('../connector/connect.php');
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
                // Tạo id_user mới cho HDV
                $result = $conn->query("SELECT LPAD(IFNULL(MAX(SUBSTRING(id_user, 3)), 0) + 1, 5, '0') AS new_id FROM user");
                $row = $result->fetch_assoc();
                $newUserId = 'TG' . $row['new_id'];

                // Thêm vào bảng user

                
                
                // Thêm vào bảng chitiettourguide

                $stmt2->close();
                $stmt->close();
                $conn->close();
            }
        }
    }
}
?>