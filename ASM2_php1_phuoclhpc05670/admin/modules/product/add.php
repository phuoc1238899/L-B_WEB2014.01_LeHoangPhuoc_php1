<?php
// Import database connection
include "../models/database.php";

// Kiểm 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (
    isset($_POST["name"], $_POST["content"], $_POST["short_description"], $_POST["price"], $_POST["sale_price"], $_FILES["thumbnail"]["name"], $_POST["category"])
  ) {
    $name = $_POST["name"];
    $content = $_POST["content"];
    $short_description = $_POST["short_description"];
    $price = $_POST["price"];
    $sale_price = $_POST["sale_price"];
    $thumbnail = $_FILES["thumbnail"]["name"];
    $category_id = $_POST["category"];

    // Di chuyển file ảnh đã upload vào thư mục "uploads"
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "uploads/" . $thumbnail);

    $query_insert_product = "INSERT INTO products (name, content, short_description, price, sale_price, thumbnail, category_id) VALUES ('$name', '$content', '$short_description', '$price', '$sale_price', '$thumbnail', '$category_id')";

    if ($connection->query($query_insert_product) === TRUE) {
      echo "Sản phẩm đã được thêm thành công.";
    } else {
      echo "Lỗi: " . $connection->error;
    }
  }
}
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Sản phẩm</h3>
  </div>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">
      <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Nội dung</label>
        <textarea name="content" class="form-control" id="content"></textarea>
      </div>
      <div class="mb-3">
        <label for="short_description" class="form-label">Mô tả ngắn</label>
        <textarea name="short_description" class="form-control" id="short_description"></textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Giá sản phẩm</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm">
      </div>
      <div class="mb-3">
        <label for="sale_price" class="form-label">Giá khuyến mãi</label>
        <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Nhập giá khuyến mãi">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Danh mục sản phẩm</label>
        <select name="category" class="form-control" id="category">
          <?php
          $query_categories = "SELECT * FROM categories";
          $result_categories = $connection->query($query_categories);
          if ($result_categories->num_rows > 0) {
            while ($row = $result_categories->fetch_assoc()) {
              echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>