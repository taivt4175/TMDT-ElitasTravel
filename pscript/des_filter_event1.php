<?php
    require("../connector/connect.php");
    // Truy vấn tất cả tỉnh
    $sql = "SELECT id_tinh, tentinh FROM tinh";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id_tinh'].'">'.$row['tentinh'].'</option>';
        }
    }
    $conn->close();
?>