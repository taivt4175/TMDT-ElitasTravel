<?php
require ('../connector/connect.php');
$madichvu = $_POST['madichvu'];
$madoanhnghiep = $_POST['madoanhnghiep'];
$sql = "DELETE FROM dichvu WHERE madichvu = '$madichvu' AND id_user = '$madoanhnghiep'";
if ($conn->query($sql) === TRUE) {
    echo "Xóa dịch vụ thành công!";

    // Đường dẫn đến thư mục chứa hình ảnh
    $directory = '../img/uploads/';
    // Mẫu tên file cần xóa
    $prefix = $madichvu . '_' . $madoanhnghiep . '_';

    // Mở thư mục
    if ($handle = opendir($directory)) {
        // Duyệt qua các tệp trong thư mục
        while (false !== ($file = readdir($handle))) {
            // Kiểm tra nếu tệp có tên bắt đầu với chuỗi $prefix
            if (strpos($file, $prefix) === 0) {
                // Đường dẫn đầy đủ tới tệp
                $filePath = $directory . $file;
                // Xóa tệp
                if (unlink($filePath)) {
                    echo "Đã xóa tệp: $filePath\n";
                } else {
                    echo "Không thể xóa tệp: $filePath\n";
                }
            }
        }
        // Đóng thư mục
        closedir($handle);
    } else {
        echo "Không thể mở thư mục: $directory";
    }
} else {
    echo "Xóa dịch vụ thất bại!";
}
$conn->close();
?>