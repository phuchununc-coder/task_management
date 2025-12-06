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
        $id = validate_input($_POST['id']);

        if (empty($user_name)) {
            $cl = "User name is required";
            header("Location: ../edit-user.php?error=$cl&id=$id");
            exit();
        } else if (empty($password)) {
            $cl = "Password is required";
            header("Location: ../edit-user.php?error=$cl&id=$id");
            exit();
        } else if (empty($full_name)) {
            $cl = "Full name is required";
            header("Location: ../edit-user.php?error=$cl&id=$id");
            exit();
        } else {

            include "Model/User.php";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = array($full_name,  $user_name, $password, "class", $id, "class");
            update_user($conn, $data);
            
            $cl = "Cập nhật người dùng thành công";
            header("Location: ../edit-user.php?success=$cl&id=$id");
            exit();
        }
    } else {
        $cl = "unknown error occurred";
        header("Location: ../edit-user.php?error=$cl");
        exit();
    }
} else {
    $cl = "Đăng nhập lần đầu";
    header("Location: ../edit-user.php?error=$cl");
    exit();
} ?>