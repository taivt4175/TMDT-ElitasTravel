<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Thêm dịch vụ</title>
</head>
<style>
    form {
        width: 50%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }

    label {
        margin-top: 10px;
    }

    input {
        margin-top: 5px;
        padding: 5px;
    }

    button {
        margin-top: 10px;
        padding: 5px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    textarea {
        margin-top: 5px;
        padding: 5px;
        resize: none;
        height: 100px;
    }

    .chose-imgs {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

</style>

<body>
    <h1>Thêm dịch vụ</h1>
    <form action="" method="post" class="add-service-form" enctype="multipart/form-data">
        <label for="name">Mã dịch vụ:</label>
        <input type="text" name="madichvu" id="madichvu">

        <label for="name">Tên dịch vụ:</label>
        <input type="text" name="name" id="name">

        <label for="description">Mô tả dịch vụ:</label>
        <textarea name="description" id="description"></textarea>

        <label for="">Mô tả chi tiết:</label>
        <textarea name="detail" id="detail"></textarea>

        <label for="">Lịch trình chi tiết:</label>
        <textarea name="lichtrinhchitiet" class="schedule" cols="5000" rows="5000"></textarea>

        <label for="">Thêm hình ảnh: (Nhấn giữ "Ctrl" để chọn nhiều ảnh)</label>
        <input type="file" name="fileUpload[]" id="fileUpload" multiple="multiple">
        <div class="chose-imgs" id="chose-imgs" name="chose-img"></div>

        <label for="price">Giá người lớn:</label>
        <input type="number" name="person-price" id="price">
        
        <label for="price">Giá trẻ em:</label>
        <input type="number" name="child-price" id="price">

        <label for="unit">Đơn vị tính:</label>
        <input type="text" name="unit" id="unit">

        <label for="">Tình trạng:</label>
        <input type="text" name="status" id="status">
        
        <button onclick="addservice()">Thêm</button>
    </form>
</body>
</html>