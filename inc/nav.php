<nav class="side-bar">
	<div class="user-p">
		<img src="img/user_Icon.png">
		<h4>@<?= $_SESSION['username'] ?></h4>
	</div>
    <?php

        if ($_SESSION['role'] == "class") {
            ?>
            <!-- Class Navigation Bar -->
            <ul id="navList">
                <li>
                    <a href="#">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Công việc của tôi</span>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span>Thông báo</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        <?php } else  { ?>
            <!-- Admin Navigation Bar -->
            <ul id="navList">
                <li>
                    <a href="#">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="create_task.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>Tạo công việc</span>
                    </a>
                </li>
                <li>
                    <a href="tasks.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Tất cả công việc</span>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span>Thông báo</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
</nav>