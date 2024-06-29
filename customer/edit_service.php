<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách dịch vụ</title>
</head>
<style>
        /* .function-view {
        width: auto;
        height: 500px;
        margin: 10px 0px 0px 10px;
        overflow: auto;
    } */

    /* Định dạng cho bảng */
    table {
        /* Chiều rộng của bảng */
        margin: 20px auto;
        /* Căn giữa bảng và đặt khoảng cách */
        border-collapse: collapse;
        /* Loại bỏ khoảng cách giữa các border */
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        /* Thêm bóng đổ cho bảng */
        font-size: 13px;
    }

    /* Định dạng cho các ô tiêu đề và các ô trong bảng */
    th,
    td {
        width: auto;
        /* Cho phép các cột tự động điều chỉnh chiều rộng */
        min-width: 120px;
        /* Đảm bảo cột không quá nhỏ */
        border: 1px solid #ddd;
        /* Đường viền cho mỗi ô */
        padding: 10px 15px;
        /* Đệm cho nội dung bên trong ô */
        text-align: left;
        /* Căn lề trái cho nội dung */
    }

    /* Định dạng cho hàng tiêu đề */
    th {
        background-color: #f8f8f8;
        /* Màu nền cho hàng tiêu đề */
        color: #333;
        /* Màu chữ cho tiêu đề */
    }

    /* Tăng cường độ nhìn cho hàng khi rê chuột qua */
    tr:hover {
        background-color: #f1f1f1;
    }

    /* modal box modify customer */
    .modal {
        display: none;
        flex-direction: column;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modify-form {
        display: flex;
        flex-direction: column;
    }
</style>
<body>
<form action="" method="post" class="function-view-2" style="overflow: auto; ">
        <h1>Danh sách dịch vụ</h1>

        <div class="filter">
            <label for="">Lọc: </label>

            <input type="text" name="name_filter" id="name-filter" placeholder="Họ tên">

            <input type="number" name="sdt_filter" id="sdt_filter" placeholder="Số điện thoại">

            <input type="text" name="email_filter" id="email_filter" placeholder="Email">

            <input type="text" name="cccd_filter" id="cccd_filter" placeholder="CCCD/Hộ chiếu">

            <button name="btn_filter" id="btn_filter" onclick="filter()">Xác nhận</button>
            <button name="btn_refresh" id="btn_refresh" onclick="refresh()">Làm mới</button>
        </div>
    </form>
    </div>
    <table>
        <tr>
            <th>Mã dịch vụ</th>
            <th>Tên dịch vụ</th>
            <th>Mã doanh nghiệp</th>
            <th>Tên doanh nghiệp</th>
            <th>Giá người lớn</th>
            <th>Giá trẻ em</th>
            <th>Chức năng</th>
        </tr>
        <?php
        require ('../pscript/show_service_event.php');
        ?>
    </table>
</body>
</html>