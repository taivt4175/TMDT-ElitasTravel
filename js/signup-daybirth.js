function updateDays() {
    // Lấy năm và tháng được chọn
    var year = document.getElementById('year').value;
    var month = document.getElementById('month').value;
    var daySelect = document.getElementById('day');

    // Xác định số ngày trong tháng
    var daysInMonth = new Date(year, month, 0).getDate();

    // Xóa các lựa chọn ngày hiện có
    while (daySelect.firstChild) {
        daySelect.removeChild(daySelect.firstChild);
    }

    // Thêm các lựa chọn ngày theo tháng và năm
    for (var i = 1; i <= daysInMonth; i++) {
        var option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        daySelect.appendChild(option);
    }
}

// Thêm các lựa chọn tháng
for (var i = 1; i <= 12; i++) {
    var option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    document.getElementById('month').appendChild(option);
}

// Thêm các lựa chọn năm từ 1950 đến năm hiện tại
var currentYear = new Date().getFullYear();
for (var i = 1950; i <= currentYear; i++) {
    var option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    document.getElementById('year').appendChild(option);
}

// Gọi updateDays một lần để khởi tạo các lựa chọn ngày
updateDays();

// Đặt giá trị mặc định cho năm và tháng
document.getElementById('year').value = currentYear;
document.getElementById('month').value = new Date().getMonth() + 1; // Tháng trong JS đếm từ 0
updateDays(); // Cập nhật lại ngày sau khi đặt tháng