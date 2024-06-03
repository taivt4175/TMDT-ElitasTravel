<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Điểm du lịch</title>
</head>
<style>
    /* Thanh bảng chọn */
    #wrapper {
        display: flex;
        width: 100vw;
    }

    #nav-container {
        display: flex;
        width: inherit;
        background-color: #58BDFF;
    }

    .main-menu {
        width: inherit;
        display: inline-flex;
        justify-content: flex-end;
        list-style: none;
        margin: 0;
        /* bỏ đi các dấu chấm */
        /* để các phần tử sát phải */
    }

    .main-menu .btn {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border-left: 1px solid #000;
        height: 70px;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .main-menu .btn:hover {
        cursor: pointer;
        background-color: #009688;
    }

    .main-menu li {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border: 1px solid #000;
        height: 52px;
        justify-content: center;
        align-items: center;
    }

    /* Thanh logo và  tìm kiếm */
    a {
        text-decoration: none;
    }

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

    /* chỗ để user info */
    .userin4_container {
        border-left: 1px solid #000;
        height: 70px;
        width: 200px;
        align-items: center;
        position: relative;
        display: inline-block;
    }

    .userin4_container:hover {
        background-color: #009688;
        cursor: pointer;
    }

    .userin4_container .info {
        padding: 0;
        margin: 0;
        height: 0px;
    }

    .dropdown-container {
        display: none;
        position: absolute;
        background-color: white;
        top: 70px;
    }


    .dropdown-container a {
        border-bottom: 1px solid #000;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        padding: 10px 10px 10px 10px;
    }

    .dropdown-container a:hover {
        cursor: pointer;
        background-color: #009688;
    }

    .userin4_container:hover .dropdown-container {
        display: flex;
        /* dàn nội dung theo hàng dọc */
        flex-direction: column;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <a href="index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
            <ul class="main-menu">
                <?php
                if (isset($_SESSION['user_info'])) {
                    $userInfo = $_SESSION['user_info'];
                    // Làm gì đó với $userInfo
                    $id_user = $userInfo['id_user'];
                    $hoten = $userInfo['hoten'];
                    echo '
                    <a href="" class="btn">GIÚP ĐỠ</a>
                    <a href="" class="btn">ĐẶT TOUR</a>
                    ';
                    echo '<div class="userin4_container">';
                    echo '<div class="info">' . $id_user . '</div><br>';
                    echo '<div class="info">' . $hoten . '</div><br>';
                    echo '
                    <div class="dropdown-container">
                        <a href="../customer/request-list.php">YÊU CẦU CỦA TÔI</a>
                        <a href="">CHỈNH SỬA HỒ SƠ</a>
                        <a href="" class="logout" onclick="log_out()">ĐĂNG XUẤT</a>
                    </div>
                    ';
                    echo '</div>';
                } else {
                    echo '<li><a href="">HỖ TRỢ</a></li>';
                    echo '<li><a href="signup.php">ĐĂNG KÍ</a></li>';
                    echo '<li><a href="login.php">ĐĂNG NHẬP</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- thanh filter -->
    <div class="filter-bar">
        <!-- <div>Lọc:</div>
        <select name="tinh-filter" id="tinh-filter" class="tinh-filter" onchange="updateHuyen()">
            <?php
            // require ('../pscript/des_filter_event1.php');
            ?>
        </select>
        <select name="quanhuyen-filter" id="quanhuyen-filter" class="quanhuyen-filter">
            <?php
            // require ('../pscript/des_filter_event2.php');
            ?>
        </select> -->
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
            }
        };
        xhr.send();
    }
</script>

</html>