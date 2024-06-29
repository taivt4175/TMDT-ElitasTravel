<?php
require ('../connector/connect.php');
$sql = "SELECT u.id_user, u.hoten, u.gioitinh, u.ngaysinh, u.sdt, u.cccd, u.password, u.email, u.wrongpass, u.account_status
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
        echo "<tr data-id='" . $row['id_user'] . "'>";
        echo "<td>" . $row['id_user'] . "</td>";
        echo "<td contenteditable='true'>" . $row['hoten'] . "</td>";
        echo "<td contenteditable='true'>" . $row['ngaysinh'] . "</td>";
        echo "<td contenteditable='true'>" . $gender_display . "</td>";
        echo "<td contenteditable='true'>" . $row['sdt'] . "</td>";
        echo "<td contenteditable='true'>" . $row['email'] . "</td>";
        echo "<td contenteditable='true'>" . $cccd_display . "</td>";
        echo "<td contenteditable='true'>" . $row['sl_ecoin'] . "</td>";
        echo "<td contenteditable='true'>" . $stkmomo_display . "</td>";
        echo "<td contenteditable='true'>" . $stkbidv_display . "</td>";
        echo "<td contenteditable='true'>" . $mastercard . "</td>";
        echo "<td contenteditable='true'>" . $row['password'] . "</td>";
        echo "<td contenteditable='true'>" . $row['account_status'] . "</td>";
        echo "<td contenteditable='true'>" . $row['wrongpass'] . "</td>";
        echo "<td>
                <button onclick='editCustomer(\"" . $row['id_user'] . "\")'>Edit</button>
                <button onclick='confirmDelete(\"" . $row['id_user'] . "\")'>Delete</button> 
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 kết quả</td></tr>";
}
?>