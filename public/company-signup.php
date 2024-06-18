<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Đăng kí tài khoản cho doanh nghiệp</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        border: 1px solid #000000;
        border-radius: 10px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
    }

    input {
        margin: 10px 0px;
        height: 30px;
        width: 450px;
    }

    select {
        margin: 10px 0px;
        height: 30px;
        width: 450px;
    }

    #logo_search_bar_wrapper {
        display: flex;
        width: 100vw;
        background-color: #3572EF;
        padding-top: 12px;
        padding-bottom: 12px;
        /* justify-content: space-between; */
    }

    #logo_search_bar_wrapper a {
        float: none;
        text-align: left;
        /* display: inline-block; */
        /* Đảm bảo phần tử cha co lại theo độ rộng của phần tử con */
        width: auto;
        /* Độ rộng tự động phù hợp với phần tử con */
        margin: 0;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
    }

    #logo_search_bar_wrapper img {
        width: 250px;
        height: 80px;
    }

    /* footer */
    footer {
        color: white;
        font-weight: bold;
        justify-content: center;
        background-color: #3572EF;
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
    }

    .login {
        padding-left: 14px;
    }

    .btn-back {
        background-color: #00F7FF;
        margin-left: auto;
        margin-right: 14px;
    }

    .btn-back:hover {
        background-color: #009688;
        /* màu nền thay đổi khi hover */
        cursor: pointer;
        /*đổi trỏ chuột hình bàn tay */
    }

    .login-form {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
    }

    .login_container {
        display: flex;
        justify-content: center;
    }

    .login-form input {
        height: 30px;
        width: 450px;
    }
</style>

<body>
    <!-- LOGO và THANH TÌM KIẾM -->
    <div id="logo_search_bar_wrapper">
        <a href="index.php" id="logo"><img src="../img/logoglobal_dark.png" alt=""></a>
        <button class="btn-back" onclick="btn_back()">QUAY LẠI</button>
    </div>

    <form action="" class="com-signup" method="post">
        <h1>Đăng kí tài khoản cho doanh nghiệp</h1>
        <label>Loại doanh nghiệp:</label>
        <select name="com_type" id="com_type">
            <option value="0">Chọn loại doanh nghiệp</option>
            <option value="NH">Nhà hàng</option>
            <option value="KS">Khách sạn</option>
            <option value="CT">Công ty du lịch/Điểm du lịch</option>
            <option value="NX">Nhà xe</option>
        </select>
        <label for="company_name">Tên doanh nghiệp:</label>
        <input type="text" name="company_name" id="company_name" required>
        <label for="company_tax_code">Mã số thuế:</label>
        <input type="text" name="company_tax_code" id="company_tax_code" required>
        <label for="company_address">Địa chỉ công ty/doanh nghiệp:</label>
        <input type="text" name="company_address" id="company_address" required>
        <label for="company_phone">Số điện thoại công ty/doanh nghiệp:</label>
        <input type="text" name="company_phone" id="company_phone" required>
        <label for="company_email">Email liên lạc của công ty/doanh nghiệp:</label>
        <input type="email" name="company_email" id="company_email" required>
        <label for="company_password">Mật khẩu:</label>
        <input type="password" name="company_password" id="company_password" required>
        <label for="company_password_confirm">Nhập lại mật khẩu:</label>
        <input type="password" name="company_password_confirm" id="company_password_confirm" required>
        <div><button onclick="company_signup()">Đăng kí</button></div>
    </form>

    <footer>
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
    </footer>
</body>
<script>
    function company_signup() {
        event.preventDefault();
        var com_type = document.getElementById('com_type').value;
        var company_name = document.getElementById('company_name').value;
        var company_tax_code = document.getElementById('company_tax_code').value;
        var company_address = document.getElementById('company_address').value;
        var company_phone = document.getElementById('company_phone').value;
        var company_email = document.getElementById('company_email').value;
        var company_password = document.getElementById('company_password').value;
        var company_password_confirm = document.getElementById('company_password_confirm').value;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*.?&]{8,}$/;

        if (com_type == 0) {
            alert('Vui lòng chọn loại doanh nghiệp để đăng kí!');
        } else {
            if (!passwordRegex.test(company_password)) {
                alert('Mật khẩu phải có ít nhất 8 ký tự, bao gồm ít nhất 1 ký tự đặc biệt, 1 chữ số, và 1 chữ in hoa!');
            }
            else {
                if (company_password != company_password_confirm) {
                    alert('Mật khẩu không trùng khớp!');
                }
                else {
                    //điều chèn dữ liệu vào database
                    var formData = new FormData(document.querySelector('.com-signup'));
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../pscript/add_company_event.php', true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            alert(xhr.responseText);
                        }
                    };
                    xhr.send(formData);
                }
            }
        }
    }
</script>

</html>