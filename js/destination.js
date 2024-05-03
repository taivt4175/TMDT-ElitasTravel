var huyenByTinh = {
    vl: ["TP. Vĩnh Long", "Long Hồ","Vũng Liêm", "Tam Bình","Trà Ôn", "Mang Thít","Bình Minh","Bình Tân"],
    cm: ["Thới Bình", "U Minh", "Trần Văn Thời", "Phú Tân", "Cái Nước", "Đầm Dơi", "Năm Căn", "Ngọc Hiển"],
    ct: ["Ninh Kiều", "Bình Thủy", "Cái Răng", "Ô Môn", "Thốt Nốt","Vĩnh Thạnh", "Cờ Đỏ", "Thới Lai", "Phong Điền"],
    bl: ["TP. Bạc Liêu", "Tx. Giá Rai","Hồng Dân", "Phước Long", "Vĩnh Lợi", "Đông hải", "Hòa Bình"],
    kg: ["Thành phố Rạch Giá", "Tx. Hà Tiên","Kiên Lương", "Hòn Đất", "Giồng Riềng", "Gò Quao", "Châu Thành", "Tân Hiệp", "An Biên", "An Minh", "Vĩnh Thuận", "U Minh Thượng", "Kiên Hải", "Phú Quốc"],
    tv: ["Càng Long", "Cầu Kè", "Cầu Ngang", "Châu Thành", "Duyên Hải", "Tiểu Cần", "Trà Cú"]
};

function updateHuyen() {
    var tinhSelect = document.getElementById('tinh-filter');
    var huyenSelect = document.getElementById('quanhuyen-filter');
    var selectedTinh = tinhSelect.value;

    // Xóa các huyện hiện tại
    while (huyenSelect.options.length > 0) {
        huyenSelect.remove(0);
    }

    // Thêm một tùy chọn mặc định
    var defaultOption = document.createElement('option');
    defaultOption.textContent = "Quận/Huyện";
    defaultOption.value = "";
    huyenSelect.appendChild(defaultOption);

    // Thêm các huyện mới dựa trên tỉnh đã chọn
    if (selectedTinh && huyenByTinh[selectedTinh]) {
        var huyens = huyenByTinh[selectedTinh];
        huyens.forEach(function(huyen) {
            var option = document.createElement('option');
            option.textContent = huyen;
            option.value = huyen.toLowerCase().replace(/ /g, '_');
            huyenSelect.appendChild(option);
        });
    }
}