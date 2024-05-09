<?php
require ('../connector/connect.php');
$id = $_POST['id'];
$sql = "DELETE FROM user WHERE id_user = '$id'";
if ($conn->query($sql) === TRUE) {
    echo "Xóa khách hàng thành công!";
} else {
    echo "Xóa khách hàng thất bại!";
}
$conn->close();
?>