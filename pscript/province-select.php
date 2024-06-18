<?php
require("../connector/connect.php");
$sql = "SELECT * FROM tinh";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id_tinh'] . "'>" . $row['tentinh'] . "</option>";
}
$conn->close();
?>