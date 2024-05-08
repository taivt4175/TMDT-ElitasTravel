<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <title>Chỉnh sửa thông tin khách hàng</title>
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
    th, td {
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
</style>

<body>
    <form action="" method="post" class="function-view-2" style="overflow: auto; ">
        <h1>Danh sách khách hàng</h1>

        <div class="filter">
            <select name="id_filter" id="filter"></select>
        </div>

        <table>
            <tr>
                <th>Mã khách hàng</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>CCCD/Hộ chiếu</th>
                <th>Số lượng E-coin</th>
                <th>STK MOMO</th>
                <th>STK BIDV</th>
                <th>STK MasterCard</th>
                <th>Tên Khách Hàng</th>
                <th>Nạp lần đầu</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Chức năng</th>
            </tr>
            <?php
            require ('../pscript/show_customerlist_event.php');
            ?>
        </table>
    </form>
</body>
<script> src="../js/delete_user.js"></script>
</html>