<!DOCTYPE html>
<html>

<head>
    <title>Quản lý danh mục sản phẩm</title>
</head>

<body>
    <h1>Quản lý danh mục sản phẩm</h1>

    <h2>Thêm danh mục</h2>
    <form method="POST" action="process.php">
        <input type="text" name="category_name" placeholder="Tên danh mục" required>
        <input type="submit" name="add_category" value="Thêm">
    </form>

    <h2>Sửa danh mục</h2>
    <form method="POST" action="process.php">
        <input type="text" name="category_id" placeholder="ID danh mục cần sửa" required>
        <input type="text" name="new_category_name" placeholder="Tên danh mục mới" required>
        <input type="submit" name="edit_category" value="Sửa">
    </form>

    <h2>Xóa danh mục</h2>
    <form method="POST" action="process.php">
        <input type="text" name="category_id" placeholder="ID danh mục cần xóa" required>
        <input type="submit" name="delete_category" value="Xóa">
    </form>
</body>

</html>
process.php:

php
Copier
<?php
// // Xử lý thêm danh mục
// if (isset($_POST['add_category'])) {
//     $category_name = $_POST['category_name'];

//     // Thực hiện xử lý lưu trữ danh mục vào cơ sở dữ liệu
//     // Code xử lý lưu trữ vào cơ sở dữ liệu ở đây

//     echo "Danh mục $category_name đã được thêm thành công.";
// }

// // Xử lý sửa danh mục
// if (isset($_POST['edit_category'])) {
//     $category_id = $_POST['category_id'];
//     $new_category_name = $_POST['new_category_name'];

//     // Thực hiện xử lý cập nhật tên danh mục trong cơ sở dữ liệu
//     // Code xử lý cập nhật trong cơ sở dữ liệu ở đây

//     echo "Danh mục có ID $category_id đã được cập nhật thành công.";
// }

// // Xử lý xóa danh mục
// if (isset($_POST['delete_category'])) {
//     $category_id = $_POST['category_id'];

//     // Thực hiện xử lý xóa danh mục trong cơ sở dữ liệu
//     // Code xử lý xóa trong cơ sở dữ liệu ở đây

//     echo "Danh mục có ID $category_id đã được xóa thành công.";
// }
?>