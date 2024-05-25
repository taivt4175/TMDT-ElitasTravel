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

    #main-menu {
        width: inherit;
        display: inline-flex;
        justify-content: flex-end;
        list-style: none;
        margin: 0;
        /* bỏ đi các dấu chấm */
        /* để các phần tử sát phải */
    }

    #main-menu li {
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
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <a href="index.php" id="logo"><img src="img/logo2.jpg" alt=""></a>
        <nav id="nav-container">
            <ul id="main-menu">
                <li><a href="">GIÚP ĐỠ</a></li>
                <li><a href="">ĐĂNG KÍ</a></li>
                <li><a href="">ĐĂNG NHẬP</a></li>
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

</html>