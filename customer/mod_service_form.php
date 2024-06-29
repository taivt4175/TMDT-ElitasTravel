<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/912q1a2e24eshu7s8psp8vgdb2fgf1z2mpuggodsnx6qp1h7/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="../css/loginbar.css">
    <title>Chỉnh sửa dịch vụ</title>
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
    <h1>Chỉnh sửa dịch vụ</h1>
    <?php
    require ('../connector/connect.php');
    $madoanhnghiep = $_SESSION['user_info']['id_user'];
    $madichvu = $_GET['madichvu'];
    $sql = "SELECT * FROM dichvu WHERE madichvu = '$madichvu' AND id_user = '$madoanhnghiep'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '
        <form action="" method="post" class="add-service-form" enctype="multipart/form-data">
        <label for="name">Mã dịch vụ:</label>
        <input type="text" name="madichvu" id="madichvu" value="' . $madichvu . '">

        <label for="name">Tên dịch vụ:</label>
        <input type="text" name="name" id="name" value="' . $row['tendichvu'] . '">

        <label for="description">Mô tả dịch vụ:</label>
        <textarea name="description" id="description">' . $row['motadichvu'] . '</textarea>

        <label for="">Mô tả chi tiết:</label>
        <textarea name="detail" id="detail">' . $row['motachitiet'] . '</textarea>

        <label for="">Lịch trình chi tiết:</label>
        <textarea name="lichtrinhchitiet" class="schedule" id="schedule" cols="5000" rows="5000">' . $row['lichtrinhchitiet'] . '</textarea>

        <label for="price">Giá người lớn:</label>
        <input type="number" name="person-price" id="person-price" value="' . $row['gianguoilon'] . '">
        
        <label for="price">Giá trẻ em:</label>
        <input type="number" name="child-price" id="child-price" value="' . $row['giatreem'] . '">

        <label for="unit">Đơn vị tính:</label>
        <input type="text" name="unit" id="unit" value="' . $row['donvitinh'] . '">

        <label for="">Tình trạng:</label>
        <input type="text" name="status" id="status" value="' . $row['tinhtrang'] . '">
        
        <button onclick="cancel();">Hủy</button>
        <button onclick="editservice();">Lưu</button>
    </form>';
    ?>
    <script src="../js/tinymce.js"></script>
</body>
<script>

    function cancel() {
        event.preventDefault();
        window.location.href = "../customer/index_company.php#";
    }

    function editservice() {
        event.preventDefault();
        // var lichtrinhchitiet1 = tinymce.get("schedule").getContent();
        // var lichtrinhchitiet2 = document.getElementById("schedule").value;
        // alert('Lịch trình chi tiết 1: ' + lichtrinhchitiet1 + '\nLịch trình chi tiết 2: ' + lichtrinhchitiet2);
        if (confirm('Bạn có chắc chắn muốn lưu thay đổi không?')) {
            let form = document.querySelector('.add-service-form');
            let data = new FormData(form); // Thu thập tất cả dữ liệu từ form
            var lichtrinhchitiet2 = tinymce.get("schedule").getContent();
            data.append('lichtrinhchitiet2', lichtrinhchitiet2);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../pscript/edit_service_event.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.send(data);
        }
    }
</script>

</html>