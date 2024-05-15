<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <title>Thêm Tour</title>
</head>
<style>
    .addtour-form {
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .addtour-form input[type="text"],
    input[type="number"] {
        height: 30px;
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .province {
        height: 30px;
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .district {
        height: 30px;
        width: 500px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .btn-addtour {
        margin-top: 20px;
        height: 50px;
        width: 100px;
        background-color: #00F7FF;
        border: 1px solid #000000;
        border-radius: 10px;
    }

    .btn-addtour:hover {
        cursor: pointer;
        background-color: #009688;
    }

    label {
        margin-top: 10px;
    }

    .button-container {
        display: flex;
        justify-content: center;
    }

    .description {
        height: 100px;
        width: 500px;
    }
</style>

<body>
    <form action="" class="addtour-form" method="post">
        <h1>Tạo Tour</h1>
        <label for="">Tên Tour:</label>
        <input type="text" name="tourname" id="tourname">
        <label for="">Mô tả chi tiết</label>
        <textarea name="description" class="description" id="description"></textarea>
        <label for="">Tỉnh:</label>
        <select class="province" name="province" id="province" onchange="callshowdistrict()">
            <?php
            require ("../pscript/province-select.php")
                ?>
        </select>
        <label for="">Quận/huyện/thành phố:</label>
        <select class="district" name="district" id="district">
        </select>
        <label for="">Giá:</label>
        <input type="number" name="price" id="price">
        <div class="button-container"><button class="btn-addtour" onclick="addtour()">Tạo Tour</button></div>
    </form>
</body>
<script src="../js/addtour_check.js"></script>
</html>