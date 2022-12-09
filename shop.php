<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
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
		
		<div class="row">
			<div class="col-sm-2"> ชื่อผู้ใช้งาน </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['username']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> รหัสผ่าน </div>
			<div class="col-sm-4"> <?=str_repeat('*', strlen($_SESSION['user']['password']) ) ?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> ชื่อร้าน </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['shop_name']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> ที่อยู่ </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['address']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> เบอร์โทรติดต่อ </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['phone']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> ชื่อผู้ติดต่อ </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['contace_name']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> อี.เมล </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['email']?></div>
		</div>
		<div class="row">
			<div class="col-sm-2"> เว็บไซต์ </div>
			<div class="col-sm-4"> <?=$_SESSION['user']['website']?></div>
		</div>
		<div class="row">
			 
			<div class="col-sm-4 offset-sm-2"> <a href="shop_edit.php" class="btn btn-primary"> แก้ไข </a> </div>
		</div>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>