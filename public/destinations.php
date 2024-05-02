<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Điểm du lịch</title>
</head>
<style>
    /* Thanh bảng chọn */
    #wrapper {
        display: flex;
        width: 100vw;
    }

    #nav-container {
        display: flex;
        width: inherit;
        background-color: #58BDFF;
    }

    #main-menu {
        width: inherit;
        display: inline-flex;
        justify-content: flex-end;
        list-style: none;
        margin: 0;
        /* bỏ đi các dấu chấm */
        /* để các phần tử sát phải */
    }

    #main-menu li {
        display: flex;
        padding-left: 50px;
        padding-right: 50px;
        border: 1px solid #000;
        height: 52px;
        justify-content: center;
        align-items: center;
    }

    /* Thanh logo và  tìm kiếm */
    a {
        text-decoration: none;
    }

    #logo_search_bar_wrapper input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }

    #logo_search_bar_wrapper .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    #logo_search_bar_wrapper .search-container button:hover {
        background: #ccc;
    }

    .search-container {
        width: 70%;
        padding-left: 10px;
        padding-top: 15px;
    }

    .search-container form {
        display: flex;
    }

    #logo_search_bar_wrapper .search-container {
        float: none;
        width: calc(100% - 400px);
    }

    #logo_search_bar_wrapper input[type=text] {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
    }

    #logo_search_bar_wrapper .search-container button {
        float: none;
        display: block;
        text-align: left;
        width: 49px;
        height: 49px;
        margin: 0;
        padding: 14px;
    }

    #logo_search_bar_wrapper a {
        float: none;
        text-align: left;
        display: inline-block;
        /* Đảm bảo phần tử cha co lại theo độ rộng của phần tử con */
        width: auto;
        /* Độ rộng tự động phù hợp với phần tử con */
        margin: 0;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
    }

    #logo_search_bar_wrapper input[type=text] {
        border: 1px solid #ccc;
        width: calc(100% - 45px);
    }

    #logo_search_bar_wrapper {
        display: flex;
        width: 100vw;
        background-color: #00F7FF;
        padding-top: 12px;
        padding-bottom: 12px;
    }

    /* thanh filter */
    .filter-bar {
        display:flex;
        text-align: center;
        align-items: center;
        background-color: #00D4FF ;
        height: 80px;
    }

    .filter-bar div{
        font-size: 20px;
        padding-right: 10px;
        padding-left: 10px
    }

    .tinh-filter{
        font-size: 20px;
        height: 40px;
        width: 200px;
    }
</style>

<body>
    <!-- THANH BẢNG CHỌN -->
    <div id="wrapper">
        <nav id="nav-container">
            <ul id="main-menu">
                <li><a href="">GIÚP ĐỠ</a></li>
                <li><a href="">ĐĂNG KÍ</a></li>
                <li><a href="">ĐĂNG NHẬP</a></li>
            </ul>
        </nav>
    </div>
    <!-- LOGO và THANH TÌM KIẾM -->
    <div id="logo_search_bar_wrapper">
        <a href="index.php" id="logo"><img src="img/logo2.jpg" alt=""></a>
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Bạn muốn tìm gì? VD: 'khach san','nha xe gia re',..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- thanh filter -->
    <div class="filter-bar">
        <div>Lọc:</div>
        <select name="" id="" class="tinh-filter">
            <option value="">Tỉnh</option>
            <option value="vl">Vĩnh Long</option>
            <option value="cm">Cà Mau</option>
            <option value="ct">Cần Thơ</option>
            <option value="bl">Bạc Liêu</option>
            <option value="kg">Kiên Giang</option>
            <option value="tv">Trà Vinh</option>
        </select>
        <!-- <select name="" id="" class="quanhuyen-filter"></select> -->
    </div>

</body>

</html>