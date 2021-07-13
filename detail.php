<!DOCTYPE html>

<html>

<head>
    <title>Bán giày</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        @font-face {
            font-family: "FS Core Magic Rough";
            src: url("./fonts/FSCoreMagicRough.woff2") format("woff2"), url("./fonts/FSCoreMagicRough.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-image: url("https://cutewallpaper.org/21/pastel-pink-desktop-wallpaper/55-Pink-Pastel-Wallpapers-Download-at-WallpaperBro.png");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .container {
            margin-top: 100px;
            background: #fff;
        }

        h2 {
            text-transform: uppercase;
            font-family: "FS Core Magic Rough";
            text-align: center;
            font-size: 30px;
        }

        .product-img {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
            border: none;
        }
        .product-img img{
            border: none !important;
            width: 100%;

        }
        h1{
            text-transform: uppercase;
        }

        .product-price{
            color: deeppink;
        }

        button{
            margin-top: 10px;
            height: 40px;
            text-transform: uppercase;
            font-size: 14px;
            transition: 0.5s ease;
            background-color: deeppink;
            border: none;
            border-radius: 2px;
            font-weight: 600;
        }

        button:hover{
            cursor: pointer;
            transform: translateY(-3px);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
            transition: 0.5s ease;
        }


    </style>
</head>

<body>
    <?php
    include './connect_db.php';
    $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = " . $_GET['id']);
    $product = mysqli_fetch_assoc($result);
    $imgLibrary = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = " . $_GET['id']);
    $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
    ?>
    <div class="wrapper">
        <div class="container">
            <h2>Chi tiết sản phẩm</h2>
            <div id="product-detail">
                <div class="product-img" id="product-img">
                    <img src="<?= $product['image'] ?>" />
                </div>
                <div id="product-info">
                    <h1><?= $product['name'] ?></h1>
                    <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br />
                    <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                        <input type="text" value="1" name="quantity[<?= $product['id'] ?>]" size="2" /><br />
                        <!-- <input type="submit" value="Mua sản phẩm" /> -->
                        <button type="submit">Mua sản phẩm</button>
                    </form>
                    <?php if (!empty($product['images'])) { ?>
                        <div id="gallery">
                            <ul>
                                <?php foreach ($product['images'] as $img) { ?>
                                    <li><img src="<?= $img['path'] ?>" /></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear-both"></div>
                <?= $product['content'] ?>
            </div>
        </div>
    </div>
</body>

</html>