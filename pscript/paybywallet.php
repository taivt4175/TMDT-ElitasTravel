<?php
session_start();
require ('../connector/connect.php');
print_r($_GET);
$id_user = $_SESSION['user_info']['id_user'];
$wallet = $_GET['wallet'];
$price = $_GET['price'];
$id_gio = $_GET['id_gio'];
$madichvu = $_GET['madichvu'];
$id_congty = $_GET['id_congty'];
//Trừ tiền
$new_wallet = $wallet - $price;
$sql1 = "UPDATE chitietkh SET sl_ecoin = '$new_wallet' WHERE id_user = '$id_user'";
$conn->query($sql1);
//Thêm vào giỏ
$sql2 =  "INSERT INTO chitietgioyeucau(id_gio,madichvu,id_congty,sl,ngayyeucau,ngaybatdau,daxacnhan,dathanhtoan) VALUES
                        ('$id_gio','$madichvu','$id_congty',1,now(),now(),0,1)";
$conn->query($sql2);
echo "Đã thanh toán";
?>