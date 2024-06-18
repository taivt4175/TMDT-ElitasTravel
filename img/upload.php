<?php
$target_dir = "img/uploads/";
$errors = array();  // Mảng để lưu trữ thông báo lỗi cho mỗi file

// Duyệt qua từng file được tải lên
$total_files = count($_FILES['fileUpload']['name']);
if ($total_files > 10) {
  echo "Chỉ được phép tải lên tối đa 10 ảnh!";
} else {
  for ($i = 0; $i < $total_files; $i++) {
    $original_name = basename($_FILES['fileUpload']['name'][$i]);
    $imageFileType = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    $new_name = "MaDichVu" . "MaDoanhNghiep" . $original_name;
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
      }
    }
  }

  // Hiển thị thông báo lỗi hoặc thành công cho mỗi file
  foreach ($errors as $message) {
    echo $message . "<br>";
  }
}
?>