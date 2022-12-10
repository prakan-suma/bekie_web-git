<nav class="nav-top">

	<div class="logo-ct">
		<a class="logo" href="index.php"><img src="img/Logo_NIKE.png" alt="logo"></a>
	</div>

	
	<div class="">
		<a class="" href="index.php"> หน้าหลัก <span class="sr-only">(current)</span></a>
		<?php
		if (isset($_SESSION['login'])) {
		?>
			<?php
			if ($_SESSION['user_type'] == 'customer') {
			?>
				<a href="customer.php" class="">ข้อมูลลูกค้า</a>
				<a href="customer_purchase.php" class="">รายการใบสั่งซื้อ</a>
				<a href="cart.php" class="">ตะกร้าสินค้า</a>

			<?php
			} else {
			?>
				<a href="shop.php" class="">ข้อมูลร้านค้า</a>
				<a href="seller_purchase.php" class="">รายการใบสั่งซื้อ</a>
				<a href="product.php" class="">สินค้า</a>
			<?php
			}
			?>


		<?php
		}
		?>

	</div>

	<div class="search">
		<form action="search.php" method="post" class="">
			<div class="input-group">
				<input type="text" name="keyword" class="" placeholder="ค้นหา">
				<div class="input-group-append">
					<button type="submit" class=""> <ion-icon name="search-outline"></ion-icon> </button>
				</div>
			</div>
		</form>
	</div>

	<div class="">
		<?php
		if (isset($_SESSION['login'])) {
		?>
			<span class=""><?= $_SESSION['user']['username'] ?></span>
			<a href="logout.php" class=" ">ออกจากระบบ</a>
		<?php
		} else {
		?>
			<a href="register_customer.php" class="mr-4">สมัคสมาชิก</a>
			<a href="login.php">ลงชื่อเข้าใช้</a>
		<?php
		}
		?>
	</div>

</nav>