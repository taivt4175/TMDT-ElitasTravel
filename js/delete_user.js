function confirmDelete(id) {
    // Hiển thị hộp thoại xác nhận
    if (confirm('Bạn có chắc chắn muốn xóa user này không?')) {
        deleteCustomer(id);  // Gọi hàm xóa nếu người dùng xác nhận
    }
    // Nếu người dùng nhấn "Không", không làm gì cả
}

function deleteCustomer(id) {
    // Gửi yêu cầu xóa tới server
    fetch('../pscript/delete_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + id  // Gửi ID khách hàng cần xóa
    })
    .then(response => response.text())
    .then(data => {
        alert('Xóa thành công!');
        callmodCustomer();  // Tải lại trang để cập nhật danh sách
    })
    .catch(error => {
        console.error('Error:', error);
        callmodCustomer();  // Tải lại trang để cập nhật danh sách
    });
}