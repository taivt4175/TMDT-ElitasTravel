<?php
require ('../connector/connect.php');
$sql = "SELECT u.id_user, u.hoten, u.gioitinh, u.ngaysinh, u.sdt, u.cccd, u.username, u.password, u.email
            ,k.sl_ecoin, k.stk_momo, k.stk_bidv, k.mastercard, k.first
            FROM user u
            INNER JOIN chitietkh k ON u.id_user = k.id_user
            WHERE u.id_user LIKE 'KH%'"; // Chỉ lấy các khách hàng

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lặp qua kết quả và thêm vào bảng
    while ($row = $result->fetch_assoc()) {
        $gender_display = $row['gioitinh'] == 0 ? 'Nữ' : 'Nam';
        $cccd_display = $row['cccd'] == 0 ? 'Chưa thiết lập' : $row['cccd'];
        $stkmomo_display = $row['stk_momo'] == 0 ? 'Chưa thiết lập' : $row['stk_momo'];
        $stkbidv_display = $row['stk_bidv'] == 0 ? 'Chưa thiết lập' : $row['stk_bidv'];
        $mastercard = $row['mastercard'] == 0 ? 'Chưa thiết lập' : $row['mastercard'];
        $cccd_display = $row['cccd'] == 0 ? 'Chưa thiết lập' : $row['cccd'];
        $first = $row['first'] == 0 ? 'Chưa' : 'Rồi';
        echo "<tr>";
        echo "<td>" . $row['id_user'] . "</td>";
        echo "<td>" . $row['hoten'] . "</td>";
        echo "<td>" . $row['ngaysinh'] . "</td>";
        echo "<td>" . $gender_display . "</td>";
        echo "<td>" . $row['sdt'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $cccd_display . "</td>";
        echo "<td>" . $row['sl_ecoin'] . "</td>";
        echo "<td>" . $stkmomo_display . "</td>";
        echo "<td>" . $stkbidv_display . "</td>";
        echo "<td>" . $stkmomo_display . "</td>";
        echo "<td>" . $mastercard . "</td>";
        echo "<td>" . $first . "</td>";
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