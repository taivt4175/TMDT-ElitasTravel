<?php
require ("../connector/connect.php");
$tourname = $_POST['tourname'];
$description = $_POST['description'];
$id_tinh = $_POST['province'];
$id_huyen = $_POST['district'];
$gia = $_POST['price'];
print_r($_POST);
$result = $conn->query("SELECT LPAD(IFNULL(MAX(SUBSTRING(id_tour, 3)), 0) + 1, 5, '0') AS new_id FROM tour");
$row = $result->fetch_assoc();
$id_tour = 'TO' . $row['new_id'];
$sql = "INSERT INTO tour(id_tour, tentour, lichtrinhchitiet, id_tinh, id_qh, gia) VALUES 
        ('$id_tour','$tourname', '$description', '$id_tinh', '$id_huyen', '$gia')";
$result1 = $conn->query($sql);
if ($result1) {
    echo "Thêm tour thành công";
} else {
    echo "Thêm tour thất bại - Lỗi: " . $conn->error;
}
?>