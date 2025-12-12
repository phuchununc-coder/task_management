<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    if (isset($_POST['id']) && isset($_POST['status']) && $_SESSION['role'] == 'class') {
        include "../DB_connection.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $status = validate_input($_POST['status']);
        $id = validate_input($_POST['id']);

        if (empty($title)) {
            $cl = "Nhập tiêu đề";
            header("Location: ../edit-task-class.php?error=$cl&id=$id");
            exit();
        } else if (empty($description)) {
            $cl = "Nhập mô tả";
            header("Location: ../edit-task-class.php?error=$cl&id=$id");
            exit();
        } else if (empty($status)) {
            $cl = "Chọn trạng thái";
            header("Location: ../edit-task-class.php?error=$cl&id=$id");
            exit();
        } else {

            include "Model/Task.php";
            
            $data = array($title, $description, $status, $id);
            update_task_class($conn, $data);
            
            $cl = "Cập nhật công việc thành công";
            header("Location: ../edit-task-class.php?success=$cl&id=$id");
            exit();
        }
    } else {
        $cl = "unknown error occurred";
        header("Location: ../edit-task-class.php?error=$cl");
        exit();
    }
} else {
    $cl = "Đăng nhập lần đầu";
    header("Location: ../login.php?error=$cl");
    exit();
} ?>