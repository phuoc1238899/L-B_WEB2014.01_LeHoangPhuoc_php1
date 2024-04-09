<?php

include "../models/database.php";

// Kiểm tra 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["name"], $_POST["description"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $query_insert_category = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";

    if ($connection->query($query_insert_category) === TRUE) {
      echo "Loại sản phẩm đã được thêm thành công.";
    } else {
      echo "Lỗi: " . $connection->error;
    }
  }
}
?>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Thêm loại sản phẩm</h3>
  </div>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">
      <div class="mb-3">
        <label for="name" class="form-label">Tên loại sản phẩm</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên loại sản phẩm">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả loại sản phẩm"></textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
    </div>
  </form>
</div>
