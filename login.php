<?php include 'header.php' ?>

<!-- body code goes here -->
<session class="login">
	<div class="ct-rg">

		<h4 class="text-center tx-b font-weight-bold">บัญชีของคุณสำหรับทุกอย่างเกี่ยวกับ BEKIE</h4>

		<?= alert() ?>

		<form action="login_check.php" method="post">
			<div>
				<input name="username" type="text" required="required" placeholder="ชื่อผู้ใช้งาน">
			</div>

			<div>
				<input type="password" required="required" name="password" placeholder="รหัสผ่าน">
			</div>

			<div class="mb-3"><a class="li-inf text-right" href=""> ลืมรหัสผ่านใช่ใหม</a> </div>

			<div>
				<p class="text-center font-weight-light">ในการสร้างบัญชี หมายความว่าคุณยอมรับ <a class="li-inf" href=""> นโยบายความเป็นส่วนตัว</a> และ <a class="li-inf" href="">ข้อกำหนดการใช้</a> ของ Bekie</p>
			</div>

			<div class=" ">
				<button type="submit" name="btn_save">บันทึก</button>
			</div>


		</form>
	</div>
</session>

<?php
include 'footer.php';
?>