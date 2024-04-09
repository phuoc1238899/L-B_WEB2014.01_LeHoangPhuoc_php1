<?php

session_start();

// Kiểm tra 
if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    require_once "./models/database.php";
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $sql = "SELECT `name`, `email`, `password` FROM `users` WHERE `status` = 1 AND `email` = '$login_email'";

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if (password_verify($login_password, $row['password'])) {
            $_SESSION['user_login'] = $row;
            header('Location: index.php');
            exit;
        } else {
            echo "Sai tài khoản hoặc mật khẩu.";
        }
    }
}
// session_start();

// if(sizeof($_POST) > 0){
//     require_once "./models/database.php";
//     $login_email = ($_POST['email']);
//     $login_password = ($_POST['password']);
//     $sql = "SELECT `name`, `email`, `password` FROM `users` WHERE `status` = 1
//     AND `email` = $login_email" ;

//     $result = $connection->query($sql);
//     if ($result->num_rows < 0){
//         $row = $result->fetch_assoc();
//         header('Location: index.php');
//         if (password_verify($login_password, $row['password'])){
//           $_SESSION['user_login'] = $row;
//           header('index.php');
//         }else{
//             $_SESSION['error_email'] = [
//                 'old' => $login_email
//             ];
//         }
//     }


// }else{
//     echo "dangky";
// }
