// Hiển thị danh sách quận huyện tương ứng với tỉnh thành đã chọn
function show_district_list(id_tinh) {
    // Gửi yêu cầu lấy danh sách quận huyện tương ứng với tỉnh thành đã chọn
    fetch('../pscript/district-select.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id_tinh=' + id_tinh  // Gửi ID tỉnh thành đã chọn
    })
        .then(response => response.text())
        .then(data => {
            // Hiển thị danh sách quận huyện tương ứng
            document.getElementById('district').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function callshowdistrict() {
    id_tinh = document.getElementById("province").value;
    show_district_list(id_tinh);
}

document.getElementById('description').addEventListener('keydown', function (event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Ngăn không cho sự kiện mặc định khi nhấn Enter
        // Thêm thẻ <p></p> và xuống dòng mới
        let cursorPosition = this.selectionStart; // Lấy vị trí con trỏ hiện tại
        let textBeforeCursor = this.value.substring(0, cursorPosition);
        let textAfterCursor = this.value.substring(cursorPosition);
        this.value = textBeforeCursor + "<p></p>\n" + textAfterCursor; // Thêm <p></p> và xuống hàng mới
        this.selectionStart = cursorPosition + 7; // Đặt lại vị trí con trỏ
        this.selectionEnd = cursorPosition + 7; // Đặt lại vị trí con trỏ
    }
});

function addtour() {
    // Kiểm tra nếu bất kỳ trường nhập nào bị trống
    var gia = document.getElementById('price').value;
    var tourname = document.getElementById('tourname').value;
    var district = document.getElementById('district').value;
    if (gia == "" || tourname == "" || district == "") {
        alert("Vui lòng điền đầy đủ thông tin!");
        calladdtour();
    } else {
        // Tiếp tục xử lý khi tất cả các trường nhập đều được điền
        var formData = new FormData(document.querySelector('.addtour-form'));
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../pscript/add_tour.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send(formData);
    }
}