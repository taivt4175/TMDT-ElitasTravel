<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="../css/loginbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Điểm du lịch</title>
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

    a {
        text-decoration: none;
        color: black;
    }

    .most-dest-wrapper {
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        padding: 5px 5px 5px 5px;
        margin: 5px 5px 5px 5px;
        width: 100%;
        overflow: auto;
        border: 1px solid #000;
    }

    .destination-container {
        display: flex;
        flex-wrap: wrap;
        /* justify-content: center; */
    }

    .destination {
        display: inline-block;
        flex-direction: column;
        border: 1px solid #000;
        align-items: center;
        margin: 5px;
        width: auto;
        font-size: 20px;
        font-weight: bold;
    }

    .des-info{
        margin: 5px 5px 5px 5px;
    }

    .des-img {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 230px;
        height: 200px;
        border: 1px solid #000;
        margin: 5px 5px 10px 5px;
    }

    .des-img img {
        width: 100%;
        height: 100%;
    }

    .des-info {
        display: flex;
        flex-direction: column;
        /* align-items: center; */
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
    <!-- filter-bar -->
    <div class="filter-bar">
        <div>Lọc:</div>
        <select name="tinh-filter" id="tinh-filter" class="tinh-filter" onchange="updateHuyen()">
            <?php
            require ('../pscript/des_filter_event1.php');
            ?>
        </select>
        <select name="quanhuyen-filter" id="quanhuyen-filter" class="quanhuyen-filter">
            <?php
            require ('../pscript/des_filter_event2.php');
            ?>
        </select>
    </div>

    <div class="most-dest-wrapper">
        <h1>Xem nhiều nhất</h1>
        <div class="destination-container">
            <a href="" class="destination">
                <div class="des-img">
                    <img src="../img/uploads/phuquoc.jpg" alt="">
                </div>
                <div class="des-info">
                    <div class="des-id"><i class="fa-solid fa-barcode"></i>: PQ0033</div>
                    <div class="des-name"><i class="fa-solid fa-location-dot"></i> : Phú Quốc</div>
                    <div class="seen"><i class="fa-solid fa-eye"></i>: 233</div>
                </div>
            </a>

            <a href="" class="destination">
                <div class="des-img">
                    <img src="../img/uploads/vinhsang.jpg" alt="">
                </div>
                <div class="des-info">
                    <div class="des-id"><i class="fa-solid fa-barcode"></i> : VLD0127</div>
                    <div class="des-name"><i class="fa-solid fa-location-dot"></i> : KDL Vinh Sang</div>
                    <div class="seen"><i class="fa-solid fa-eye"></i>: 349</div>
                </div>
            </a>
        </div>
    </div>

    <div class="des-container">
        <h1>ĐIỂM DU LỊCH</h1>
    </div>
</body>

</html>