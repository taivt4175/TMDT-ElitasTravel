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
    <title>Hồ sơ</title>
</head>
<style>
    .container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f2f2f2;
    }

    .container h1 {
        text-align: center;
    }

    .container p {
        text-align: center;
    }

    .container label {
        font-weight: bold;
    }

    .container input {
        width: 100%;
        padding: 10px;
        margin: 5px 0 20px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 5px;
    }

    .signup {
        position: relative;
        display: inline-block;
    }

    .btn-edit {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-edit:hover {
        background-color: #45a049;
        cursor: pointer;
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
                    ';
                    echo '<div class="userin4_container">';
                    echo '<div class="info">' . $hoten . '</div>';
                    echo '
                    <div class="dropdown-container">
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

    <form action="" method="post">
        <div class="container">
            <h1>Chỉnh sửa thông tin cá nhân</h1>
            <p>Vui lòng điền thông tin vào các trường dưới đây để chỉnh sửa thông tin cá nhân của bạn.</p>
            <!-- #region -->
            <?php
            require ('../pscript/show_profile.php')
                ?>
            <button class="btn-edit" onclick="edit();">Chỉnh sửa</button>
            <button class="btn-edit" onclick="cancel();">Hủy bỏ</button>
        </div>
    </form>
    <script>
        function edit() {
            // Kiểm tra dữ liệu
            var error = [];
            var hoten = document.getElementById("hoten").value;
            var email = document.getElementById("email").value;
            var sdt = document.getElementById("sdt").value;
            var stkmomo = document.getElementById("stkmomo").value;
            var stknganhang = document.getElementById("stknganhang").value;
            var stkmastercard = document.getElementById("stkmastercard").value;

            if (hoten == "") {
                error.push("Họ tên không được để trống");
            }
            if (email == "") {
                error.push("Email không được để trống");
            }
            if (sdt == "") {
                error.push("Số điện thoại không được để trống");
            } else if (sdt.length != 10 || isNaN(sdt)) {
                error.push("Số điện thoại phải là dãy số có 10 chữ số");
            }

            if (error.length > 0) {
                alert(error.join("\n"));
            } else {
                // Gửi dữ liệu lên server
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "success") {
                            alert("Chỉnh sửa thông tin cá nhân thành công");
                            window.location.href = "adminform.php";
                        } else {
                            alert("Chỉnh sửa thông tin cá nhân thất bại");
                        }
                    }
                };
                xhr.open("POST", "../pscript/edit_profile.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("hoten=" + encodeURIComponent(hoten) + "&email=" + encodeURIComponent(email) + "&sdt=" + encodeURIComponent(sdt) + "&stkmomo=" + encodeURIComponent(stkmomo) + "&stknganhang=" + encodeURIComponent(stknganhang) + "&stkmastercard=" + encodeURIComponent(stkmastercard));
            }
        }

        function cancel() {
            window.location.href = "../public/index.php";
        }
    </script>
</body>
</html>