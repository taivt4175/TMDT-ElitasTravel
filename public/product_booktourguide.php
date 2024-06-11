<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="../css/loginbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Hướng dẫn viên</title>
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

    .tourguide-container {
        display: flex;
        flex-direction: column;
        /* flex-wrap: wrap; */
        padding: 5px 5px 5px 5px;
        margin: 5px 5px 5px 5px;
        width: 100%;
        overflow: auto;
        border: 1px solid #000;
    }

    .autoscroll {
        display: flex;
        flex-direction: row;
        white-space: nowrap;
        /* Ngăn các phần tử xuống dòng */
        width: 100%;
    }

    .tourguide {
        display: inline-block;
        flex-direction: column;
        border: 1px solid #000;
        align-items: center;
        margin: 5px;
        width: auto;
    }

    .tourguide-img {
        width: 250px;
        height: 200px;
        border: 1px solid #000;
        margin: 5px 5px 10px 5px;
    }

    .tourguide-img img {
        width: 100%;
        height: 100%;
    }

    .tourguide-info {
        display: flex;
        flex-direction: column;
        width: auto;
        padding: 5px;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<body>
<div id="wrapper">
        <nav id="nav-container">
            <div class="main-menu">
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
            </div>
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
    <!-- tourguide-container -->
    <div class="tourguide-container">
        <h1>BOOK NHIỀU NHẤT</h1>
        <div class="autoscroll" behavior="scroll" direction="left" onmouseover="this.stop();"
            onmouseout="this.start();">
            <!-- vòng lặp đặt tại đây  -->
            <div class="tourguide">
                <div class="tourguide-img"><img src="../img/uploads/trung.jpg" alt=""></div>
                <div class="tourguide-info">
                    <div class="tourguide-name">Lưu Đinh Quốc Trung</div>
                    <div class="tourguide-phone"><i class="fa-solid fa-mobile"></i>: 0123456789</div>
                    <div class="bookingtime"><i class="fa-solid fa-chart-simple"></i>: 29</div>
                    <div class="booking-price"><i class="fa-solid fa-dollar-sign"></i>: Thương lượng</div>
                    <div class="action">
                        <a class="action4tourguide" href="">
                            <div>Xem chi tiết</div>
                        </a>
                        <a class="action4tourguide" href="">
                            <div>Book ngay</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="tourguide">
                <div class="tourguide-img"><img src="../img/uploads/nam.png" alt=""></div>
                <div class="tourguide-info">
                    <div class="tourguide-name">Nguyễn Hải Nam</div>
                    <div class="tourguide-phone"><i class="fa-solid fa-mobile"></i>: 0123456789</div>
                    <div class="bookingtime"><i class="fa-solid fa-chart-simple"></i>: 32</div>
                    <div class="booking-price"><i class="fa-solid fa-dollar-sign"></i>: Thương lượng</div>
                    <div class="action">
                        <a class="action4tourguide" href="">
                            <div>Xem chi tiết</div>
                        </a>
                        <a class="action4tourguide" href="">
                            <div>Book ngay</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>