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
<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="shop.php">ข้อมูลร้านค้า</a> </li>
        <li class="nav-item"> <a class="nav-link" href="product.php">ข้อมูลสินค้า</a> </li>
	    <li class="nav-item"> <a class="nav-link" href="seller.php"> รายการสั่งซ์้อ</a> </li>
      </ul>
      <ul class="navbar-nav">
        
        <?php
			if( isset($_SESSION['login']) ){
				 
		?>
		  		<li class="nav-item"> <span class="nav-link"><?=$_SESSION['user']['username']?></span> </li>
        		<li class="nav-item"><a href="logout.php"  class="nav-link btn-warning text-white">ออกจากระบบ</a></li>
		<?php
			}else{
		?>
			  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สมัครสมาชิก </a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
				  <a class="dropdown-item" href="register_seller.php">ผู้ขาย</a> 
				  <a class="dropdown-item" href="register_customer.php">ผู้ซื้อ</a></div>
			  </li>

		  	<li class="nav-item"> <a href="login.php"  class="nav-link btn-success text-white">เข้าสู่ระบบ</a></li>
		<?php
			}  
		?>
      </ul>
      
    </div>
  </nav>
<!-- body code goes here -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<div class="container">
	  <h1>ร้าน <?=$_SESSION['user']['shop_name']?></h1>
		
		<h2>รายการสั่งซื้อ</h2>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" >
			<thead>
				<tr>
					<th> เลขที่ใบสั่งซื้อ </th>
					<th> วันที่สั่งซื้อ </th>
					<th> ผู้ซื้อ </th>
					<th> ราคาสุทธิ์ </th>
					<th> ดูรายละเอียด </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> 1 </td>
					<td> 1 </td>
					<td> 1 </td>
					<td> 1 </td>
					<td> <a href="purchase.php?id=<?=$id?>" class="btn-link"> ดูรายการสั่งซื้อ</a> </td>
				</tr>
			</tbody>
		</table>
		</div>
		
	</div>
<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>