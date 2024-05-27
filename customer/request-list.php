<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach yeu cau</title>
</head>
<style>

</style>
<body>
    <h1>Danh sách yêu cầu</h1>
    <?php
        session_start();   
        print_r($_SESSION);
        $user_info = $_SESSION['user_info'];
        $id_user = $user_info['id_user'];
        require('../connector/connect.php');
        $sql = "SELECT * FROM yeucaudichvu WHERE id_user = '$id_user'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "Mã yêu cầu: " . $row["id_request"]. " - Người yêu cầu: " . $row["id_user"]. " " . $row["ngayyeucau"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    ?>  
</body>
</html>