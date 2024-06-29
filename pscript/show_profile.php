<?php
    require('../connector/connect.php');
    $id_user = $userInfo['id_user'];
    $sql1 = "SELECT * FROM user WHERE id_user = '$id_user'";
    $sql2 = "SELECT * FROM chitietkh WHERE id_user = '$id_user'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    echo '<label for="hoten">Họ tên:</label>';
    echo '<input type="text" id="hoten" name="hoten" value="' . $row1['hoten'] . '">';
    echo '<label for="email">Email:</label>';
    echo '<input type="text" id="email" name="email" value="' . $row1['email'] . '">';
    echo '<label for="sdt">Số điện thoại:</label>';
    echo '<input type="text" id="sdt" name="sdt" value="' . $row1['sdt'] . '">';
    echo '<label for="stkmomo">STK Momo:</label>';
    if ($row2['stk_momo'] == 0 || $row2['stk_momo'] == "Chưa thiết lập") {
        echo '<input type="text" id="stkmomo" name="stkmomo" value="" placeholder="Chưa thiết lập">';
    } else {
        echo '<input type="text" id="stkmomo" name="stkmomo" value="' . $row2['stkmomo'] . '">';
    }
    echo '<label for="stknganhang">STK BIDV:</label>';
    if ($row2['stk_bidv'] == 0 || $row2['stk_bidv'] == "Chưa thiết lập") {
        echo '<input type="text" id="stknganhang" name="stkbidv" value="" placeholder="Chưa thiết lập">';
    } else {
        echo '<input type="text" id="stknganhang" name="stkbidv" value="' . $row2['stk_bidv'] . '">';
    }
    echo '<label for="stknganhang">STK Mastercard:</label>';
    if ($row2['mastercard'] == 0 || $row2['mastercard'] == "Chưa thiết lập") {
        echo '<input type="text" id="stkmastercard" name="mastercard" value="" placeholder="Chưa thiết lập">';
    } else {
        echo '<input type="text" id="stkmastercard" name="mastercard" value="' . $row2['stk_mastercard'] . '">';
    }
?>