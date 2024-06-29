<?php
session_start();
require ('../connector/connect.php');
$data = json_decode(file_get_contents('php://input'), true); // Giải mã dữ liệu JSON
print_r($data);
$id_user = $_SESSION['user_info']['id_user'];
// echo $id_user;
$wallet = $data['wallet'];
$total = $data['total'];
$madichvu = $data['madichvu'];
$madoanhnghiep = $data['madoanhnghiep'];
$sl_nguoilon = $data['sl_nguoilon'];
$sl_treem = $data['sl_treem'];
echo $madichvu;
// $wallet = $_GET['wallet'];
// $price = $_GET['price'];
// $id_gio = $_GET['id_gio'];
// $madichvu = $_GET['madichvu'];
// $id_congty = $_GET['id_congty'];
// //Trừ tiền
// $new_wallet = $wallet - $total;
// $sql1 = "UPDATE chitietkh SET sl_ecoin = '$new_wallet' WHERE id_user = '$id_user'";
// $conn->query($sql1);
// //Tạo và thêm vào danh sách hóa đơn kèm chi tiết hóa đơn
$sql2 =  "INSERT INTO hoadon (id_user, ngayhd, madoanhnghiep, giatrihoadon, dathanhtoan) VALUES 
                            ('$id_user', '". date("Y-m-d") ."' , '$madoanhnghiep', '$total',1)";
$conn->query($sql2);
$mahd = $conn->insert_id;
$sql3 = "INSERT INTO chitiethoadon (mahd, madichvu, madoanhnghiep, sl_nguoilon, sl_treem, tongtien) VALUES 
                                    ('$mahd', '$madichvu', '$madoanhnghiep', '$sl_nguoilon', '$sl_treem', '$total')";
$conn->query($sql3);
// // Thêm vào chi tiết hóa đơn
echo "Đã thanh toán";
?>