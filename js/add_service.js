document.getElementById('description').addEventListener('input', function () {
    var description = document.getElementById('description');
    var value = description.value;
    var newValue = value.replace(/\n/g, '<br>');
    description.value = newValue;
});

document.getElementById('detail').addEventListener('input', function () {
    var detail = document.getElementById('detail');
    var value = detail.value;
    var newValue = value.replace(/\n/g, '<br>');
    detail.value = newValue;
});

function addservice() {
    tinymce.triggerSave(); // Thêm dòng này để lưu nội dung TinyMCE
    var name = document.getElementById('name').value;
    var price = document.getElementById('price').value;
    var unit = document.getElementById('unit').value;
    var description = document.getElementById('description').value;
    if (price < 0 || price == '') {
        alert('Giá không hợp lệ');
        event.preventDefault();
        return;
    } else {
        if (name == '' || unit == '' || description == '') {
            alert('Vui lòng nhập đầy đủ thông tin');
            event.preventDefault();
            return;
        }
        else {
            // Call the add_service_event.php using AJAX
            var formData = new FormData(document.querySelector('.add-service-form'));
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../pscript/add_service_event.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    event.preventDefault();
                    alert(xhr.responseText);
                }
            };
            xhr.send(formData);
        }
    }
}