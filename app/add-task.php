<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin') {
        include "../DB_connection.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $assigned_to = validate_input($_POST['assigned_to']);

        if (empty($title)) {
            $cl = "Nhập tiêu đề";
            header("Location: ../create_task.php?error=$cl");
            exit();
        } else if (empty($description)) {
            $cl = "Nhập mô tả";
            header("Location: ../create_task.php?error=$cl");
            exit();
        } else {

            include "Model/Task.php";
            
            $data = array($title,  $description, $assigned_to);
            insert_task($conn, $data);
            
            $cl = "Tạo mới công việc thành công";
            header("Location: ../create_task.php?success=$cl");
            exit();
        }
    } else {
        $cl = "unknown error occurred";
        header("Location: ../create_task.php?error=$cl");
        exit();
    }
} else {
    $cl = "Đăng nhập lần đầu";
    header("Location: ../create_task.php?error=$cl");
    exit();
} ?>