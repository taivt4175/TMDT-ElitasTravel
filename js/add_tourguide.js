function add_tourguide(){
    var xhr = new XMLHttpRequest();  // Tạo đối tượng XMLHttpRequest
    xhr.open('GET', 'add_tourguide.php', true);  // Mở một yêu cầu GET đến 'add_tourguide.php'
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('function-view').innerHTML = xhr.responseText;  // Đặt nội dung phản hồi vào div
        //     var script1 = document.createElement('script'); //Gọi JS xử lí ngày tháng năm tạo user
        //     script1.src = '../js/signup2.js';
        //     document.head.appendChild(script1);
        //     var script2 = document.createElement('script'); //Gọi JS xử lí tạo user
        //     script2.src = '../js/signup3.js';
        //     document.head.appendChild(script2);
        }
    };
    xhr.send();  // Gửi yêu cầu
}