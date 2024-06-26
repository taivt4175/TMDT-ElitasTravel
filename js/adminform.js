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
            var script1 = document.createElement('script');
            script1.src = '../js/edit_customer.js';
            document.head.appendChild(script1);
        }
    };
    xhr.send();  // Gửi yêu cầu
}
// Gọi add_tourguide.php để hiển thị form thêm hdv
function calladdtourguide() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'add_tourguide.php', true);  // Mở một yêu cầu GET đến 'mod_customer.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script1 = document.createElement('script');
            script1.src = '../js/add_tourguide.js';
            document.head.appendChild(script1);
            var script2 = document.createElement('script'); //Gọi JS xử lí tạo user
            script2.src = '../js/signup2.js';
            document.head.appendChild(script2);
        }
    };
    xhr.send();  // Gửi yêu cầu
}
// Gọi mod_tourguide.php để hiển thị form danh sách hdv
function callmodtourguide() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'mod_tourguide.php', true);  // Mở một yêu cầu GET đến 'mod_customer.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script = document.createElement('script');
            script.src = '../js/delete_user.js';
            document.head.appendChild(script);
            var script1 = document.createElement('script');
            script1.src = '../js/edit_tourguide.js';
            document.head.appendChild(script1);
        }
    };
    xhr.send();  // Gửi yêu cầu
}

// Gọi add_tour.php để hiển thị form thêm tour
function calladdtour() {
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'add_tour.php', true);  // Mở một yêu cầu GET đến 'add_tour.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
            var script1 = document.createElement('script');
            script1.src = '../js/addtour_check.js';
            document.head.appendChild(script1);
        }
    };
    xhr.send();  // Gửi yêu cầu
}