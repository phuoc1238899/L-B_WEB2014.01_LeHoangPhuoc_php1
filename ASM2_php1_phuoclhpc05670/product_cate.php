<?php
include "./models/database.php";

if(isset($_GET['category_id'])){
    $id = $_GET['category_id'];
    $query_product_bycate = "SELECT id as product_id, name, content, thumbnail, price
    FROM products WHERE category_id = $id";
}else if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $query_product_bycate = "SELECT id as product_id, name, content, thumbnail, price
    FROM products WHERE name LIKE '%$keyword%'";
}else{
    header("Location: index.php");
}

$result_product_bycate = $connection->query($query_product_bycate);

if (!$result_product_bycate || $result_product_bycate->num_rows === 0) {
    header("Location: index.php");
    exit;
}

include "client/header.php";
?>

<section id="new-arrival" class="product-store py-5">
    <div class="container">
        <h2 class="display-5 fw-light text-uppercase text-center mb-5">Danh muc san pham</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php while ($row = $result_product_bycate->fetch_assoc()) { ?>
                <div class="col">
                    <div class="card border-0 shadow">
                        <div class="position-relative">
                            <a href="single-product.php?id=<?php echo $row['product_id'] ?? '' ?>">
                                <img src="/admin/uploads/<?php echo $row['thumbnail'] ?? '' ?>" alt="" class="card-img-top" width="300px" height="220px">
                                <div class="badge bg-dark position-absolute top-0 start-0 m-3">New</div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['name'] ?? '' ?></h5>
                            <p class="card-text text-center">Giá: <?php echo number_format($row['price']) ?? '' ?> đồng</p>
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