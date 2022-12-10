<?php include 'header.php' ?>

<!-- body code goes here -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<div class="ct">
	<h4>ร้าน <?= user('shop_name') ?></h4>
	<h2> เพิ่มสินค้าใหม่ </h2>
	
	<?= alert() ?>
	
	<form action="product_save.php" method="post" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="name" class="col-sm-2"> ชื่อสินค้า </label>
			<input type="text" name="name" class="form-control col-sm-4" required >
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2"> ราคา </label>
			<input type="text" name="price" class="form-control col-sm-4" required>
		</div>
		<div class="form-group row">
			<label for="picture" class="col-sm-2"> รูปภาพตัวอย่าง </label>
			<input type="file" name="picture" class="form-control-file col-sm-4" required>
		</div>
		<div class="form-group row">
			<label for="detail" class="col-sm-2"> รายละเอียดสินค้า </label>
			<textarea name="detail" class="form-control col-sm-6"></textarea>
		</div>
		<div class="form-group row">
			<label for="size" class="col-sm-2"> ขนาด (เซนติเมตร) </label>

			<input type="text" name="box_width" class="form-control col-sm-2 m-1" placeholder="กว้าง">
			<input type="text" name="box_height" class="form-control col-sm-2 m-1" placeholder="สูง">
			<input type="text" name="box_long" class="form-control col-sm-2 m-1" placeholder="ยาว">
		</div>
		<div class="form-group row">
			<label for="weight" class="col-sm-2"> น้ำหนัก (กิโลกรัม) </label>
			<input type="text" name="box_weight" class="form-control col-sm-4" required>
		</div>
		<div class="form-group row">
			<button type="submit" class="btn btn-primary offset-sm-2"> บันทึก </button>
		</div>

	</form>

</div>

<?php
include 'footer.php';
?>