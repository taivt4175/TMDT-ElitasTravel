<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Chào mừng bạn</title>
</head>
<style>
    #wrapper {
        display: flex;
        width: 100%;
        height: 100px;
        background-color: #58BDFF;
        align-items: center;
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

    /* 
    #main-menu li {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border: 1px solid #000;
        height: 52px;
        justify-content: center;
        align-items: center;
    } */

    #main-menu #btn:hover {
        cursor: pointer;
        background-color: #009688;
    }

    #main-menu #btn {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border-left: 1px solid #000;
        height: 70px;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

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
        z-index: 1000;
    }

    .userin4_container:hover .dropdown-container {
        display: flex;
        /* dàn nội dung theo hàng dọc */
        flex-direction: column;
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

    a {
        text-decoration: none;
    }

</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <a href="../public/index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
        <nav id="nav-container">
            <ul id="main-menu">
                <a href="" id="btn">GIÚP ĐỠ</a>
                <a href="" id="btn"><div style="margin: 0px 0px 0px 0px;">DỊCH VỤ CỦA TÔI</div></a>
                <div class="userin4_container">
                    <div class="dropdown-container">
                        <a href="">CHỈNH SỬA HỒ SƠ</a>
                        <a href="">ĐĂNG XUẤT</a>
                    </div>
                </div>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h1>Chào mừng bạn đến với trang quản lý của công ty</h1>
        <h2>Chọn chức năng bạn muốn thực hiện</h2>
        <a href="index_company.php">Xem thông tin cá nhân</a>
        <a href="index_company.php">Xem thông tin khách hàng</a>
        <a href="index_company.php">Xem thông tin nhân viên</a>
        <a href="index_company.php">Xem thông tin sản phẩm</a>
        <a href="index_company.php">Xem thông tin đơn hàng</a>
        <a href="index_company.php">Xem thông tin hóa đơn</a>
        <a href="index_company.php">Xem thông tin chi phí</a>
        <a href="index_company.php">Xem thông tin doanh thu</a>
</body>

</html>