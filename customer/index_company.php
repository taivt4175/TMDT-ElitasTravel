<?php
session_start();
?>
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
        height: inherit;
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
        height: inherit;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .userin4_container {
        border-left: 1px solid #000;
        height: inherit;
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
        display: NONE;
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

    .functions-container {
        display: flex;
        width: 100%;
    }

    .function-menu {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 250px;
        height: 500px;
        margin: 10px 0px 0px 10px;
    }

    .function-view {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 1205px;
        height: 500px;
        margin: 10px 0px 0px 10px;
        overflow: auto;
    }

    .function-menu a {
        display: flex;
        padding: 0px 0px 0px 20px;
        align-items: center;
        text-decoration: 0;
        height: 50px;
        /* padding: 20px 0px 0px 20px; */
    }

    .function-menu a:hover {
        border-radius: 10px;
        cursor: pointer;
        background-color: #91F0F3;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        flex-direction: column;
        top: auto;
        left: 120px;
        border: 1px solid #000000;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: black;
        padding: 0px 20px 0px 20px;
        height: 50px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .dropdown:hover .dropdown-content {
        display: flex;
        background-color: white;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <a href="../public/index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
        <nav id="nav-container">
            <ul id="main-menu">
                <a href="" id="btn">HỖ TRỢ</a>
                <div class="userin4_container">
                    <div class="userin4_container">
                        <?php
                        if (isset($_SESSION['user_info'])) {
                            $userInfo = $_SESSION['user_info'];
                            // Làm gì đó với $userInfo
                            $id_user = $userInfo['id_user'];
                            $hoten = $userInfo['hoten'];

                            echo '<div class="info" id="id_user">' . $id_user . '</div><br>';
                            echo '<div class="info" id="hoten">' . $hoten . '</div><br>';
                        } else {
                            echo '<div class="info" id="info">User không xác định!</div>';
                        }
                        ?>
                        <div class="dropdown-container">
                            <a href="">CHỈNH SỬA HỒ SƠ</a>
                            <a href="#" onclick="logout()">ĐĂNG XUẤT</a>
                        </div>
                    </div>
            </ul>
        </nav>
    </div>

    <div class="functions-container">
        <div class="function-menu">
            <div class="dropdown">
                <a href="#" id="service_managerment" class="service_managerment">Quản lí dịch vụ của tôi</a>
                <div class="dropdown-content">
                    <a href="#" id="add_service" onclick="add_service();">Đăng tải dịch vụ</a>
                    <a href="#" id="mod_service">Chỉnh sửa dịch vụ</a>
                    <a href="#" id="service_request">Yêu cầu dịch vụ</a>
                    <a href="#" id="service_rate">Đánh giá từ khách hàng</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="more" class="more">Khác</a>
                <div class="dropdown-content">
                    <a href="#" id="customer_list">Danh sách khách hàng</a>
                    <a href="#" id="voucher">Voucher</a>
                    <a href="#" id="statistic">Thống kê</a>
                </div>
            </div>
        </div>

        <div class="function-view" id="function-view">
        </div>
    </div>
</body>
<script>
    function add_service() {
        var function_view = document.getElementById('function-view');
        // Tải form add_service.php vào trong div function-view
        function_view.innerHTML = '<iframe src="add_service.php" width="100%" height="100%"></iframe>';
    }

    function logout() {
        // Xóa session
        // Chuyển hướng về trang login
        window.location.href = '../public/index.php';
    }
</script>
</html >