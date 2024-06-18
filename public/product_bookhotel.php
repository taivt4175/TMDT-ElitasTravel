<?php
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
        border-radius: 10px;
        margin: 10px;

    }

    .product-image {
        width: 200px;
        height: 200px;
        border-radius: 10px;
    }

    .product-info {
        padding: 10px;
    }

    .product-container {
        overflow-y: auto;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <a href="index.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
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
    <!-- thanh filter -->
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
    <!-- <script src="../js/destination.js"></script> -->
    <div class="product-container">
        <?php
        require ('../pscript/showproduct_hotel.php');
        ?>
    </div>
</body>
<script>
    function log_out() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../pscript/destroy_session.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                window.location.href = '../public/index.php?reset=true';
            }
        };
        xhr.send();
    }
</script>

</html>