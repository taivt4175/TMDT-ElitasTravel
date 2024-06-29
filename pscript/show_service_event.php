<?php
session_start();
if (isset($_SESSION['user_info'])) {
    $userInfo = $_SESSION['user_info'];
    // Làm gì đó với $userInfo
    $id_user = $userInfo['id_user'];
    $hoten = $userInfo['hoten'];
}
require ('../connector/connect.php');

// Kiểm tra hai ký tự đầu của id_user
$id_prefix = substr($id_user, 0, 2);

if ($id_prefix === 'AD') {
    // Trường hợp id_user bắt đầu với 'AD'
    $sql1 = "SELECT * FROM dichvu";
} else {
    // Trường hợp khác
    $sql1 = "SELECT * FROM dichvu s
             INNER JOIN user u ON s.id_user = u.id_user
             WHERE u.id_user = '$id_user'";
}
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        echo "<tr data-id='" . $row1['madichvu'] . '_' . $row1['id_user'] . "'>";
        echo "<td>" . $row1['madichvu'] . "</td>";
        echo "<td>" . $row1['tendichvu'] . "</td>";
        echo "<td>" . $row1['id_user'] . "</td>";
        echo "<td>" . $hoten . "</td>";
        echo "<td>" . $row1['gianguoilon'] . "</td>";
        echo "<td>" . $row1['giatreem'] . "</td>";
        echo "<td>
                <button onclick='detailService(\"" . $row1['madichvu'] . '","' . $row1['id_user'] . "\")'>Detail</button>
                <button onclick='editService(\"" . $row1['madichvu'] . '","' . $row1['id_user'] . "\")'>Edit</button>
                <button onclick='confirmDelete(\"" . $row1['madichvu'] . '","' . $row1['id_user'] . "\")'>Delete</button>
              </td>";
        echo "</tr>";
    }
}
?>