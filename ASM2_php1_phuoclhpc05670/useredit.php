<?php

// lay id tu duong dan xuong
$id = $_GET['id'];
require "./models/database.php";
$query = "SELECT id as product_id, name, short_description, price, sale_price, thumbnail FROM products WHERE id = $id";
$result = $connection->query($query);

$product = $result->fetch_assoc();
// form gan value cho in input 
if($row === NULL){
    // chuyen trang 404 hoac ...
}

$sql = "UPDATE 'users' SET 'name'=$updtate_name"; 
// 'name' = $Update_name WHERE 'id' = $id
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FOOD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="login_form_inner">
                        <h3>Đăng ký</h3>
                        <form class="row login_form" action="login.php" method="POST" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required id="name" name="update_name" placeholder="Nhập Tên Tài Khoản">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required id="name" name="email" placeholder="Nhập Email">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" required id="name" name="password" placeholder="Nhập Password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" required id="name" name="confirm_password" placeholder="Xác nhận Password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" value="submit" name="register" class="primary-btn">Đăng ký</button>
                            </div>
                            <div class="col-md-12 mb-3 my-4">
                                <a href="login.php">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>