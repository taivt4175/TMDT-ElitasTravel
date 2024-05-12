<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Chỉnh sửa chi tiết</title>
</head>
<style>
    .signup {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .signup-container {
        width: 500px;
    }

    .update-form {
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
    }

    .update-form input[type="text"],
    input[type="tel"],
    input[type="password"] {
        height: 30px;
        width: 450px;
    }

    .signup_signInButton {
        margin-top: 20px;
        height: 50px;
        width: 100px;
        background-color: #00F7FF;
        border: 1px solid #000000;
        border-radius: 10px;
    }

    .signup_signInButton:hover {
        cursor: pointer;
        background-color: #009688;
    }
</style>

<body>
    <form action="" method="POST" class="update-form">
        <h1>Chỉnh sửa chi tiết</h1>

        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" value="" readonly><br>

        <h5>Họ và Tên:</h5>
        <input type="text" name="input-signup-name" class="input-signup-name" required />

        <h5>Ngày Sinh:</h5>
        <label for="day">Ngày:</label>
        <select id="day" name="day" required>
            <!-- JavaScript sẽ điền các lựa chọn ngày ở đây -->
        </select>

        <label for="month">Tháng:</label>
        <select id="month" name="month" onchange="updateDays();" required>
            <!-- JavaScript sẽ điền các lựa chọn tháng ở đây -->
        </select>

        <label for="year">Năm:</label>
        <select id="year" name="year" onchange="updateDays();" required>
            <!-- JavaScript sẽ điền các lựa chọn năm ở đây -->
        </select>

        <h5>Giới Tính:</h5>
        <div class="signup_gender">
            <input type="radio" id="male" name="gender" value="Nam" required />
            <label for="male">Nam</label>
            <input type="radio" id="female" name="gender" value="Nữ" required />
            <label for="female">Nữ</label>
        </div>

        <h5>Email:</h5>
        <input type="text" name="email" class="input-signup-username" required />

        <h5>Số Điện Thoại:</h5>
        <input type="tel" name="input-signup-phone" class="input-signup-phone" required />

        <h5>Tên tài khoản</h5>
        <input type="text" class="username" name="username" required />

        <h5>Password:</h5>
        <input type="password" name="password" class="input-signup-password" required />

        <h5>Confirm password:</h5>
        <input type="password" name="cf-password" class="input-signup-password" required />

        <div>
            <button onclick="cancel()">Hủy bỏ</button>
            <button onclick="update()">Cập nhật</button>
        </div>
    </form>
</body>
<script src="../js/signup2.js"></script>
</html>