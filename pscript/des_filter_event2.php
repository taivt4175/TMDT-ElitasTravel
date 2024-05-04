<?php
    $tinhId = $_GET['tinhId'];

    require("../connector/connect.php");

    $sql = "SELECT id_qh, tenqh FROM quanhuyen WHERE id_tinh = '$tinhId'";
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id_qh'].'">'.$row['tenqh'].'</option>';
        }
    }
    $conn->close();
?>