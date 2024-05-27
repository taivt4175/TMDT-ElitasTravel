function check_input_data(data) {
    // Kiểm tra họ tên
    if (!data.hoten || data.hoten.trim() === "") {
        return "Họ tên không được bỏ trống.";
    }
    if (/\d/.test(data.hoten)) {
        return "Họ tên không được chứa số.";
    }
    if (data.hoten.length > 50) {
        return "Họ tên không được quá 50 kí tự.";
    }

    // Kiểm tra ngày sinh
    const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
    if (!dateRegex.test(data.ngaysinh)) {
        return "Ngày sinh chỉ nhận dạng yyyy-mm-dd.";
    }
    const [year, month, day] = data.ngaysinh.split('-').map(Number);
    const date = new Date(year, month - 1, day);
    if (!(date.getFullYear() === year && date.getMonth() === month - 1 && date.getDate() === day)) {
        return "Ngày sinh không hợp lệ.";
    }

    // Kiểm tra giới tính
    if (!data.gioitinh || (data.gioitinh !== "Nam" && data.gioitinh !== "Nữ")) {
        return "Giới tính không hợp lệ. Chỉ nhận giá trị 'Nam' hoặc 'Nữ'.";
    }

    // Kiểm tra số điện thoại
    const phoneRegex = /^0\d+$/;
    if (!phoneRegex.test(data.sdt)) {
        return "Số điện thoại chỉ cho phép nhập số bao gồm cả số 0.";
    }

    return "Dữ liệu hợp lệ";
}

function editTourguide(id) {
    // Tìm hàng chứa id_user
    var row = document.querySelector("tr[data-id='" + id + "']");
    if (row) {
        // Lấy tất cả các ô trong hàng đó
        var cells = row.querySelectorAll("td[contenteditable='true']");
        var data = {};
        data.id_user    = id;
        data.hoten      = cells[0].textContent;
        data.ngaysinh   = cells[1].textContent;
        data.gioitinh   = cells[2].textContent;
        data.sdt        = cells[3].textContent;
        data.email      = cells[4].textContent;
        data.cccd       = cells[5].textContent;
        data.ngayvaolam = cells[6].textContent;
        data.luongcoban = cells[7].textContent;
        data.heso       = cells[8].textContent;
        data.thuongthem = cells[9].textContent;
        data.password   = cells[10].textContent;

        console.log(data);

        alert("Đã lưu dữ liệu mới: " + JSON.stringify(data));
        check_input_data(data);
        const validationResult = check_input_data(data);
        alert(validationResult);
        if (validationResult === "Dữ liệu hợp lệ") {
            // Gửi dữ liệu lên server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../pscript/edit_tourguide.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.send(JSON.stringify(data));
            callmodtourguide(); // Load lại trang
        }
    }
}