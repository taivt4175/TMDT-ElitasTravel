<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginbar.css">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Danh sach yeu cau</title>
</head>
<style>
    /* thanh filter */
    .filter-bar {
        display: flex;
        text-align: center;
        align-items: center;
        background-color: #00D4FF;
        height: 80px;
    }

    .filter-bar div {
        font-size: 20px;
        padding-right: 10px;
        padding-left: 10px
    }

    .tinh-filter {
        font-size: 20px;
        height: 40px;
        width: 200px;
    }

    .quanhuyen-filter {
        font-size: 20px;
        height: 40px;
        width: 200px;
        margin: 0px 0px 0px 10px;
    }

    /* product */
    .product-container {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin: 20px;
        overflow: auto;
    }

    .product {
        display: flex;
        border: 1px solid #000;
        margin: 10px;
    }

    .product-image {
        width: 200px;
        height: 200px;
    }

    .product-info {
        padding: 10px;
    }

    .request-container {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin: 5px 5px 5px 5px;
        overflow: auto;
        border: 1px solid #000;
        border-radius: 5px;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <a href="../public/index.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
            <ul class="main-menu">
                <?php
                if (isset($_SESSION['user_info'])) {
                    $userInfo = $_SESSION['user_info'];
                    // Làm gì đó với $userInfo
                    $id_user = $userInfo['id_user'];
                    $hoten = $userInfo['hoten'];
                    echo '
                    <a href="" class="btn">HỖ TRỢ</a>
                    <a href="" class="btn">ĐẶT TOUR</a>
                    ';
                    echo '<div class="userin4_container">';
                    echo '<div class="info">' . $hoten . '</div>';
                    echo '
                    <div class="dropdown-container">
                        <a href="../customer/request-list.php"
                        onclick="my_request_form()"><i class="fa-solid fa-basket-shopping"></i>GIỎ HÀNG</a>
                        <a href=""><i class="fa-solid fa-address-card"></i>CHỈNH SỬA HỒ SƠ</a>
                        <a href="" class="logout" onclick="log_out()"><i class="fa-solid fa-right-from-bracket"></i>ĐĂNG XUẤT</a>
                    </div>
                    ';
                } else {
                    echo '<a href="" class="btn">HỖ TRỢ</a>';
                    echo '<div class="signup">
                            <div>ĐĂNG KÍ</div>
                            <div class="dropdown-container">
                                <a href="signup.php" id="customer-account">TÀI KHOẢN KHÁCH HÀNG</a>
                                <a href="tourguide-signup.php" id="instructor-account">TÀI KHOẢN HƯỚNG DẪN VIÊN</a>
                                <a href="company-signup.php" id="company-account">TÀI KHOẢN DOANH NGHIỆP</a>
                            </div>
                        </div>';
                    echo '<a href="login.php" class="btn">ĐĂNG NHẬP</a>';
                }
                ?>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div>
            <h1>Giỏ dịch vụ</h1>
            <?php
            $user_info = $_SESSION['user_info'];
            $id_user = $user_info['id_user'];
            require ('../connector/connect.php');
            $sql = "SELECT * FROM chitietgioyeucau AS a
                INNER JOIN gioyeucau AS b ON a.id_gio = b.id_gio
                WHERE b.id_user = '$id_user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["daxacnhan"] == 0) {
                        $row["daxacnhan"] = "Chưa thanh toán";
                    } else {
                        $row["daxacnhan"] = "Đã thanh toán";
                    }
                    if ($row["dathanhtoan"] == 0) {
                        $row["dathanhtoan"] = "Chưa thanh toán";
                    } else {
                        $row["dathanhtoan"] = "Đã thanh toán";
                    }
                    echo "<div class='request-container'>";
                    echo "<h5>Tình trạng thanh toán: " . $row["dathanhtoan"] . "</h5>";
                    echo "<h5>Trạng thái: " . $row["daxacnhan"] . "</h5>";
                    echo "Mã dịch vụ: " . $row["madichvu"] . "<br/>- Số lượng: " . $row['sl'] . "<br/>- Ngày yêu cầu: " . $row["ngayyeucau"] . "<br/>";
                    echo "- Ngày bắt đầu: " . $row["ngaybatdau"] . "<br/>";
                    echo '<a href="../public/chitietdichvu.php?madichvu=' . $row["madichvu"] . '&id_user=' . $row['id_congty'] . '">Xem chi tiết</a>';
                    echo '<button onclick="deletefromcart(\'' . $row['madichvu'] . '\', \'' . $row['id_congty'] . '\', \'' . $row['id_gio'] . '\')">Xóa</button>';
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</body>
<script>
    function deletefromcart(madichvu, id_congty, id_gio) {
        if (confirm("Nếu dịch vụ đã được thanh toán thì bạn sẽ mất 80% số tiền đã thanh toán, số còn lại sẽ chuyển vào Wallet của bạn. Bạn chắc chắn muốn xóa dịch vụ này khỏi giỏ?")) {
            const url = new URL(window.location.href);
            url.searchParams.set('madichvu', madichvu);
            url.searchParams.set('id_congty', id_congty);
            url.searchParams.set('id_gio', id_gio);
            window.history.pushState({}, '', url);
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../pscript/deletefromcart.php?madichvu=' + madichvu + '&id_congty=' + id_congty + '&id_gio=' + id_gio, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    window.location.reload();
                }
            };
            xhr.send();
            url.search = ''; // Xóa tất cả các tham số
            window.history.pushState({}, '', url);
        }
    }
</script>
</html>