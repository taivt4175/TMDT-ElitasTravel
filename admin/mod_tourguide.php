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
</style>

<body>
    <form action="" method="post" class="function-view-2" style="overflow: auto; ">
        <h1>Danh sách hướng dẫn viên</h1>

        <div class="filter">
            <label for="">Lọc: </label>

            <input type="text" name="name_filter" id="name-filter" placeholder="Họ tên">

            <input type="number" name="sdt_filter" id="sdt_filter" placeholder="Số điện thoại">

            <input type="text" name="email_filter" id="email_filter" placeholder="Email">

            <input type="text" name="cccd_filter" id="cccd_filter" placeholder="CCCD/Hộ chiếu">

            <button name="btn_filter" id="btn_filter" onclick="filter()">Xác nhận</button>
            <button name="btn_refresh" id="btn_refresh" onclick="refresh()">Làm mới</button>
        </div>

        <table>
            <tr>
                <th>Mã hướng dẫn viên</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>CCCD/Hộ chiếu</th>
                <th>Ngày vào làm</th>
                <th>Lương cơ bản</th>
                <th>Hệ số</th>
                <th>Thưởng thêm</th>
                <th>Mật khẩu</th>
                <th>Chức năng</th>
            </tr>
            <?php
            require ('../pscript/show_tourguidelist_event.php');
            ?>
        </table>
</body>
<script>
    function deleteCustomer(id) {
        if (confirm('Bạn có chắc chắn muốn xóa khách hàng ' + id + ' này không?')) {
            // Gửi yêu cầu AJAX để xóa khách hàng
            fetch('../pscript/delete_user.php', {
                method: 'POST', // Phương thức POST
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded', // Loại nội dung
                },
                body: 'id=' + id  // Dữ liệu gửi đi
            })
                .then(response => response.text())  // Xử lý phản hồi từ máy chủ
                .then(data => {
                    alert(data);  // Hiển thị thông báo phản hồi
                    window.location.reload();  // Tải lại trang để cập nhật danh sách
                })
                .catch(error => console.error('Error:', error));  // Xử lý lỗi
        }
    }
</script>

</html>