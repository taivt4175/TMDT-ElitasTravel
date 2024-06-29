<?php
require ('../connector/connect.php');
$mahd = $_GET['mahd'];
$sql = "SELECT * FROM chitiethoadon WHERE mahd = '$mahd'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <h2>Chi tiết hóa đơn của mã hóa đơn: '.$row['mahd'].'</h2>
        <div class="hoadon">
            <div class="thongtin">
                <div>Mã dịch vụ: ' .$row['madichvu']. '</div>
                <div>Nhà cung cấp: '.$row['madoanhnghiep'].' </div>
                <div>SL người lớn: '.$row['sl_nguoilon'].' Người</div>
                <div>SL trẻ em: '.$row['sl_treem'].' Trẻ</div>
            </div>
            <div class="button">
                <button onclick="chitietdv(\'' . $row['madichvu'] . '\',\'' . $row['madoanhnghiep'] . '\')">Xem chi tiết</button>
            </div>
        </div>
        ';
    }
} else {
    echo 'Không có hóa đơn nào';
}