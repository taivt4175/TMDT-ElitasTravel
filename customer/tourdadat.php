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
    <title>Danh sách hóa đơn</title>
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

    a {
        text-decoration: none;
    }

    i {
        margin: 0px 5px 0px 5px;
    }

    .container {
        display: flex;
        flex-direction: column;
        /* justify-content: center;
        align-items: center; */
        margin: 10px 10px 10px 10px;
        border: 1px solid black;
    }

    .hoadon {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        font-size: 20px;
        margin: 5px 5px 5px 5px;
        border: 1px solid black;
    }

    .thongtin {
        display: flex;
        flex-direction: column;
        margin: 5px 5px 5px 5px;
    }

    .button {
        display: flex;
        flex-direction: column;
        margin: 5px 5px 5px 5px;
        justify-content: center;
        align-items: center;
    }

    .button button {
        font-size: 20px;
        margin: 5px 5px 5px 5px;
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
                        <a href="../customer/tourdadat.php"><i class="fa-solid fa-shopping-bag"></i>DỊCH VỤ ĐÃ ĐẶT</a>
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
    <!-- danh sách hóa đơn -->
    <div class="container">
        <h2>Danh sách hóa đơn</h2>
        <?php
        require ('../pscript/hienthidshoadon.php')
            ?>
        <!-- <div class="hoadon">
            <div class="thongtin">
                <div>Mã hóa đơn: 123456</div>
                <div>Ngày đặt: </div>
                <div>Giá trị: 150000 VNĐ</div>
                <div>Trạng thái: Đã xác nhận</div>
            </div>
            <div class="button">
                <button>Xem chi tiết</button>
                <button>Hủy dịch vụ</button>
            </div>
        </div> -->
    </div>
</body>
<script>
    function chitiethd(mahd) {
        window.location.href = 'chitiethoadon.php?mahd=' + mahd;
    }

    function huyhd(mahd) {
        if (confirm('Bạn có chắc chắn muốn hủy hóa đơn này không?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../pscript/huyhoadon.php');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
            // xhr.send(data);
            xhr.send(mahd);
        }
    }

</script>

</html>