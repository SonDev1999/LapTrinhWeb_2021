<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Bán giày</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Navbar with Logo Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .bs-example {
            margin: 0px 20px;
        }
    </style>
    <style>
        body {
            font-family: arial;
        }

        @font-face {
            font-family: "FS Core Magic Rough";
            src: url("./fonts/FSCoreMagicRough.woff2") format("woff2"), url("./fonts/FSCoreMagicRough.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        .container {
            width: 1200px;
            margin: 0 auto;
            padding: 10px 0px;
        }

        .wrapper {
            background-image: url("https://cutewallpaper.org/21/pastel-pink-desktop-wallpaper/55-Pink-Pastel-Wallpapers-Download-at-WallpaperBro.png");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        h1 {
            text-align: center;
            font-family: "FS Core Magic Rough";
            filter: drop-shadow(4px 2px 2px deeppink);
        }

        .product-items {
            border: 1px solid #ccc;
            padding: 15px;
            background: #fff;
            filter: drop-shadow(5px 3px 10px rgba(0, 0, 0, 0.2));
            border-radius: 5px;
        }

        .product-item {
            float: left;
            width: 23%;
            margin: 1%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            line-height: 26px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
            background: #fff;
            transition: 0.5s ease;
            
        }

        .product-item label {
            font-weight: bold;
        }

        .product-item p {
            margin: 0;
            line-height: 26px;
            max-height: 52px;
            overflow: hidden;
        }

        .product-price {
            color: deeppink;
            font-weight: bold;
            margin-left: 10px;
        }

        .product-img {
            width: 220px;
            padding: 5px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .product-item:hover {
            cursor: pointer;
        }

        .product-item img {
            width: 100%;
            transition: 0.7s;
            position: relative;
        }

        .product-item img:hover {
            transition: 0.7s;
            transform: scale(1.3);
        }

        .product-item ul {
            margin: 0;
            padding: 0;
            border-right: 1px solid #ccc;
        }

        .product-item ul li {
            float: left;
            width: 33.3333%;
            list-style: none;
            text-align: center;
            border: 1px solid #ccc;
            border-right: 0;
            box-sizing: border-box;
        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        .buy-button {
            text-align: right;
            margin-top: 10px;
        }

        .buy-button a {
            background: #444;
            padding: 5px;
            color: #fff;
        }

        #pagination {
            text-align: right;
            margin-top: 15px;
        }

        .page-item {
            border: 1px solid #ccc;
            padding: 5px 9px;
            color: #000;
        }

        current-page {
            background: #000;
            color: #FFF;
        }

        .footer{
            width: 100%;
            text-align: center;
        }

        .footer p{
            margin: 5px 0px;
        }

        .name{
            text-transform: uppercase;
        }

        .content{
            font-style: italic;
        }

        .button-box button{
            text-transform: uppercase;
            font-size: 14px;
            transition: 0.5s ease;
            background-color: deeppink;
            border: none;
            border-radius: 2px;
            font-weight: 600;
        }

        .button-box button:hover{
            cursor: pointer;
            transform: translateY(-3px);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
            transition: 0.5s ease;
        }

    </style>
</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="#" class="navbar-brand">
                <img height="48" src="./images/HONE.png" />
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav header">
                    <a href="#" class="nav-item nav-link active">Trang chủ</a>
                    <a href="#" class="nav-item nav-link">Thông tin</a>
                    <a href="#" class="nav-item nav-link">Liên hệ</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Phản hồi</a>
                </div>
                <div class="navbar-nav ml-auto button-box">
                    <button type="button"><a href="#" class="nav-item nav-link">Đăng nhập</a></button>
                </div>
            </div>
        </nav>
    </div>
    <?php
    include './connect_db.php';
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <div class="wrapper">
        <div class="container">
            <h1>Danh sách sản phẩm</h1>
            <div class="product-items">
                <?php
                while ($row = mysqli_fetch_array($products)) {
                ?>
                    <div class="product-item">
                        <div class="product-img">
                            <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                        </div>
                        <strong class="name"><?= $row['name'] ?></strong><br />
                        <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br />
                        <p class="content"><?= $row['content'] ?></p>
                    </div>
                <?php } ?>
                <div class="clear-both"></div>
                <?php
                include './pagination.php';
                ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Lập trình web 2021 @STU </p>
    </div>
</body>

</html>