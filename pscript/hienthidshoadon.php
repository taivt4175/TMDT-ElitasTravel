<?php
require ('../connector/connect.php');
$id_user = $_SESSION['user_info']['id_user'];
$sql = "SELECT * FROM hoadon WHERE id_user = '$id_user'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['doanhnghiepxacnhan'] == 0) {
            $trangthai = 'Chưa xác nhận';
        } else {
            $trangthai = 'Đã xác nhận';
        }
        echo '
        <div class="hoadon">
            <div class="thongtin">
                <div>Mã hóa đơn: ' .$row['mahd']. '</div>
                <div>Ngày đặt: '.$row['ngayhd'].' </div>
                <div>Giá trị: '.$row['giatrihoadon'].' VNĐ</div>
                <div>Trạng thái: '.$trangthai.' </div>
            </div>
            <div class="button">
                <button onclick="chitiethd(\'' . $row['mahd'] . '\')">Xem chi tiết</button>
                <button onclick="huyhd(\'' . $row['mahd'] . '\')">Hủy dịch vụ</button>
            </div>
        </div>
        ';
    }
} else {
    echo 'Không có hóa đơn nào';
}
?>