<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	
  </head>
  <body>
<?php
	  include "menu.php";  
?>
<!-- body code goes here -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<div class="container">
	  <h1>ร้าน <?=$_SESSION['user']['shop_name']?></h1>
	  <h2 > เพิ่มสินค้าใหม่  </h2>
		
		<?php
		 if(isset($_SESSION['alert-message'])){ 
		 ?>
		  <div class="alert <?=$_SESSION['alert-class']?>"> <?=$_SESSION['alert-message']?> </div>

		 <?php
			 unset($_SESSION['alert-message']);
			 unset($_SESSION['alert-class']);

		  }
	  	?>
		<form action="product_save.php" method="post"  enctype="multipart/form-data">
		 	<div class="form-group row">
				<label for="name" class="col-sm-2"> ชื่อสินค้า </label>
				<input type="text" name="name" class="form-control col-sm-4">
			</div>
			<div class="form-group row">
				<label for="price" class="col-sm-2"> ราคา </label>
				<input type="text" name="price" class="form-control col-sm-4">
			</div>
			<div class="form-group row">
				<label for="picture" class="col-sm-2"> รูปภาพตัวอย่าง </label>
				<input type="file" name="picture" class="form-control-file col-sm-4">
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
				<input type="text" name="box_weight" class="form-control col-sm-4">
			</div>
			<div class="form-group row">
				<button type="submit" class="btn btn-primary offset-sm-2"> บันทึก </button>
			</div>
            
        </form>
		
  </div>
<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>