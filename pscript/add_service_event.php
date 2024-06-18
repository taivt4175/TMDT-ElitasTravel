<?php
session_start();
require ('../connector/connect.php');
$madichvu = $_POST['madichvu'];
$name = $_POST['name'];
$description = $_POST['description'];
$detail = $_POST['detail'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$status = $_POST['status'];
$userInfo = $_SESSION['user_info'];
$id_user = $userInfo['id_user'];
$fileUpload = "";

$target_dir = "../img/uploads/";
$errors = array();  // Mảng để lưu trữ thông báo lỗi cho mỗi file

// Duyệt qua từng file được tải lên
$total_files = count($_FILES['fileUpload']['name']);
if ($total_files > 10) {
    echo "Chỉ được phép tải lên tối đa 10 ảnh!";
} else {
    for ($i = 0; $i < $total_files; $i++) {
        $original_name = basename($_FILES['fileUpload']['name'][$i]);
        $imageFileType = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
        $new_name = $madichvu . "_" . $id_user . "_" . $original_name;
        $target_file = $target_dir . $new_name;

        // $target_file = $target_dir . basename($_FILES['fileUpload']['name'][$i]);
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = false;

        // Kiểm tra kích thước file
        if ($_FILES['fileUpload']['size'][$i] > 5242880) {
            $errors[$i] = "File '" . $original_name . "' quá lớn, vui lòng chọn file nhỏ hơn 5MB.";
            $error = true;
        }

        // Kiểm tra định dạng file
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $errors[$i] = "File '" . $original_name . "' có định dạng không hợp lệ! . Vui lòng chọn file ảnh dạng .JPG, .JPEG, .PNG hoặc .GIF !";
            $error = true;
        }

        // Kiểm tra file đã tồn tại chưa
        if (file_exists($target_file)) {
            $errors[$i] = "Ảnh '" . $original_name . "' đã tồn tại!";
            $error = true;
        }

        // Nếu không có lỗi, tiến hành lưu file
        if (!$error) {
            if (!move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i], $target_file)) {
                $errors[$i] = "Có lỗi xảy ra khi tải file lên.";
            } else {
                $errors[$i] = "File '" . htmlspecialchars(basename($_FILES['fileUpload']['name'][$i])) . "' đã được tải lên thành công.";
                $fileUpload = $fileUpload . $target_file . ";";
            }
        }
    }

    // Hiển thị thông báo lỗi hoặc thành công cho mỗi file
    foreach ($errors as $message) {
        echo $message . "<br>";
    }

    if (!$error) {
        $sql = "INSERT INTO dichvu(madichvu,tendichvu,id_user,motadichvu,motachitiet,gia,donvitinh,tinhtrang,hinhanh) VALUES 
                ('$madichvu','$name','$id_user','$description','$detail','$price','$unit','$status','$fileUpload')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Thêm dịch vụ thành công';
        } else {
            echo 'Thêm dịch vụ thất bại';
        }
    }
}
?>