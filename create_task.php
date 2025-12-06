<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Model/User.php";
    $users = get_all_users($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tạo công việc</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Tạo công việc</h4>
            <form class="form-1" method="POST" action="app/add-task.php">
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
					<label>Tiêu đề</label>
                    <input type="text" name="title" class="input-1" placeholder="Tiêu đề"><br>
                </div>
                <div class="input-holder">
					<label>Mô tả</label>
                    <textarea type="text" name="description" class="input-1" placeholder="Mô tả"></textarea><br>
                </div>
                <div class="input-holder">
					<label>Phân công</label>
                    <select name="assigned_to" class="input-1">
                        <option value="0">Chọn lớp học</option>
                        <?php if ($users != 0) {
                            foreach ($users as $user) {
                        ?>
                        <option value="<?= $user['id']?>"><?= $user['full_name']?></option>
                        <?php } } ?>
                    </select><br>
                </div>

				<button class="edit-btn">Tạo</button>
            </form>

		</section>
	</div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(3)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php } else {
	$cl = "First login";
    header("Location: login.php?error=$cl");
    exit();
} ?>