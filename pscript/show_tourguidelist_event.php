<?php
require ('../connector/connect.php');
$sql = "SELECT u.id_user, u.hoten, u.gioitinh, u.ngaysinh, u.sdt, u.cccd, u.username, u.password, u.email
            ,k.ngayvaolam, k.luongcoban, k.heso, k.thuongthem
            FROM user u
            INNER JOIN chitiethdv k ON u.id_user = k.id_user
            WHERE u.id_user LIKE 'TG%'"; // Chỉ lấy các khách hàng

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lặp qua kết quả và thêm vào bảng
    while ($row = $result->fetch_assoc()) {
        $gender_display = $row['gioitinh'] == 0 ? 'Nữ' : 'Nam';
        $cccd_display = $row['cccd'] == 0 ? 'Chưa thiết lập' : $row['cccd'];
        echo "<tr>";
        echo "<td>" . $row['id_user'] . "</td>";
        echo "<td>" . $row['hoten'] . "</td>";
        echo "<td>" . $row['ngaysinh'] . "</td>";
        echo "<td>" . $gender_display . "</td>";
        echo "<td>" . $row['sdt'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $cccd_display . "</td>";
        echo "<td>" . $row['ngayvaolam'] . "</td>";
        echo "<td>" . $row['luongcoban'] . "</td>";
        echo "<td>" . $row['heso'] . "</td>";
        echo "<td>" . $row['thuongthem'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>
                <button onclick='editCustomer(\"" . $row['id_user'] . "\")'>Edit</button>
                <button onclick='deleteCustomer(\"" . $row['id_user'] . "\")'>Delete</button> 
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 kết quả</td></tr>";
}
?>