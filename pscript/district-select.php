<?php
require("../connector/connect.php");
$id_tinh = $_POST['id_tinh'];
echo ("id_tinh:" . $id_tinh);
$sql = "SELECT * FROM quanhuyen WHERE id_tinh = '$id_tinh'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id_qh'] . "'>" . $row['id_qh'] . " - " . $row['tenqh'] . "</option>";
}
?>