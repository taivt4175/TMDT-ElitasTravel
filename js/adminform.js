// Gọi add_customer.php để hiển thị form thêm khách hàng
function calladdCustomer() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'add_customer.php', true);  // Mở một yêu cầu GET đến 'add_customer.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script1 = document.createElement('script'); //Gọi JS xử lí ngày tháng năm tạo user
            script1.src = '../js/signup2.js';
            document.head.appendChild(script1);
            var script2 = document.createElement('script'); //Gọi JS xử lí tạo user
            script2.src = '../js/signup3.js';
            document.head.appendChild(script2);
        }
    };
    xhr.send();  // Gửi yêu cầu
}

// Gọi mod_customer.php để hiển thị form danh sách khách hàng
function callmodCustomer() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'mod_customer.php', true);  // Mở một yêu cầu GET đến 'mod_customer.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script = document.createElement('script');
            script.src = '../js/delete_user.js';
            document.head.appendChild(script);
        }
    };
    xhr.send();  // Gửi yêu cầu
}

function calladdtourguide() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'add_tourguide.php', true);  // Mở một yêu cầu GET đến 'mod_customer.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script = document.createElement('script');
            script.src = '../js/signup2.js';
            document.head.appendChild(script);
        }
    };
    xhr.send();  // Gửi yêu cầu
}