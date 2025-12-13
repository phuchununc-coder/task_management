<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin') {
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
        $id = validate_input($_POST['id']);

        if (empty($title)) {
            $cl = "Nhập quân số";
            header("Location: ../edit-task.php?error=$cl&id=$id");
            exit();
        } else if (empty($description)) {
            $cl = "Nhập nội dung";
            header("Location: ../edit-task.php?error=$cl&id=$id");
            exit();
        } else if ($assigned_to == 0) {
            $cl = "Chọn lớp học";
            header("Location: ../edit-task.php?error=$cl&id=$id");
            exit();
        } else {

            include "Model/Task.php";
            
            $data = array($title,  $description, $assigned_to, $id);
            update_task($conn, $data);
            
            $cl = "Cập nhật công việc thành công";
            header("Location: ../edit-task.php?success=$cl&id=$id");
            exit();
        }
    } else {
        $cl = "unknown error occurred";
        header("Location: ../edit-task.php?error=$cl");
        exit();
    }
} else {
    $cl = "Đăng nhập lần đầu";
    header("Location: ../login.php?error=$cl");
    exit();
} ?>