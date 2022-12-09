<?php include 'header.php' ?>

<!-- body code goes here -->
<div class="container">
	<h1>ร้าน <?= user('shop_name') ?></h1>

	<!-- alert   -->
	<div class="row">
		<div class="col-sm-2"> ชื่อผู้ใช้งาน </div>
		<div class="col-sm-4"> <?= user('username') ?> </div>
	</div>
	<div class="row">
		<div class="col-sm-2"> รหัสผ่าน </div>
		<div class="col-sm-4"> <?= str_repeat('*', strlen($_SESSION['user']['password'])) ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> ชื่อร้าน </div>
		<div class="col-sm-4"> <?= user('shop_name') ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> ที่อยู่ </div>
		<div class="col-sm-4"> <?= user('address') ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> เบอร์โทรติดต่อ </div>
		<div class="col-sm-4"> <?= user('phone') ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> ชื่อผู้ติดต่อ </div>
		<div class="col-sm-4"> <?= user('contact_name') ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> อี.เมล </div>
		<div class="col-sm-4"> <?= user('email')  ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2"> เว็บไซต์ </div>
		<div class="col-sm-4"> <?= user('website') ?></div>
	</div>
	<div class="row">

		<div class="col-sm-4 offset-sm-2"> <a href="shop_edit.php" class="btn btn-primary"> แก้ไข </a> </div>
	</div>
</div>


<?php
include 'footer.php';
?>