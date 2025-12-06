<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Model/User.php";

    if (!isset($_GET['id'])) {
        header("Location: user.php");
        exit();
    }
    $id = $_GET['id'];
    $user = get_user_by_id($conn, $id);

	if ($user == 0) {
        header("Location: user.php");
        exit();
    }

    $data = array($id, "class");
    delete_user($conn, $data);
    $sm = "Xoá tài khoản thành công";
    header("Location: user.php?success=$sm");
    exit();

} else {
	$cl = "Đăng nhập lần đầu";
    header("Location: login.php?error=$cl");
    exit();
} ?>