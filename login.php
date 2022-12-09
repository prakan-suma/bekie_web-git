<?php include 'header.php' ?>

<!-- body code goes here -->
<session class="login">
	<div class="ct-rg">

		<h1 class="text-center"> เข้าสู่ระบบ</h1>

		<?= alert() ?>

		<form action="login_check.php" method="post">
			<div class="form-group">
				<label for="username" class="col-sm-2 col-form-label"> ชื่อผู้ใช้งาน </label>
				<input name="username" type="text" required="required" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="password" class="col-sm-2 col-form-label"> รหัสผ่าน </label>
				<input type="password" required="required" name="password" class="form-control ">
			</div>
			<div class="form-group ">
				<button type="submit" name="btn_save" class="btn btn-primary btn-block  ">บันทึก</button>
			</div>
		</form>
	</div>
</session>

<?php
include 'footer.php';
?>