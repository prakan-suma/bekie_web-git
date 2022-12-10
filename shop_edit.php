<?php
include 'header.php';

if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
?>

<!-- body code goes here -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<div class="ct">
	<h4>แก้ไขข้อมูลร้านค้า</h4>

	<!-- alert  -->
	<?= alert() ?>

	<form action="register_seller_update.php" method="post">
		<input type="hidden" name="id" value="<?= user('id') ?>">

		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label"> ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
			<input name="username" type="text" required="required" class="form-control col-sm-3" value="<?= user('username') ?>">
		</div>

		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label"> รหัสผ่าน<span class="text-danger">*</span> </label>
			<input type="password" required="required" name="password" class="form-control col-sm-3" value="<?= user('password') ?>">
		</div>

		<div class="form-group row">
			<label for="shop_name" class="col-sm-2 col-form-label"> ชื่อร้าน<span class="text-danger">*</span> </label>
			<input type="text" required="required" name="shop_name" class="form-control col-sm-3" value="<?= user('shop_name') ?>">
		</div>

		<div class="form-group row">
			<label for="address" class="col-sm-2 col-form-label"> ที่อยู่<span class="text-danger">*</span> </label>
			<textarea required="required" class="form-control col-sm-10" name="address"><?= $_SESSION['user']['address'] ?></textarea>
		</div>

		<div class="form-group row">
			<label for="phone" class="col-sm-2 col-form-label"> เบอร์โทรติดต่อ<span class="text-danger">*</span> </label>
			<input type="text" name="phone" class="form-control col-sm-3" value="<?= $_SESSION['user']['phone'] ?>">
		</div>

		<div class="form-group row">
			<label for="contace_name" class="col-sm-2 col-form-label"> ชื่อผู้ติดต่อ <span class="text-danger">*</span> </label>
			<input type="text" required="required" name="contace_name" class="form-control col-sm-3" value="<?= $_SESSION['user']['contace_name'] ?>">
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label"> อี.เมล <span class="text-danger">*</span></label>
			<input type="text" required="required" name="email" class="form-control col-sm-3" id="email" value="<?= $_SESSION['user']['email'] ?>">
		</div>

		<div class="form-group row">
			<label for="website" class="col-sm-2 col-form-label"> เว็บไซต์ </label>
			<input type="text" name="website" class="form-control col-sm-3" value="<?= $_SESSION['user']['website'] ?>">
		</div>
		<button type="submit" name="btn_save" class="btn btn-primary btn-block col-sm-3 offset-sm-5">บันทึก</button>
	</form>

</div>
<script src="js/jquery-3.3.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.3.1.js"></script>
</body>

</html>