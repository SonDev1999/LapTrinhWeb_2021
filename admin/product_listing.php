<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['product_filter'] = $_POST;
        header('Location: product_listing.php');exit;
    }
    if(!empty($_SESSION['product_filter'])){
        $where = "";
        foreach ($_SESSION['product_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'name':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION['product_filter']);
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `product` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $products = mysqli_query($con, "SELECT * FROM `product` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="product-items">
            <div class="buttons">
                <a href="./product_editing.php">Thêm sản phẩm</a>
            </div>
            <div class="product-search">
                <form id="product-search-form" action="product_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm sản phẩm:</legend>
                        
                        Tên sản phẩm: <input type="text" name="name" value="<?=!empty($name)?$name:""?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
            <div class="total-products">
                <span>Có tất cả <strong><?=$totalRecords?></strong> sản phẩm trên <strong><?=$totalPages?></strong> trang</span>
            </div>
            <ul>
                <li class="product-item-heading">
                    <div class="product-prop product-img">Ảnh</div>
                    <div class="product-prop product-name">Tên sản phẩm</div>
                    <div class="product-prop product-button">
                        Xóa
                    </div>
                    <div class="product-prop product-button">
                        Sửa
                    </div>
                    <div class="product-prop product-button">
                        Copy
                    </div>
                    <div class="product-prop product-time">Ngày tạo</div>
                    <div class="product-prop product-time">Ngày cập nhật</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="product-prop product-img"><img src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                        <div class="product-prop product-name"><?= $row['name'] ?></div>
                        <div class="product-prop product-button">
                            <a href="./product_delete.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./product_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./product_editing.php?id=<?= $row['id'] ?>&task=copy">Copy</a>
                        </div>
                        <div class="product-prop product-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="product-prop product-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>