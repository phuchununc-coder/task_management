<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['full_name']) && $_SESSION['role'] == 'admin') {
        include "../DB_connection.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $user_name = validate_input($_POST['user_name']);
        $password = validate_input($_POST['password']);
        $full_name = validate_input($_POST['full_name']);

        if (empty($user_name)) {
            $cl = "Nhập tên tài khoản";
            header("Location: ../add-user.php?error=$cl");
            exit();
        } else if (empty($password)) {
            $cl = "Nhập mật khẩu";
            header("Location: ../add-user.php?error=$cl");
            exit();
        } else if (empty($full_name)) {
            $cl = "Nhập tên đầy đủ";
            header("Location: ../add-user.php?error=$cl");
            exit();
        } else {

            include "Model/User.php";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = array($full_name,  $user_name, $password, "class");
            insert_user($conn, $data);
            
            $cl = "Tạo mới người dùng thành công";
            header("Location: ../add-user.php?success=$cl");
            exit();
        }
    } else {
        $cl = "unknown error occurred";
        header("Location: ../add-user.php?error=$cl");
        exit();
    }
} else {
    $cl = "Đăng nhập lần đầu";
    header("Location: ../add-user.php?error=$cl");
    exit();
} ?>