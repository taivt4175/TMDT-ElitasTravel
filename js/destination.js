function updateHuyen() {
    var tinhId = document.getElementById('tinh-filter').value;
    var huyenSelect = document.getElementById('quanhuyen-filter');
    alert(tinhId);
    huyenSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>'; // Xóa huyện cũ

    // if (tinhId) {
    //     // Gửi yêu cầu AJAX đến server để lấy danh sách huyện
    //     fetch('../public/destinations.php?tinhId=' + tinhId)
    //     .then(response => response.json())
    //     .then(data => {
    //         data.forEach(function(huyen) {
    //             var option = new Option(huyen.tenqh, huyen.id_qh);
    //             huyenSelect.add(option);
    //         });
    //     })
    //     .catch(error => console.error('Error:', error));
    // }
}