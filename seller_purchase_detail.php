<?php
session_start();
$user_type = $_SESSION['user_type'] ?? "" ;

if( empty($_SESSION['login']) || $user_type == "customer" ){
	header('location:login.php');
}

include "db.php";

if(empty($_GET['id']))
	header('location:index.php');
	
$id = $_GET['id'];

$sql = "select p.* , c.first_name , c.last_name 
		from purchase p
		inner join customer c on c.id = p.customer_id 
		where p.id = ".$id;
$purchase = get($sql)[0];

 
$sql = "select * 
        from purchase_list l
		inner join product p on p.id = l.product_id
	    where p.seller_id = " .$_SESSION['user']['id']. " and purchase_id = ".$id;
$cart = get($sql);


//echo mysqli_error($conn);
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
	  
	 <div class="container">
		 <h1> ใบสั่งซื้อ </h1>
		 <div class="row">
		 	<div class="col-md-2 offset-md-7"> เลขที่ใบสั่งซื้อ  </div>
			<div class="col-md-2"><?=$purchase['id']?></div>
		 </div>
		 <div class="row">
			 <div class="col-md-2 offset-md-7"> วันที่สั่งซื้อ </div>
			 <div class="col-md-2"><?=$purchase['buy_date']?></div>
		 </div>
		 <div class="row">
		 	<div class="col-md-2 offset-md-7"> ผู้ซื้อ </div>
		 	<div class="col-md-2"><?=$purchase['first_name']. ' ' .$purchase['last_name']?></div>
		 </div>
		 
			 <div class="row table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th> รหัสสินค้า </th>
						<th> ชื่อสินค้า </th>
						<th> ราคา </th>
						<th> จำนวน </th>
						<th> ราคารวม </th>
					</tr>
					<?php
						foreach($cart as $c){
					?>
					<tr>
						<td><?=$c['id']?></td>
						<td><?=$c['name']?></td>
						<td><?=$c['price']?></td>
						<td><?=$c['amount']?> </td>
						<td><?=$c['total']?></td>
					</tr>
					<?php
						}
					?>
				</table>
			 </div>
			  
		 <div class="row">
			 <div class="col-md-1 offset-md-7">
				 ราคารวม 
			 </div>
			 <div class="col-md-2 text-right"><?=$purchase['total']?></div>
		 </div>
		 <div class="row">
			 <div class="col-md-1 offset-md-7">
				 ภาษี 7% 
			 </div>
			 <div class="col-md-2 text-right"><?=$purchase['vat']?></div>
		 </div>
		 <div class="row">
			 <div class="col-md-1 offset-md-7">
				 ค่าขนส่ง 
			 </div>
			 <div class="col-md-2 text-right"><?=$purchase['shipping_price']?></div>
		 </div>
		 <div class="row">
			 <div class="col-md-1 offset-md-7">
				 ราคาสุทธิ 
			 </div>
			 <div class="col-md-2 text-right"><?=$purchase['net_price']?></div>
		 </div>
		 
	 </div>
	  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>