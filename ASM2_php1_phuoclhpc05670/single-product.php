<?php

$id = $_GET['id'];
include "./models/database.php";

$query = "SELECT id as product_id, name, short_description, price, sale_price, thumbnail FROM products WHERE id = $id";
$result = $connection->query($query);

if ($result->num_rows === 0) {
    header("Location: index.php");
} else {
}
$product = $result->fetch_assoc();

include "client/header.php";
?>

<section id="product-detail" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="admin/uploads/<?= $product['thumbnail'] ?? '' ?>" alt="Product Image" class="img-fluid" width="250px" height="180px">
            </div>
            <div class="col-md-6 product-details">
                <h2><?= $product['name'] ?? '' ?></h2>
                <?php
                // tinh tien sale_price
                $price = $product['price'] ?? '';
                $sale_price = $product['sale_price'] ?? '';
                ?>
                <?php if ($sale_price != 0) : ?>
                    <p><strike><?= number_format($price) ?? '' ?></strike> đ</p>
                    <p><?= number_format($sale_price) ?? '' ?> đồ</p>
                <?php else : ?>
                    <p><?= number_format($price) ?? '' ?> đ</p>
                <?php endif; ?>

                <div class="product-description">
                    <h3>Mô Tả</h3>
                    <p><?= $product['short_description'] ?? '' ?></p>
                </div>
                <div class="product-details">
                    <div class="quantity-control">
                        <span class="text-black text-_14 font-semibold">Số lượng</span>
                        <div class="input-group input-group-sm">
                            <button class="quantity-button minus btn btn-outline-secondary">−</button>
                            <input type="text" class="quantity form-control form-control-sm" value="1">
                            <button class="quantity-button plus btn btn-outline-secondary">+</button>
                        </div>
                    </div>

                    <div class="mt-3"> <!-- Thêm một khoảng cách dưới để tách nút gọi món -->
                        <button type="button" class="btn btn-primary">Đặt món</button>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs mt-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Bình luận</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li> -->
            </ul>
        </div>
</section>

<?php
include "client/footer.php";
?>