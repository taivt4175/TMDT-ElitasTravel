<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Thêm hình ảnh: (Nhấn giữ "Ctrl" để chọn nhiều ảnh)</label>
        <input type="file" title="Upload your file here" name="fileUpload[]" multiple="multiple">
        <input type="submit" name="submit">
        <!-- <div class="chose-imgs" id="chose-imgs" name="chose-img"></div> -->
    </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_FILES);
    require 'img/upload.php';
}
?>