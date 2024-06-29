function detailService(madichvu, madoanhnghiep) {
    window.location.href = "../public/chitietdichvu.php?madichvu=" + madichvu + "&madoanhnghiep=" + madoanhnghiep;
    }

function editService(madichvu, madoanhnghiep) {
    window.location.href = "mod_service_form.php?madichvu=" + madichvu + "&madoanhnghiep=" + madoanhnghiep;
}

function confirmDelete(madichvu,madoanhnghiep){
    if(confirm('Bạn chắc chắn muốn xóa dịch vụ này không?')){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../pscript/delete_service.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send('madichvu=' + madichvu + '&madoanhnghiep=' + madoanhnghiep);
    }
}