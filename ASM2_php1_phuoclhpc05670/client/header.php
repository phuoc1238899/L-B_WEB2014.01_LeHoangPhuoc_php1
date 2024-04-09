<?php

require_once "./models/database.php";
session_start();

// Kiểm tra xem người dùng đã đăng nhập thành công chưa
if (isset($_SESSION['user_login'])) {
	// Lấy thông tin người dùng từ session
	$user = $_SESSION['user_login'];
} else {
	// Nếu chưa đăng nhập, hiển thị thông báo hoặc chuyển hướng đến trang đăng nhập
	echo 'Xin vui lòng đăng nhập.';
}
$query_cate = "SELECT id, name, description FROM categories";
$result_cate = $connection->query($query_cate);
if ($result_cate->num_rows === 0) {
	//     header("Location: index.php");
	// } else {
	// echo "Kết nối dữ liệu thành công.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style2.css">
	<link rel="stylesheet" href="./cssclient/style3.css">
	<!-- link icons -->
	<!-- Thêm thẻ link để kết nối với Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


	<title>FOOD</title>
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<a href="" class="logo">
				<img src="assets/logo.png" alt="">
			</a>
			<div id="menu">
				<div class="item">
					<a href="index.php">Trang chủ</a>
				</div>
				<div class="item">
					<a href="product.php">Sản phẩm</a>
					<div class="sub-menu">
						<ul>
							<?php while ($row_cate = $result_cate->fetch_assoc()) { ?>
								<li><a href="product_cate.php?category_id=<?= $row_cate['id'] ?>"><?= $row_cate['name'] ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="item">
					<a href="blog.php">Blog</a>
				</div>
			</div>
			<div id="actions">
				<div class="dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><?php echo $user['name'] ?? ''; ?></a></li>
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
				</div>
			</div>
		</div>
		<div id="banner">
    <div class="single_slider d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-9">
                    <div class="slider_text text-center">
                        <div class="find_dowmain">
                            <form action="product_cate.php" class="find_dowmain_form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-right">
        <img src="assets/img_1.png" alt="">
        <img src="assets/img_2.png" alt="">
        <img src="assets/img_3.png" alt="">
    </div>
    <div class="to-bottom">
        <a href="">
            <img src="assets/to_bottom.png" alt="">
        </a>
    </div>
</div>
