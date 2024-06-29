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
    <title>Admin</title>
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
        <nav id="nav-container">
            <a href="adminform.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
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
            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí khách hàng</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer" onclick="calladdCustomer()">Thêm khách hàng</a>
                    <a href="#" id="mod_customer" onclick="callmodCustomer()">Chỉnh sửa thông tin khách hàng</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlhdv" class="qlhdv">Quản lí hướng dẫn viên</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer" onclick="calladdtourguide()">Thêm hướng dẫn viên</a>
                    <a href="#" id="mod_customer" onclick="callmodtourguide()">Chỉnh sửa thông tin hướng dẫn viên</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí Tour</a>
                <div class="dropdown-content">
                    <a href="#" id="mod_customer">Chỉnh sửa dịch vụ</a>
                </div>
            </div>

        </div>

        <div class="function-view" id="function-view">
        </div>
    </div>
    <div class="footer">
        <div class="footer-items">
            <div class="address">
                <h2>Địa chỉ</h2>
                <p>73 Nguyễn Huệ, phường 2 <br>thành phố Vĩnh Long, tỉnh Vĩnh Long</p>
            </div>

            <div class="about-us">

            </div>

            <div class="contact-us">
                <h2>Liên hệ chúng tôi</h2>
                <p>Website: http://elitastraver.com/ <br>Email: taivt4175@gmail.com</p>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>

        <div class="copy-right">
            <p>&copy; Copyrights 2024. All rights reserved by Vu Thanh Tai</p>
        </div>
    </div>
</body>
<script src="../js/adminform.js"></script>
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