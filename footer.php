<footer>
	<div class="ft-top">
		<div class="top-lf">
			<div class="lf-li">
				<a href="login.php">ลงชื่อเข้าใช้</a>
				<a href="register_customer.php">สมัคเป็นผู้ซื้อ</a>
				<a href="register_seller.php">สมัคเป็นผู้ขาย</a>
			</div>
			<div class="lf-li">
				<a href="index.php">รายการสินค้า</a>
				<a href="index.php">รายการสินค้าขายดี</a>
				<a href="cart.php">สถานะการสั่งซื้อ</a>
				<a href="#">ติดต่อเรา</a>
			</div>
		</div>
		<div class="top-rt">
			<a href="#">Facebook</a>
			<a href="#">Twitter</a>
			<a href="#">Instragram</a>

		</div>
	</div>
	<div class="ft-bt">
		<ul>
			<li>ประเทศไทย</li>
			<li>© 2022 Bekie, Inc. สงวนลิขสิทธิ์</li>
			<li></li>
			<li></li>
		</ul>
	</div>

</footer>

<scrsipt src="js/jquery-3.3.1.min.js"></scrsipt>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap-4.3.1.js"></script>
<script src="js/popper.min.js"></script>

<!-- icon  -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

<?php
unset($_SESSION['alert-message']);
unset($_SESSION['alert-class']);
?>

</html>