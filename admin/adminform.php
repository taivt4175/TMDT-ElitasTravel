<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Admin</title>
</head>
<style>
    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #58BDFF;
        height: 100px;
    }

    .functions-container {
        display: flex;
        width: 100%;
    }

    .function-menu {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 250px;
        height: 500px;
        margin: 10px 0px 0px 10px;
    }

    .function-view {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 1205px;
        height: 500px;
        margin: 10px 0px 0px 10px;
        overflow: auto;
    }

    .function-menu a {
        display: flex;
        padding: 0px 0px 0px 20px;
        align-items: center;
        text-decoration: 0;
        height: 50px;
        /* padding: 20px 0px 0px 20px; */
    }

    .function-menu a:hover {
        border-radius: 10px;
        cursor: pointer;
        background-color: #91F0F3;
    }
</style>

<body>
    <div class="logo-container">
        <div><img src="../img/logo2.jpg" alt=""></div>
    </div>

    <div class="functions-container">
        <div class="function-menu">
            <a href="" id="qlkh">
                <div class="item">Quản lí khách hàng</div>
            </a>
            <a href="">
                <div class="item">Quản lí hướng dẫn viên</div>
            </a>
            <a href="">
                <div class="item">Quản lí nhà xe</div>
            </a>
            <a href="">
                <div class="item">Quản lí điểm du lịch</div>
            </a>
            <a href="">
                <div class="item">Quản lí điểm nhà hàng</div>
            </a>
        </div>

        <div class="function-view" id="function-view">
        </div>
    </div>
    <script src="../js/adminform.js"></script>
</body>

</html>