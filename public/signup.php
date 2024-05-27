<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/reset1.css">
  <title>Đăng kí</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
</head>
<style>
  .logo_search_bar_wrapper {
    display: flex;
    width: 100vw;
    background-color: #00F7FF;
    padding-top: 12px;
    padding-bottom: 12px;
    justify-content: space-between;
  }

  .logo {
    float: none;
    /* Đảm bảo phần tử cha co lại theo độ rộng của phần tử con */
    width: auto;
    /* Độ rộng tự động phù hợp với phần tử con */
    margin: 0;
    padding-right: 14px;
    padding-left: 14px;
    text-decoration: none;
  }

  .btn-back {
    border: 1px solid #000000;
    border-radius: 10px;
    background-color: #00F7FF;
    margin: 0px 25px 0px 0px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    width: 100px;
  }

  .btn-back:hover {
    cursor: pointer;
    background-color: #009688;
  }

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

  footer {
    background-color: #58BDFF;
    color: #000000;
    text-align: center;
    padding: 10px;
    /* position: fixed; */
    bottom: 0;
    width: 100%;
    height: 50px;
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
  <!-- LOGO và THANH TÌM KIẾM -->
  <div class="logo_search_bar_wrapper">
    <a href="index.php" class="logo"><img src="../img/logo2.jpg" alt=""></a>
    <a class="btn-back" href="index.php">QUAY LẠI</a>
  </div>

  <div class="signup">
    <div class="signup-container">
      <form class="signup-form" action="" method="POST">
        <h1>Đăng Ký</h1>

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

        <div><a href="../public/login.php" class="signup_registerButton">Bạn đã có tài khoản</a></div>

        <div style="text-align: center;">
          <button value="Đăng kí" class="signup_signInButton" onclick="sign_up_z()">Đăng kí</button>
        </div>
      </form>
    </div>
  </div>
  <!-- <script src="../js/signup.js"></script> -->
  <script src="../js/signup2.js"></script>
  <script>
    function sign_up_z() {
      // Lấy giá trị từ các trường input
      var name = document.querySelector('.input-signup-name').value;
      var day = document.querySelector('#day').value;
      var month = document.querySelector('#month').value;
      var year = document.querySelector('#year').value;
      var gender = document.querySelector('input[name="gender"]:checked').value;
      var email = document.querySelector('.email').value;
      var tel = document.querySelector('.input-signup-phone').value;
      var password = document.querySelector('.input-signup-password').value;
      var cfPassword = document.querySelector('.input-signup-password').value;
      var daybirth = year + '-' + month + '-' + day;

      // Tạo một mảng data chứa các giá trị
      var data = {
        name: name,
        daybirth: daybirth,
        gender: gender,
        email: email,
        tel: tel,
        password: password,
        cfPassword: cfPassword
      };

      // Gửi request đến server
      fetch('../pscript/signup_event.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
        .then(response => response.text())
        .then(data => {
          alert(data);
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    }
  </script>
  <footer>
    <p>&copy; Copyrights 2024. All rights reserved by Vu Thanh Tai</p>
  </footer>
</body>

</html>