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

    .dropdown-content {
        display: none;
        position: absolute;
        flex-direction: column;
        top: auto;
        left: 120px;
        border: 1px solid #000000;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: black;
        padding: 0px 20px 0px 20px;
        height: 50px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .dropdown:hover .dropdown-content {
        display: flex;
        background-color: white;
    }
</style>

<body>
    <div class="logo-container">
        <div><img src="../img/logo2.jpg" alt=""></div>
    </div>

    <div class="functions-container">
        <div class="function-menu">
            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí khách hàng</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer" onclick="calladdCustomer()">Thêm khách hàng</a>
                    <a href="#" id="mod_customer" onclick="callmodCustomer()">Chỉnh sửa thông tin khách hàng</a>
                    <a href="#" id="addd_service">Thêm dịch vụ</a>
                    <a href="#" id="mod_service">Dịch vụ sử dụng</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlhdv" class="qlhdv">Quản lí hướng dẫn viên</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer" onclick="calladdtourguide()">Thêm hướng dẫn viên</a>
                    <a href="#" id="mod_customer" onclick="callmodtourguide()">Chỉnh sửa thông tin hướng dẫn viên</a>
                    <a href="#" id="mod_customer">Lịch trình hướng dẫn viên</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí nhân viên</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer">Thêm nhân viên</a>
                    <a href="#" id="mod_customer">Chỉnh sửa thông tin nhân viên</a>
                    <a href="#" id="mod_customer">Phát lương</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí khách sạn</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer">Thêm khách sạn</a>
                    <a href="#" id="mod_customer">Chỉnh sửa thông tin khách sạn</a>
                    <a href="#" id="mod_customer">Đặt khách sạn</a>
                    <a href="#" id="mod_customer">Khách sạn đã đặt</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí nhà hàng</a>
                <div class="dropdown-content">
                    <a href="#" id="add_customer">Thêm khách hàng</a>
                    <a href="#" id="mod_customer">Chỉnh sửa thông tin khách hàng</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" id="qlkh" class="qlkh">Quản lí tour</a>
                <div class="dropdown-content">
                    <a href="#" id="add_tour" onclick="calladdtour()">Thêm Tour</a>
                    <a href="#" id="mod_tour">Chỉnh Tour</a>
                    <a href="#" id="request-list">Danh sách đặt tour</a>
                </div>
            </div>

        </div>

        <div class="function-view" id="function-view">
        </div>
    </div>
</body>
<script src="../js/adminform.js"></script>

</html>