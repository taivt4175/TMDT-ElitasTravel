<?php
require ('../connector/connect.php');
// print_r($_GET);
$madichvu = $_GET['madichvu'];
$id_company = $_GET['madoanhnghiep'];
// echo '$id_tour: ' . $madichvu . '<br>';
// echo '$id_company: ' . $id_company . '<br>';
$sql = "SELECT * FROM dichvu WHERE madichvu = '$madichvu' AND id_user = '$id_company'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $madichvu = $row['madichvu'];
    $tendichvu = $row['tendichvu'];
    $id_user = $row['id_user'];
    $motadchitiet = $row['motachitiet'];
    $gianguoilon = $row['gianguoilon'];
    $giatreem = $row['giatreem'];
    $hinhanh = $row['hinhanh'];
    $lichtrinhchitiet = $row['lichtrinhchitiet'];
    $images = array_filter(explode(';', $hinhanh));
    $count = count($images);
    echo '<div class="silde_img_container">';
    for ($i = 0; $i < $count; $i++) {
        echo '<img class="mySlides" src="' . $images[$i] . '" alt="Image ' . ($i + 1) . '">';
    }
    echo '<button class="btn-left" onclick="plusDivs(-1)"><i class="fa-solid fa-caret-left"></i></button>
        <button class="btn-right" onclick="plusDivs(1)"><i class="fa-solid fa-caret-right"></i></button>';
    echo '</div>';
    echo '<div class="service_detail">';
    echo '<div class="service_detail_info">';
    echo '<div class="service_detail_id">Mã dịch vụ: ' . $madichvu . '</div>';
    echo '<div class="service_detail_name">Tên dịch vụ: ' . $tendichvu . '</div>';
    echo '<div class="service_detail_price">Giá người lớn: ' . $gianguoilon . '</div>';
    echo '<div class="service_detail_price">Giá trẻ em: ' . $giatreem . '</div>';
    echo '<div class="service_detail_description">' . $motadchitiet . '</div>';
    echo '<div class="service_detail_description">' . $lichtrinhchitiet . '</div>';
    echo '</div>';
    if(isset($_SESSION['user_info']) && $_SESSION['user_info']['id_user'] != $id_company){
        echo '<div class="service_detail_button_container">';
        echo '<button class="btn-back" onclick="quaylai()"><i class="fa-solid fa-arrow-left"></i>Quay lại</button>';
        echo '<button class="btn-add" onclick="themvaogio(\'' . $madichvu . '\', \'' . $id_user . '\')"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ</button>';
        echo '<button class="btn-pay" onclick="dattour(\'' . $madichvu . '\', \'' . $id_user . '\')"><i class="fa-solid fa-money-check-dollar"></i>Đặt tour</button>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo 'Không tìm thấy dịch vụ';
}
?>