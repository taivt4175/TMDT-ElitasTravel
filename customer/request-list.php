<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Danh sach yeu cau</title>
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
        border-left: 1px solid #000;
        height: 70px;
        width: 100px;
        justify-content: center;
        align-items: center;
    }

    .main-menu .btn:hover {
        cursor: pointer;
        background-color: #009688;
    }

    .main-menu li {
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

    /* chỗ để user info */
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

    .userin4_container:hover .dropdown-container {
        display: flex;
        /* dàn nội dung theo hàng dọc */
        flex-direction: column;
    }

    .request-container {
        border: 1px solid black;
        margin: 10px;
        padding: 10px;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <a href="../public/index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
            <ul class="main-menu">
                <?php
                if (isset($_SESSION['user_info'])) {
                    $userInfo = $_SESSION['user_info'];
                    // Làm gì đó với $userInfo
                    $id_user = $userInfo['id_user'];
                    $hoten = $userInfo['hoten'];
                    echo '
                    <a href="" class="btn">GIÚP ĐỠ</a>
                    <a href="" class="btn">ĐẶT TOUR</a>
                    ';
                    echo '<div class="userin4_container">';
                    echo '<div class="info">' . $id_user . '</div><br>';
                    echo '<div class="info">' . $hoten . '</div><br>';
                    echo '
                    <div class="dropdown-container">
                        <a href="../customer/request-list.php">YÊU CẦU CỦA TÔI</a>
                        <a href="">CHỈNH SỬA HỒ SƠ</a>
                        <a href="" class="logout" onclick="log_out()">ĐĂNG XUẤT</a>
                    </div>
                    ';
                    echo '</div>';
                } else {
                    echo '<li><a href="">HỖ TRỢ</a></li>';
                    echo '<li><a href="signup.php">ĐĂNG KÍ</a></li>';
                    echo '<li><a href="login.php">ĐĂNG NHẬP</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>

    <h1>Danh sách yêu cầu</h1>
    <?php
    $user_info = $_SESSION['user_info'];
    $id_user = $user_info['id_user'];
    require ('../connector/connect.php');
    $sql = "SELECT * FROM chitietgioyeucau AS a
                INNER JOIN gioyeucau AS b ON a.id_gio = b.id_gio
                WHERE b.id_user = '$id_user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["daxacnhan"] == 0) {
                $row["daxacnhan"] = "Chưa thanh toán";
            } else {
                $row["daxacnhan"] = "Đã thanh toán";
            }
            echo "<div class='request-container'>";
            echo "<h5>Trạng thái: " . $row["daxacnhan"] . "</h5>";
            echo "Mã dịch vụ: " . $row["madichvu"] . "<br/>- Số lượng: " . $row['sl'] . "<br/>- Ngày yêu cầu: " . $row["ngayyeucau"] . "<br/>";
            echo "- Ngày bắt đầu: " . $row["ngaybatdau"] . "<br/>- Ngày kết thúc: " . $row['ngayketthuc'] . "<br>";
            echo '<a href="../public/chitietdichvu.php?id=' . $row["madichvu"] . '">Xem chi tiết</a>';
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>