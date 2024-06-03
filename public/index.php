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
    <title>Trang chủ</title>
</head>
<style>
    /* Thanh logo và  tìm kiếm */
    a {
        text-decoration: none;
    }

    #logo_search_bar_wrapper input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }

    #logo_search_bar_wrapper .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    #logo_search_bar_wrapper .search-container button:hover {
        background: #ccc;
    }

    .search-container {
        width: 70%;
        padding-left: 10px;
        padding-top: 15px;
    }

    .search-container form {
        display: flex;
    }

    #logo_search_bar_wrapper .search-container {
        float: none;
        width: calc(100% - 400px);
    }

    #logo_search_bar_wrapper input[type=text] {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
    }

    #logo_search_bar_wrapper .search-container button {
        float: none;
        display: block;
        text-align: left;
        width: 49px;
        height: 49px;
        margin: 0;
        padding: 14px;
    }

    #logo_search_bar_wrapper a {
        float: none;
        text-align: left;
        display: inline-block;
        /* Đảm bảo phần tử cha co lại theo độ rộng của phần tử con */
        width: auto;
        /* Độ rộng tự động phù hợp với phần tử con */
        margin: 0;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
    }

    #logo_search_bar_wrapper input[type=text] {
        border: 1px solid #ccc;
        width: calc(100% - 45px);
    }

    #logo_search_bar_wrapper {
        display: flex;
        width: 100vw;
        background-color: #00F7FF;
        padding-top: 12px;
        padding-bottom: 12px;
    }

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
        border: 1px solid #000;
        height: 52px;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .main-menu li:hover {
        cursor: pointer;
        background-color: #009688;
    }

    /* Thanh hình ảnh và slide tự động */
    .img_slide_container {
        display: flex;
        height: 500px;
        width: 110vw;
        padding: 0;
        margin: 0;
    }

    .auto_slide {
        height: inherit;
        width: 60%;
    }

    .img_container {
        height: inherit;
        width: 40%;
    }

    .img_container a img {
        width: 500px;
        height: 250px;
    }

    /* slide tự động */
    .fade {
        animation-name: fade;
        animation-duration: 1s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    .mySlides {
        display: none;
    }

    /* DANH MỤC */
    .list_container {
        background-color: #00F7FF;
        height: 150px;
        padding: 15px 15px 15px 15px;
        margin: 0;
    }

    .list_name {
        font-size: 20px;
        padding-bottom: 15px;
    }

    .elements_container {
        display: flex;
        height: 80px;
        max-width: inherit;
        gap: 10px;
        /* Tạo khoảng cách giữa các items */
    }

    .element {
        border: 1px solid #000;
        border-radius: 5px;
        height: 80px;
        width: 100px;
    }

    .element_icon {
        display: flex;
        justify-content: center;
        padding-bottom: 15px;
        padding-top: 15px;
    }

    .element_name {
        display: flex;
        justify-content: center;
    }

    .elements_container a:hover {
        background-color: #91F0F3;
        cursor: pointer;
    }

    /* footer */
    .footer {
        justify-content: center;
        background-color: #58BDFF;
    }

    .footer-items {
        display: flex;
        width: 100%;
    }

    .contact-us {
        justify-content: center;
        text-align: center;
        width: calc(100%/3);
    }

    .contact-us i {
        font-size: 25px;
        margin-right: 12px;
        cursor: pointer;
        transition: var(--sub-color);
    }

    .about-us {
        text-align: center;
        justify-content: center;
        width: calc(100%/3);
    }

    .address {
        text-align: center;
        width: calc(100%/3);
    }

    .copy-right {
        text-align: center;
        justify-content: center;
    }

    .dropdown-container {
        display: none;
        position: absolute;
        flex-direction: column;
        top: 50px;
        right: 60px;
        border: 1px solid #000000;
        z-index: 1000;
        background-color: white;
    }

    .dropdown-container a {
        color: black;
        padding: 0px 20px 0px 20px;
        height: 50px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .main-menu .signup {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border: 1px solid #000;
        height: 52px;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .signup:hover .dropdown-container {
        display: flex;
        /* dàn nội dung theo hàng dọc */
        flex-direction: column;
    }

    .dropdown-container a:hover {
        background-color: #009688;
    }

    .userin4_container {
        border-left: 1px solid #000;
        height: 52px;
        width: 240px;
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

    .userin4_container:hover .dropdown-container {
        display: flex;
        /* dàn nội dung theo hàng dọc */
        flex-direction: column;
    }
</style>

<body>
    <div id="wrapper">
        <nav id="nav-container">
            <a href="index.php" id="logo"><img src="img/logo2.jpg" alt=""></a>
            <ul class="main-menu">
                <?php
                if (isset($_SESSION['user_info'])) {
                    $userInfo = $_SESSION['user_info'];
                    // Làm gì đó với $userInfo
                    $id_user = $userInfo['id_user'];
                    $hoten = $userInfo['hoten'];
                    echo '
                    <li class="btn"><a href="">HỖ TRỢ</a></li>
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
                    echo '<li class="btn"><a href="">HỖ TRỢ</a></li>';
                    echo '<li class="signup"><a href="">ĐĂNG KÍ</a>
                                <div class="dropdown-container">
                                    <a href="company-signup.php" id="">TÀI KHOẢN DOANH NGHIỆP</a>
                                    <a href="" id="">TÀI KHOẢN HƯỚNG DẪN VIÊN</a>
                                    <a href="signup.php" id="">TÀI KHOẢN KHÁCH HÀNG</a>
                                </div>
                            </li>';
                    echo '<li class="btn"><a href="login.php">ĐĂNG NHẬP</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- LOGO và THANH TÌM KIẾM -->
    <div id="logo_search_bar_wrapper">
        <a href="index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Bạn muốn tìm gì? VD: 'khach san','nha xe gia re',..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- slide show và hình ảnh -->
    <div class="img_slide_container">
        <div class="auto_slide">
            <div class="mySlides fade">
                <img src="../img/tourdalat.jpg" style="width:100%; height:500px">
            </div>

            <div class="mySlides fade">
                <img src="../img/tourdanang.jpg" style="width:100%; height:500px">
            </div>

            <div class="mySlides fade">
                <img src="../img/tourphuquoc.png" style="width:100%; height:500px">
            </div>
        </div>
        <div class="img_container">
            <a href=""><img src="../img/nhaxethanhbuoi.jpg" alt=""></a>
            <a href=""><img src="../img/hotel.jpg" alt=""></a>
        </div>
    </div>
    <!-- danh mục -->
    <div class="list_container">
        <div class="list_name">DANH MỤC</div>
        <div class="elements_container">
            <a href="">
                <div class="element">
                    <div class="element_icon"><i class="fa-solid fa-flag"></i></div>
                    <div class="element_name">TOUR</div>
                </div>
            </a>

            <a href="">
                <div class="element">
                    <div class="element_icon"><i class="fa-solid fa-bus"></i></div>
                    <div class="element_name">NHÀ XE</div>
                </div>
            </a>

            <a href="product_bookhotel.php">
                <div class="element">
                    <div class="element_icon"><i class="fa-regular fa-building"></i></div>
                    <div class="element_name">KHÁCH SẠN</div>
                </div>
            </a>

            <a href="">
                <div class="element">
                    <div class="element_icon"><i class="fa-solid fa-child-reaching"></i></div>
                    <div class="element_name">H.DẪN VIÊN</div>
                </div>
            </a>

            <a href="destination.php">
                <div class="element">
                    <div class="element_icon"><i class="fa-solid fa-map-location"></i></div>
                    <div class="element_name">Đ.DU LỊCH</div>
                </div>
            </a>
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
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

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