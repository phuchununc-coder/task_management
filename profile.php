<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "class") {
    include "DB_connection.php";
    include "app/Model/User.php";

	$user = get_user_by_id($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hồ sơ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Hồ sơ <a href="edit_profile.php">Chỉnh sửa hồ sơ</a></h4>
            
            <table class="main-table">
                <tr>
                    <td>Tên đầy đủ</td>
                    <td><?= $user['full_name']?></td>
                </tr>
            </table>
		</section>
	</div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(2)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php } else {
	$cl = "Đăng nhập lần đầu";
    header("Location: login.php?error=$cl");
    exit();
} ?>