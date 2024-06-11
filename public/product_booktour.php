<a?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="../css/loginbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Tour</title>
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

    .mostbook-container {
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        border: 1px solid #000;
        border-radius: 5px;
        margin: 5px 5px 5px 5px;
    }

    .mostbook-container h1 {
        margin: 5px 5px 5px 5px;
    }

    .tours-container {
        display: flex;
        flex-wrap: wrap;
        padding: 5px 5px 5px 5px;
        margin: 5px 5px 5px 5px;
        width: 100%;
        overflow-y: auto;
    }

    .tour {
        display: flex;
        flex-direction: column;
        margin: 5px 5px 5px 5px;
        width: auto;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 20px;
        font-weight: bold;
    }

    .tour-img {
        width: 250px;
        height: 200px;
        border: 1px solid #000;
        margin: 5px 5px 10px 5px;
    }

    .tour-img img {
        width: 100%;
        height: 100%;
    }

    a {
        text-decoration: none;
    }

    .tour-info {
        display: flex;
        flex-direction: column;
        width: auto;
        padding: 5px;
    }
</style>

<body>
    <div id="wrapper">
        <nav id="nav-container">
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
                    echo '<div class="info">' . $id_user . '</div><br>';
                    echo '<div class="info">' . $hoten . '</div><br>';
                    echo '
                    <div class="dropdown-container">
                        <a href="../customer/request-list.php"
                        onclick="my_request_form()">YÊU CẦU CỦA TÔI</a>
                        <a href="">CHỈNH SỬA HỒ SƠ</a>
                        <a href="" class="logout" onclick="log_out()">ĐĂNG XUẤT</a>
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
    <!-- sản phẩm -->
    <div class="mostbook-container">
        <h1>Đặt nhiều nhất</h1>
        <div class="tours-container">
            <a href="" class="tour">
                <div class="tour-img">
                    <img src="../img/tourdalat.jpg" alt="">
                </div>
                <div class="tour-info">
                    <div class="tour-id"><i class="fa-solid fa-barcode"></i>: VLDL0003</div>
                    <div class="tour-name"><i class="fa-solid fa-location-dot"></i>: Vĩnh Long - Đà Lạt</div>
                    <div class="tour-price"><i class="fa-solid fa-dollar-sign"></i>: 1000000</div>
                </div>
            </a>

            <a href="" class="tour">
                <div class="tour-img">
                    <img src="../img/tourphuquoc.png" alt="">
                </div>
                <div class="tour-info">
                    <div class="tour-id"><i class="fa-solid fa-barcode"></i>: VLPQ0033</div>
                    <div class="tour-name"><i class="fa-solid fa-location-dot"></i>: Vĩnh Long - Phú Quốc</div>
                    <div class="tour-price"><i class="fa-solid fa-dollar-sign"></i>: 2000000</div>
                </div>
            </a>
        </div>
    </div>
</body>

</html>