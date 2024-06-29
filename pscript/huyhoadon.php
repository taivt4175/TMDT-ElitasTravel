<?php
require ('../connector/connect.php');
$mahd = $_GET['mahd'];
$sql = "DELETE FROM hoadon WHERE mahd = '$mahd'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'Hủy hóa đơn thành công';
} else {
    echo 'Hủy hóa đơn thất bại';
}
?>