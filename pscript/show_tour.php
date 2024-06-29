<?php
require ('../connector/connect.php');
$sql = "SELECT * FROM dichvu WHERE id_user like 'CT%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $img_string = $row['hinhanh'];
        $count = substr_count($img_string, ';');
        $anh = explode(";", $img_string);
        $img = $anh[0];
        echo '<div class="tour">
                    <a onclick="thongtin(\'' . $row['madichvu'] . '\', \'' . $row['id_user'] . '\')" class="tour-img">
                        <img src="' . $img . '" alt="">
                    </a>
                    <div class="tour-info">
                        <div class="tour-id"><i class="fa-solid fa-barcode"></i>: ' . $row['madichvu'] . '</div>
                        <div class="tour-name"><i class="fa-solid fa-location-dot"></i>: ' . $row['tendichvu'] . '</div>
                        <div class="tour-price"><i class="fa-solid fa-dollar-sign"></i>: ' . $row['giatreem'] . '</div>
                        <div class="tour-price"><i class="fa-solid fa-dollar-sign"></i>: ' . $row['gianguoilon'] . '</div>';
        if (isset($_SESSION['user_info'])) {
            echo '<div class="button-container">
                                <button class="tour-button" onclick="thongtin(\'' . $row['madichvu'] . '\', \'' . $row['id_user'] . '\')"><i class="fa-solid fa-info-circle"></i></button>
                                <button class="tour-button" onclick="themvaogio(\'' . $row['madichvu'] . '\', \'' . $row['id_user'] . '\')"><i class="fa-solid fa-cart-shopping"></i></button>
                                <button class="tour-button" onclick="dattour(\'' . $row['madichvu'] . '\', \'' . $row['id_user'] . '\')"><i class="fa-solid fa-money-check-dollar"></i></button>
                            </div>';
        }
        echo '</div>
                </div>';
    }
}
?>