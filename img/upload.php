<?php
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$error = array();
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  if ($_FILES["fileToUpload"]["size"] > 5242880) {
    $error['fileToUpload'] = "File quá lớn, vui lòng chọn file nhỏ hơn 5MB";
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $error['fileToUpload'] = "Chỉ chấp nhận file ảnh định dạng JPG, JPEG, PNG & GIF";
  }

  if (file_exists($target_file)) {
    $error['fileToUpload'] = "Ảnh đã tồn tại!";
  }

  if (empty($error)) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên.";
    } else {
      echo "Có lỗi xảy ra khi tải file lên.";
    }
  };
// Check file size
?>