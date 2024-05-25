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
</style>

<body>
    <h1>Thêm dịch vụ</h1>
    <form action="" method="post" class="add-service-form">
        <label for="name">Tên dịch vụ:</label>
        <input type="text" name="name" id="name">
        <label for="price">Giá:</label>
        <input type="number" name="price" id="price">
        <label for="unit">Đơn vị tính:</label>
        <input type="text" name="unit" id="unit">
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description"></textarea>
        <label for="">Tình trạng:</label>
        <input type="text" name="status" id="status">
        <button onclick="addservice()">Thêm</button>
    </form>
</body>
<script>
    document.getElementById('description').addEventListener('input', function () {
        var description = document.getElementById('description');
        var value = description.value;
        var newValue = value.replace(/\n/g, '<br>');
        description.value = newValue;
    });

    function addservice() {
        var name = document.getElementById('name').value;
        var price = document.getElementById('price').value;
        var unit = document.getElementById('unit').value;
        var description = document.getElementById('description').value;
        if (price < 0 || price == '') {
            alert('Giá không hợp lệ');
            event.preventDefault();
            return;
        } else {
            if (name == '' || unit == '' || description == '') {
                alert('Vui lòng nhập đầy đủ thông tin');
                event.preventDefault();
                return;
            }
            else {
                // Call the add_service_event.php using AJAX
                var formData = new FormData(document.querySelector('.add-service-form'));
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../pscript/add_service_event.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                    }
                };
                xhr.send(formData);
            }
        }
    }
</script>

</html>