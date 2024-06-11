<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Đăng kí hướng dẫn viên</title>
</head>
<style>
    .logo_search_bar_wrapper {
        display: flex;
        width: 100vw;
        background-color: #3ABEF9;
        padding-top: 12px;
        padding-bottom: 12px;
        justify-content: space-between;
    }

    /* .logo {
    float: none;
    width: auto;
    margin: 0;
    padding-right: 14px;
    padding-left: 14px;
    text-decoration: none;
    }  */

    .logo_search_bar_wrapper img {
        width: 250px;
        height: 80px;
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

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        margin-top: 50px;
        border: 1px solid #000000;
        border-radius: 5px;
        width: 50%;
    }
</style>

<body>
    <div class="logo_search_bar_wrapper">
        <a href="index.php" id="logo"><img src="../img/logoglobal.jpg" alt=""></a>
        <a class="btn-back" href="index.php">QUAY LẠI</a>
    </div>

    <div class="form-container">
        <form action="" method="post">
            <h1>Đăng kí hướng dẫn viên</h1>
            <label for="name">Họ và tên:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="phone">Số điện thoại:</label><br>
            <input type="tel" id="phone" name="phone" required><br>
            <label for="address">Địa chỉ:</label><br>
            <input type="text" id="address" name="address" required><br>
            <label for="password">Mật khẩu:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="repassword">Nhập lại mật khẩu:</label><br>
            <input type="password" id="repassword" name="repassword" required><br>
        </form>
    </div>
</body>

</html>