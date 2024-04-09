<?php
include "../models/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['description'])) {
        $id = $_GET['id']; 
        $name = $_POST['name'];
        $description = $_POST['description'];

        updateCategory($connection, $name, $description, $id);
        echo "Cập nhật loại sản phẩm thành công!";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = getCategoryById($connection, $id);
}

function getCategoryById($connection, $id)
{
    $query = "SELECT * FROM categories WHERE `id` = $id";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function updateCategory($connection, $name, $description, $id)
{
    $query = "UPDATE categories SET 
      `name`='$name',
      `description`='$description'
      WHERE `id` =$id
  ";
    $connection->query($query);
}
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Chỉnh sửa loại sản phẩm</h3>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Tên loại sản phẩm</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $data['name'] ?? '' ?>" placeholder="Nhập tên loại sản phẩm">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" id="description"><?= $data['description'] ?? '' ?></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>