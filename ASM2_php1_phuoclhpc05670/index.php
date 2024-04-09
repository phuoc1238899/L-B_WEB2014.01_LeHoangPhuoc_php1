<?php

include "./models/database.php";
$query_home = "SELECT id as product_id, name, price, sale_price, thumbnail FROM products";
$result_home = $connection->query($query_home);

if ($result_home->num_rows === 0) {
    header("Location: index.php");
} else {
    // echo "Kết nối dữ liệu thành công.";
}
include "client/header.php";
?>

<section id="new-arrival" class="product-store py-5">
    <div class="container">
        <h2 class="display-5 fw-light text-uppercase text-center mb-5">New Arrivals</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php while ($row_home = $result_home->fetch_assoc()) { ?>
                <div class="col">
                    <div class="card border-0 shadow">
                        <div class="position-relative">
                            <a href="single-product.php?id=<?php echo $row_home['product_id'] ?? '' ?>">
                                <img src="./admin/uploads/<?php echo $row_home['thumbnail'] ?? '' ?>" alt="" class="card-img-top" width="300px" height="220px">
                                <div class="badge bg-dark position-absolute top-0 start-0 m-3">New</div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row_home['name'] ?? '' ?></h5>
                            <p class="card-text text-center">Giá: <?php echo number_format($row_home['price']) ?? '' ?> đ</p>
                            <div class="d-flex justify-content-center mt-2">
                            </div>
                            <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white mt-2" href="#"><i class="fas fa-cart-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<div class="text-center mt-5 mb-5 pt-4">
    <a href="#" class="btn btn-dark rounded-3">View All Products</a>
</div>

<?php
include "client/footer.php";
?>