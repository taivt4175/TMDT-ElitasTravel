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
    <title>Customer Index</title>
</head>
<style>
    .service_detail_container {
        display: flex;
        width: 100%;
        margin: 10px 10px 10px 10px;
        /* align-items: center; */
    }

    .silde_img_container {
        display: flex;
        margin: 0px 10px 0px 0px;
        /* flex-direction: column; */
        width: 600px;
        align-self: center;
        justify-content: center;
    }

    .silde_img_container .mySlides {
        display: none;
        width: 600px;
        height: 600px;
    }

    .btn-left {
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        width: 40px;
        position: absolute;
        left: 10px;
        bottom: 320px;
        padding-left: 15px;
    }

    .btn-right {
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        width: 40px;
        position: absolute;
        left: 570px;
        bottom: 320px;
        padding-left: 15px;
    }

    .silde_img_container button:hover {
        background-color: #858af3;
        cursor: pointer;
    }

    .service_detail {
        display: flex;
        flex-direction: column;
    }


    .service_detail_info {
        height: auto;
        font-size: 20px;
    }

    .service_detail_button_container {
        display: flex;
    }

    .service_detail_button_container button {
        margin: 10px 10px 10px 10px;
        padding: 10px 10px 10px 10px;
        border-radius: 10px;
        border: none;
        font-size: 20px;
        width: 250px;
        height: 70px;
    }

    .btn-back:hover{
        background-color: red;
        cursor: pointer;
    }

    .btn-add:hover{
        background-color: goldenrod;
        cursor: pointer;
    }

    .btn-pay:hover{
        background-color: #00D110;
        cursor: pointer;
    }
</style>

<body>
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

    <div class="service_detail_container">
        <?php
        require ('../pscript/product-detail-show.php')
            ?>
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
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

    function log_out() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../pscript/destroy_session.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                window.location.href = '../public/product_booktour.php?reset=true';
            }
        };
        xhr.send();
    }

    function quaylai() {
        window.location.replace("product_booktour.php");
    }
</script>

</html>