function loadFormAndInitializeScript() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'add_customer.php', true);  // Yêu cầu tải 'add_customer.php'

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Khi tải thành công, đặt nội dung tải được vào 'function-view'
            document.getElementById('function-view').innerHTML = xhr.responseText;

            // Sau khi nội dung được tải, khởi tạo script cần thiết
            initializeFormScript();
        } else {
            // Xử lý lỗi tải trang hoặc trả về lỗi từ server
            console.error('Failed to load the form:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        // Xử lý lỗi kết nối
        console.error('Network error occurred');
    };

    xhr.send();  // Gửi yêu cầu
}

function initializeFormScript() {
    // Đảm bảo script 'signup_daybirth.js' chỉ thực thi sau khi form được tải
    var script = document.createElement('script');
    script.src = '../js/signup-daybirth.js';  // Đảm bảo đường dẫn đến script đúng
    script.onload = function () {
        // Các hàm trong signup_daybirth.js sẽ được gọi ở đây nếu cần
        console.log('signup-daybirth.js has been loaded and initialized');
    };
    document.head.appendChild(script);
}

document.getElementById('add_customer').addEventListener('click', function (event) {
    event.preventDefault();  // Ngăn chặn trình duyệt theo liên kết
    loadFormAndInitializeScript();  // Gọi hàm để tải form và khởi tạo script
});
