<?php

include "../models/database.php";

// Kiểm tra
if (isset($_GET['id']) && $_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $content = $_POST['content'];
  $short_description = $_POST['short_description'];
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  $category_id = $_POST["category"];
  $thumbnail = $_FILES['thumbnail']['name'];

  move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "uploads/" . $thumbnail);

  updateProduct($connection, $name, $content, $short_description, $price, $sale_price, $category_id, $thumbnail, $id);
  echo "Cập nhật sản phẩm thành công!";
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = getProductById($connection, $id);
}

function getProductById($connection, $id)
{
  $query = "SELECT * FROM products WHERE `id` = $id";
  $result = $connection->query($query);
  if ($result->num_rows > 0) {
      return $result->fetch_assoc();
  } else {
      return false;
  }
}
function updateProduct($connection, $name, $content, $short_description, $price, $sale_price,  $category_id, $thumbnail, $id)
{
  $query = "UPDATE products SET 
      `name`='$name',
      `content`='$content',
      `short_description`='$short_description',
      `price`='$price',
      `sale_price`='$sale_price',
      `category_id` =  '$category_id',
      `thumbnail` = '$thumbnail'
      WHERE `id` =$id
  ";
  $connection->query($query);
}
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Chỉnh sửa sản phẩm</h3>
  </div>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">
      <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $data['name'] ?? '' ?>" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Nội dung</label>
        <textarea name="content" class="form-control" id="content"><?= $data['content'] ?? '' ?></textarea>
      </div>
      <div class="mb-3">
        <label for="short_description" class="form-label">Mô tả ngắn</label>
        <textarea name="short_description" class="form-control" id="short_description"><?= $data['short_description'] ?? '' ?></textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Giá sản phẩm</label>
        <input type="number" class="form-control" name="price" id="price" value="<?= $data['price'] ?? '' ?>" placeholder="Nhập giá sản phẩm">
      </div>
      <div class="mb-3">
        <label for="sale_price" class="form-label">Giá khuyến mãi</label>
        <input type="number" class="form-control" name="sale_price" id="sale_price" value="<?= $data['sale_price'] ?? '' ?>" placeholder="Nhập giá khuyến mãi">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Danh mục sản phẩm</label>
        <select name="category" class="form-control" id="category">
          <?php
          $query_categories = "SELECT * FROM categories";
          $result_categories = $connection->query($query_categories);
          if ($result_categories->num_rows > 0) {
            while ($row = $result_categories->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
        <img src="<?= $data['thumbnail'] ?? '' ?>" alt="Product Thumbnail" style="width: 100px; height: 100px;">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
  </form>
</div>
