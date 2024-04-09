<?php
include './models/database.php'; 
// kiem tra
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = 1;

    $sql = "INSERT INTO users(`name`, `email`, `password`, `phone`, `address`, `status`) 
            VALUES ('$name', '$email', '$password', '$phone', '$address', '$status')";
    $result = $connection->query($sql);

    if ($result) {
        echo "Đăng ký thành công.";
        // header('Location: login.php');
    } else {
        echo "Lỗi: " . $connection->error;
    }
}
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
                        <form class="row login_form" action="register.php" method="POST" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required name="name" placeholder="Nhập Tên Tài Khoản">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required name="email" placeholder="Nhập Email">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" required name="password" placeholder="Nhập Password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required name="phone" placeholder="Nhập Số Điện Thoại">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" required name="address" placeholder="Nhập Địa Chỉ">
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