<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../css/reset1.css" />
  <!-- font roboto -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
</head>
<style>
  #logo_search_bar_wrapper {
    display: flex;
    width: 100vw;
    background-color: #00F7FF;
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

  /* footer */
  footer {
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
    <a href="index.php" id="logo"><img src="../img/logo2.jpg" alt=""></a>
    <button class="btn-back">QUAY LẠI</button>
  </div>
  <!-- from login -->
  <div class="login">
    <div class="login_container">
      <form class="login-form" action="login.php" method="POST">
        <h1>ĐĂNG NHẬP</h1>
        <h5>Email:</h5>
        <input type="text" class="input-login-username" name="email" />
        <h5>Password:</h5>
        <input type="password" class="input-login-password" name="password" />
        <p></p>
        <input type="submit" class="login_signInButton" name="login_signInButton" value="Đăng nhập">
        <p>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require('../pscript/login_event.php');
          }
          ?>
        </p>
        <a href="signup.php" class="login_registerButton">Tạo tài khoản mới</a>
      </form>
    </div>
  </div>

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
<!-- <script src="../js/main.js"></script> -->

</html>