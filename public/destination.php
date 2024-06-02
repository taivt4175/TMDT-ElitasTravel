<?php 
session_start(); 
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/reset1.css">
        <title>Điểm du lịch</title>
    </head>
    <style>
    #wrapper {
        display: flex;
        width: 100%;
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

    /* Thanh hình ảnh và slide tự động */
    .img_slide_container {
        display: flex;
        height: 505px;
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

    .img_container a img {
        padding: 0;
        margin: 0;
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
        margin: 0;
        padding: 0;
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
        padding: 0;
        margin: 0;
    }

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

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    img {
        width: 500px;
        height: 300px;
    }
    </style>

    <body>
        <!-- THANH BẢNG CHỌN -->
        <div id="wrapper">
            <nav id="nav-container">
                <ul id="main-menu">
                    <a href="" id="btn">GIÚP ĐỠ</a>
                    <a href="" id="btn">ĐẶT TOUR</a>
                    <div class="userin4_container">
                        <?php
                        if (isset($_SESSION['user_info'])) {
                            $userInfo = $_SESSION['user_info'];
                            // Làm gì đó với $userInfo
                            $id_user = $userInfo['id_user'];
                            $hoten = $userInfo['hoten'];

                            echo '<div class="info">' . $id_user . '</div><br>';
                            echo '<div class="info">' . $hoten . '</div><br>';
                            echo '
                            <div class="dropdown-container">
                                <a href="request-list.php"
                                onclick="my_request_form()">YÊU CẦU CỦA TÔI</a>
                                <a href="">CHỈNH SỬA HỒ SƠ</a>
                                <a href="">ĐĂNG XUẤT</a>
                            </div>
                            ';
                        } else {
                            echo '<div class="info">Chưa đăng nhập</div>';
                        }
                        ?>

                    </div>
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

        <div class="destination-info">
            <h1>VĂN THÁNH MIẾU</h1>
            <div class="image-container">
                <img src="../img/VanThanhMieu.jpg" alt="">
            </div>
            <div class="destination-content">
                Văn Thánh miếu Vĩnh Long tọa lạc trên một sở đất rộng, cặp bến bờ sông Long Hồ thuộc làng Long Hồ, Tỉnh
                Long An, huyện Vĩnh Bình (nay thuộc phường 4, thành phố Vĩnh Long).

                Người chủ xướng xây dựng công trình này là Kinh lược sứ Nam Kỳ Phan Thanh Giản và Đốc học Nguyễn Thông.
                Căn cứ văn bia do Phan Thanh Giản soạn, thì:

                Năm Kỷ Mùi, Tự Đức thứ 12 (1859), Gia Định, Biên Hòa, Định Tường nổi nhau thất thủ, sĩ phu ba tỉnh tỵ
                địa qua bản tỉnh (ý nói Vĩnh Long) và các hạt An Giang, Hà Tiên. Lúc bấy giờ binh mã bận rộn, sĩ tử mang
                bút tòng quân, việc học bỏ bê. Năm Tự Đức thứ 15 (1862), đốc học Nguyễn Thông họp các thân hào nhân sĩ
                bàn việc ấy, chọn đất ở địa phận thôn Long Hồ, cách tỉnh thành hơn 2 dặm về hướng Đông Nam, phía trước
                sông dài, phía sau là gò cao, hai bên vườn tược... Tháng 11 năm Tự Đức thứ 17 (Giáp Tý [1864]) khởi
                công, tháng 9 năm nay hoàn thành (năm Bính Dần, 1866)[1]
                Tuy trên danh nghĩa là đền Nho giáo, nhưng thực chất đây là một tụ điểm hoạt động văn hóa để cao các bậc
                tiền hiền và giáo dục lòng yêu nước. Thế nhưng chỉ có mấy tháng sau, quân Pháp lại đem chiến thuyền uy
                hiếp và chiếm thành Vĩnh Long lần thứ hai, Phan Thanh Giản tuẫn tiết, Nguyễn Thông tỵ địa ra Bình Thuận,
                Pháp lấy cớ thiếu gỗ xây dựng đình thần Long Hồ (đình tỉnh trưởng) cố ý định phá bỏ Văn Thánh miếu. Lúc
                đó ông Bá hộ Trương Ngọc Lang (tức Bá hộ Nộn-người Minh Hương) được đồng bào ở đây ra ngăn cản. Nhờ vậy
                công trình văn hóa này mới tồn tại đến hôm nay.
            </div>
            <div><button>Xem tour liên quan đến điểm du lịch này</button></div>
        </div>
    </body>
    <script>
    function addTabToContent() {
        const content = document.querySelector('.destination-content').innerHTML;
        const lines = content.split('\n');
        const indentedLines = lines.map(line => '\t' + line);
        document.querySelector('.destination-content').innerHTML = indentedLines.join('\n');
    }

    // Gọi hàm để thêm tab vào nội dung
    addTabToContent();
    </script>

    </html>