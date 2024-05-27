<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <title>Thêm khách hàng</title>
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

    .signup-form {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
    }

    .signup-form input[type="text"],
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
    <div class="signup">
        <div class="signup-container">

            <form class="signup-form" action="" method="POST">
                <h1>Thêm khách hàng</h1>

                <h5>Họ và Tên:</h5>
                <input type="text" name="name" class="input-signup-name" required />

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
                <input type="text" name="email" class="email" required />

                <h5>Số Điện Thoại:</h5>
                <input type="tel" name="tel" class="input-signup-phone" required />

                <h5>Password:</h5>
                <input type="password" name="password" class="input-signup-password" required />

                <h5>Confirm password:</h5>
                <input type="password" name="cf-password" class="input-signup-password" required />

                <div style="text-align: center;">
                    <button onclick="sign_up()" class="signup_signInButton">Tạo</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/signup3.js"></script>
    <script>
        function updateDays() {
            // Lấy năm và tháng được chọn
            var year = document.getElementById('year').value;
            var month = document.getElementById('month').value;
            var daySelect = document.getElementById('day');

            // Xác định số ngày trong tháng
            var daysInMonth = new Date(year, month, 0).getDate();

            // Xóa các lựa chọn ngày hiện có
            while (daySelect.firstChild) {
                daySelect.removeChild(daySelect.firstChild);
            }

            // Thêm các lựa chọn ngày theo tháng và năm
            for (var i = 1; i <= daysInMonth; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                daySelect.appendChild(option);
            }
        }

        // Thêm các lựa chọn tháng
        for (var i = 1; i <= 12; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            document.getElementById('month').appendChild(option);
        }

        // Thêm các lựa chọn năm từ 1950 đến năm hiện tại
        var currentYear = new Date().getFullYear();
        for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            document.getElementById('year').appendChild(option);
        }

        // Gọi updateDays một lần để khởi tạo các lựa chọn ngày
        updateDays();

        // Đặt giá trị mặc định cho năm và tháng
        document.getElementById('year').value = currentYear;
        document.getElementById('month').value = new Date().getMonth() + 1; // Tháng trong JS đếm từ 0
        updateDays(); // Cập nhật lại ngày sau khi đặt tháng</script>
</body>

</html>