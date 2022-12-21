<?php include 'header.php' ?>
<div class="ct-rg">
	<!-- alert-messege -->
	<?= alert() ?>
	<div class="ct">

		<h4>ชื่อผู้ใช้งาน <?= user('first_name')?> <?= user('last_name')?></h4>

		<!-- alert   -->
		<div class="row">
			<div class="col-sm-4"> ชื่อผู้ใช้งาน </div>
			<div class="col-sm-4"> <?= user('username') ?> </div>
		</div>
		<div class="row">
			<div class="col-sm-4"> รหัสผ่าน </div>
			<div class="col-sm-4"> <?= str_repeat('*', strlen($_SESSION['user']['password'])) ?></div>
		</div>

		<div class="row">
			<div class="col-sm-4"> เบอร์โทรติดต่อ </div>
			<div class="col-sm-4"> <?= user('phone') ?></div>
		</div>
		
		<div class="row">
			<div class="col-sm-4"> อี.เมล </div>
			<div class="col-sm-4"> <?= user('email')  ?></div>
		</div>

		<div class="row">
			<div class="col-sm-4 offset-sm-2"> <a href="customer_edit.php" class="btn "> แก้ไข </a> </div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
