<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm tài khoản</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Thêm tài khoản <a href="user.php">Quản lý tài khoản</a></h4>
            <form class="form-1" method="POST" action="app/add-user.php">
				<?php if (isset($_GET['error'])) {?>
				<div class="danger" role="alert">
					<?php echo stripcslashes($_GET['error']); ?>
				</div>
				<?php } ?>

				<?php if (isset($_GET['success'])) {?>
					<div class="success" role="alert">
						<?php echo stripcslashes($_GET['success']); ?>
					</div>
				<?php } ?>
				
                <div class="input-holder">
					<label>Tên đầy đủ</label>
                    <input type="text" name="full_name" class="input-1" placeholder="Tên đầy đủ"><br>
                </div>
                <div class="input-holder">
					<label>Tên tài khoản</label>
                    <input type="text" name="user_name" class="input-1" placeholder="Tên tài khoản"><br>
                </div>
                <div class="input-holder">
					<label>Mật khẩu</label>
                    <input type="text" name="password" class="input-1" placeholder="Mật khẩu"><br>
                </div>

				<button class="edit-btn">Thêm</button>
            </form>

		</section>
	</div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(4)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php } else {
	$cl = "Đăng nhập lần đầu";
    header("Location: login.php?error=$cl");
    exit();
} ?>