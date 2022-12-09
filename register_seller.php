<?php include 'header.php' ?>

<!-- //content  -->
<div class="container mt-5">
	
	<div class="ct-rg">
	<h1 class="text-center">สมัครผู้ขาย</h1>

	<!-- alert-messege -->
	<?= alert() ?>

		<form action="register_seller_save.php" method="post" class="form">
			<div class="form-group  ">
				<label for="username" class="col-sm-2 col-form-label"> ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
				<input name="username" type="text" required="required" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="password" class="col-sm-2 col-form-label"> รหัสผ่าน<span class="text-danger">*</span> </label>
				<input type="password" required="required" name="password" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="shop_name" class="col-sm-2 col-form-label"> ชื่อร้าน<span class="text-danger">*</span> </label>
				<input type="text" required="required" name="shop_name" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="address" class="col-sm-2 col-form-label"> ที่อยู่<span class="text-danger">*</span> </label>
				<textarea required="required" class="form-control " name="address"></textarea>
			</div>

			<div class="form-group ">
				<label for="phone" class="col-sm-2 col-form-label"> เบอร์โทรติดต่อ<span class="text-danger">*</span> </label>
				<input type="text" name="phone" class="form-control ">
			</div>

			<div class="form-group ">
				<label for="contace_name" class="col-sm-2 col-form-label"> ชื่อผู้ติดต่อ <span class="text-danger">*</span> </label>
				<input type="text" required="required" name="contace_name" class="form-control ">
			</div>
			<div class="form-group ">
				<label for="email" class="col-sm-2 col-form-label"> อี.เมล <span class="text-danger">*</span></label>
				<input type="text" required="required" name="email" class="form-control" id="email">
			</div>

			<div class="form-group ">
				<label for="website" class="col-sm-2 col-form-label"> เว็บไซต์ </label>
				<input type="text" name="website" class="form-control ">
			</div>
			<button type="submit" name="btn_save" class="btn btn-primary  btn-block">บันทึก</button>
		</form>
	</div>

</div>

<?php
include 'footer.php';
?>