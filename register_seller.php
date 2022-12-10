<?php include 'header.php' ?>

<!-- //content  -->
<div class="ct-rg">

	<h3 class="text-center tx-b font-weight-bold">สมัครผู้ขาย</h3>

	<p class="text-center font-weight-light">สร้างโปรไฟล์ Nike Member และได้สิทธิ์ก่อนใครในการเข้าถึงที่สุดของที่สุดแห่ง Nike ทั้งสินค้า แรงบันดาลใจ และกลุ่มชุมชน</p>
	<!-- alert-messege -->
	<?= alert() ?>

	<form action="register_seller_save.php" method="post" class="form">
		<div>
			<input name="username" type="text" required="required" placeholder="ชื่อผู้ใช้งาน">
		</div>

		<div>
			<input type="password" required="required" name="password" placeholder="รหัสผ่าน">
		</div>

		<div>
			<input type="text" required="required" name="shop_name" placeholder="ชื่อร้าน">
		</div>

		<div>
			<textarea required="required" name="address" placeholder="ที่อยู่"></textarea>
		</div>

		<div>
			<input type="text" name="phone" placeholder="เบอร์โทรติดต่อ">
		</div>

		<div>
			<input type="text" required="required" name="contace_name" " placeholder=" ชื่อผู้ติดต่อ">
		</div>
		<div>

			<input type="text" required="required" name="email" id="email" placeholder="อี.เมล">
		</div>

		<div>
			<input type="text" name="website" placeholder="เว็บไซต์">
		</div>
		<p class="text-center font-weight-light">ในการสร้างบัญชี หมายความว่าคุณยอมรับ <a class="li-inf" href=""> นโยบายความเป็นส่วนตัว</a> และ <a class="li-inf" href="">ข้อกำหนดการใช้</a> ของ Bekie</p>
		<button type="submit" name="btn_save">บันทึก</button>

		<div>
			<p class="text-center font-weight-light">เป็นสมาชิกแล้วใช่ไหม <a class="li-inf" href="login.php">ลงชื่อเข้าใช้</a></p>
		</div>
	</form>

</div>

<?php
include 'footer.php';
?>