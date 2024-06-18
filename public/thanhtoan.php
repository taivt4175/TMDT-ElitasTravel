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
    <title>Thanh toán</title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: row;
        margin: 10px;
    }

    .product {
        display: flex;
        flex-direction: column;
        border: 1px solid #000;
        margin: 10px;
        width: 70%;
    }

    .payment {
        display: flex;
        flex-direction: column;
        border: 1px solid #000;
        margin: 10px;
        width: 30%;
    }

    form {
        display: flex;
        flex-direction: column;
        margin: 5px;
    }

    .payment-container {
        display: flex;
        flex-direction: row;
        margin: 5px;
    }

    .payment-container h3 {
        font-size: 20px;
        margin: 0;
    }

    .payment-container input {
        display: flex;
        justify-self: center;
        align-self: center;
        width: 20px;
        height: 20px;
        margin: 5px;
    }

    .payment-container img {
        width: 40px;
        height: 40px;
        margin: 5px;
    }

    .payment-container i {
        font-size: 40px;
        margin: 5px;
    }

    .wallet {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        margin: 5px;
    }

    .tour {
        display: flex;
        margin: 10px;
    }

    .service_detail {
        display: flex;
        flex-direction: column;
        margin: 5px;
        font-size: 20px;
    }

    .btn-pay {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
        padding: 10px;
        background-color: #00D110;
        color: #fff;
        font-size: 20px;
        border: none;
        border-radius: 5px;
    }

    .btn-pay:hover {
        cursor: pointer;
    }

    .btn-cancel {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
        padding: 10px;
        background-color: #FF0000;
        color: #fff;
        font-size: 20px;
        border: none;
        border-radius: 5px;
    }
</style>

<body>
    <div id="wrapper">
        <nav id="nav-container">
            <a href="../public/index.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
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

    <div class="container">
        <div class="product">
            <?php
            require ('../connector/connect.php');
            $id_user = $_SESSION['user_info']['id_user'];
            $sql1 = "SELECT sl_ecoin FROM chitietkh
                     WHERE id_user = '$id_user'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            $wallet = $row1['sl_ecoin'];
            $madichvu = $_GET['madichvu'];
            $id_congty = $_GET['id_congty'];
            $sql2 = "SELECT id_gio FROM gioyeucau
                     WHERE id_user = '$id_user'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $id_gio = $row2['id_gio'];
            // echo $id_gio;
            $sql3 = "SELECT * FROM dichvu
                     WHERE madichvu = '$madichvu' AND id_user = '$id_congty'";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            $img_string = $row3['hinhanh'];
            $count = substr_count($img_string, ';');
            $anh = explode(";", $img_string);
            $img = $anh[0];
            echo '<div class="tour">';
            echo '<a href="" class="tour-img">
                        <img src="' . $img . '" alt="">
                    </a>';
            echo '<div>';
            echo '<div class="service_detail">';
            echo '<div class="service_detail_info">';
            echo '<div class="service_detail_id">Mã dịch vụ: ' . $madichvu . '</div>';
            echo '<div class="service_detail_name">Tên dịch vụ: ' . $row3['tendichvu'] . '</div>';
            echo '<div class="service_detail_price">Giá: ' . $row3['gia'] . '</div>';
            echo '<div class="service_detail_description">' . $row3['motachitiet'] . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?>
        </div>
        <div class="payment">
            <form method="post">
                <h3>Tổng tiền: <?php echo $row3['gia']; ?>VND</h3>
                <label for="">Chọn phương thức thanh toán:</label>
                <div class="payment-container">
                    <input type="radio" value="momo" name="paymethod">
                    <img src="../img/momoicon.jpg" alt="">
                </div>
                <div class="payment-container">
                    <input type="radio" value="vnpay" name="paymethod">
                    <img src="../img/vnpayicon.jpg" alt="">
                </div>
                <div class="payment-container">
                    <input type="radio" value="mastercard" name="paymethod">
                    <img src="../img/mastercardicon.png" alt="">
                </div>
                <div class="payment-container">
                    <input type="radio" value="paypal" name="paymethod">
                    <img src="../img/paypalicon.png" alt="">
                </div>
                <div class="payment-container">
                    <input type="radio" value="wallet" name="paymethod">
                    <i class="fa-solid fa-wallet"></i>
                    <div class="wallet">Số dư hiện tại: <?php echo $wallet; ?> VND </div>
                </div>
                <button class="btn-pay"
                    onclick="pay(<?php echo $row3['gia'] . ', ' . $wallet . ', \'' . $madichvu . '\', \'' . $id_gio . '\',\''. $id_congty . '\''; ?>)">Thanh
                    toán</button>
                <button class="btn-cancel" onclick="cancel()">Hủy bỏ</button>
            </form>
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
    function pay(price, wallet, madichvu,id_gio , id_congty) {
        alert(price + " " + wallet + " " + id_gio + " " + madichvu);
        var methodElement = document.querySelector('input[name="paymethod"]:checked');
        if (!methodElement) {
            alert("Vui lòng chọn phương thức thanh toán!");
            return;
        }
        var method = methodElement.value;
        if (method == "wallet") {
            if (wallet < price) {
                alert("Số dư trong ví không đủ!");
                return;
            }
            var confirm = window.confirm("Bạn có chắc chắn muốn thanh toán bằng ví không?");
            if (confirm) {
                // const url = new URL(window.location.href);
                // url.search = ''; // Xóa tất cả các tham số
                // window.history.pushState({}, '', url);
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../pscript/paybywallet.php?price=' + price + '&wallet=' + wallet + '&id_gio=' + id_gio + '&madichvu=' + madichvu + '&id_congty=' + id_congty, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                    }
                };
                xhr.send();
            }
        }
        if (method == "momo") {
            alert("Thanh toán thành công!");
        }
        if (method == "vnpay") {
            alert("Thanh toán thành công!");
        }
        if (method == "mastercard") {
            alert("Thanh toán thành công!");
        }
        if (method == "paypal") {
            alert("Thanh toán thành công!");
        }
    }

    function cancel() {
        window.location.href = "index.php";
    }

    // function log_out() {
    //     alert("Đăng xuất thành công!");
    //     window.location.href = "index.php";
    // }

    // function my_request_form() {
    //     window.location.href = "request-list.php";
    // }
</script>

</html>