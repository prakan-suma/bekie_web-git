<?php include 'header.php' ?>

<div class="ct-rg">


	<h3 class="text-center tx-b font-weight-bold">สมัครเป็น BEKIE MEMBER</h3>

	<p class="text-center font-weight-light">สร้างโปรไฟล์ Bekie Seller Member และ ได้สิทธิ์ในการลงขายสินค้ากับทาง Bekie</p>
	<!-- alert-messege -->
	<?= alert() ?>

	<div>
		<p class="text-center font-weight-light">ฉันต้องการลงขาย <a class="li-inf" href="register_seller.php">สมัคเป็น Seller Member</a></p>
	</div>
	<form action="register_customer_save.php" method="post">
		<div>
			<input name="username" type="text" required placeholder="ชื่อผู้ใช้">
		</div>

		<div <input type="password" required name="password" placeholder="รหัสผ่าน">
		</div>

		<div>
			<input type="text" required name="first_name" placeholder="ชื่อจริง">
		</div>

		<div <input type="text" required name="last_name" placeholder="นามสกุล">
		</div>

		<div>
			<input type="text" name="phone" placeholder="เบอร์โทร">
		</div>

		<div>
			<input type="text" required name="email" id="email" placeholder="อี.เมล">
		</div>

		<p class="text-center font-weight-light">ในการสร้างบัญชี หมายความว่าคุณยอมรับ <a class="li-inf" href=""> นโยบายความเป็นส่วนตัว</a> และ <a class="li-inf" href="">ข้อกำหนดการใช้</a> ของ Bekie</p>

		<button type="submit" name="btn_save">เข้าร่วมกับเรา</button>

		<div>
			<p class="text-center font-weight-light">เป็นสมาชิกแล้วใช่ไหม <a class="li-inf" href="login.php">ลงชื่อเข้าใช้</a></p>
		</div>


	</form>
</div>
</div>
<?php
include 'footer.php';
?>