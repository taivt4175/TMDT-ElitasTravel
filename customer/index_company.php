<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="../css/loginbar.css">
    <title>Chào mừng bạn</title>
</head>
<style>
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
        width: 1250px;
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
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <a href="index_company.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
            <ul class="main-menu">
                <?php
                if (isset($_SESSION['user_info'])) {
                    $userInfo = $_SESSION['user_info'];
                    // Làm gì đó với $userInfo
                    $id_user = $userInfo['id_user'];
                    $hoten = $userInfo['hoten'];
                    echo '
                    <a href="" class="btn">HỖ TRỢ</a>
                    ';
                    echo '<div class="userin4_container">';
                    echo '<div class="info">' . $hoten . '</div>';
                    echo '
                    <div class="dropdown-container">
                        <a href=""><i class="fa-solid fa-address-card"></i>CHỈNH SỬA HỒ SƠ</a>
                        <a class="logout" onclick="log_out()"><i class="fa-solid fa-right-from-bracket"></i>ĐĂNG XUẤT</a>
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

    <div class="functions-container">
        <div class="function-menu">
            <div id="service_managerment" class="options">
                <div>Quản lí dịch vụ của tôi</div>
                <div class="dropdown-content">
                    <a href="#" id="add_service" onclick="add_service();">Đăng tải dịch vụ</a>
                    <a href="#" id="mod_service">Chỉnh sửa dịch vụ</a>
                </div>
            </div>

            <div id="more" class="options">
                <div>Khác</div>
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
        var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
        xhr.open('GET', 'add_service.php', true);  // Mở một yêu cầu GET đến 'add_customer.php'
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
                var script1 = document.createElement('script'); //Gọi JS xử lí ngày tháng năm tạo user
                script1.src = '../js/add_service.js';
                document.head.appendChild(script1);
            }
        };
        xhr.send();  // Gửi yêu cầu
    }

    function log_out() {
        window.location.href = '../public/index.php?reset=true';
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