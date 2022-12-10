<?php include 'header.php' ?>

<div class="container">

	<div class="ct-rg">

		<h4 class="text-center ">สมัครผู้ซื้อ</h4>

		<!-- alert-messege -->
		<?= alert() ?>

		<form action="register_customer_save.php" method="post">
			<div class="form-group ">
				<label for="username" class="col-sm-2 col-form-label"> ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
				<input name="username" type="text" required="required" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="password" class="col-sm-2 col-form-label"> รหัสผ่าน<span class="text-danger">*</span> </label>
				<input type="password" required="required" name="password" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="first_name" class="col-sm-2 col-form-label"> ชื่อจริง <span class="text-danger">*</span> </label>
				<input type="text" required="required" name="first_name" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="last_name" class="col-sm-2 col-form-label"> นามสกุล <span class="text-danger">*</span> </label>
				<input type="text" required="required" name="last_name" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="phone" class="col-sm-2 col-form-label"> เบอร์โทร<span class="text-danger">*</span> </label>
				<input type="text" name="phone" class="form-control ">
			</div>


			<div class="form-group ">
				<label for="email" class="col-sm-2 col-form-label"> อี.เมล <span class="text-danger">*</span></label>
				<input type="text" required="required" name="email" class="form-control " id="email">
			</div>

			<button type="submit" name="btn_save" class="btn btn-primary btn-block">บันทึก</button>
		</form>

	</div>
</div>


<?php
include 'footer.php';
?>