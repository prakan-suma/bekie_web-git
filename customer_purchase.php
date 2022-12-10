<?php
session_start();
$user_type = $_SESSION['user_type'] ?? "" ;

if( empty($_SESSION['login']) || $user_type == "seller" ){
	header('location:login.php');
}

include "db.php";

$sql = "select p.* , c.first_name , c.last_name 
		from purchase p
		inner join customer c on c.id = p.customer_id 
		where c.id = ".$_SESSION['user']['id'];
$purchase = get($sql);
 

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
		 <h4>รายการใบสั่งซื้อ </h4>
		  
			 <div class="row table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th> เลขที่ใบสั่งซื้อ </th>
						<th> วันที่สั่งซื้อ </th>
						<th> ยอดเงินสุทธิ </th>
						<th> ดูใบสั่งซื้อ </th>
					</tr>
					<?php
						foreach($purchase as $c){
					?>
					<tr>
						<td><?=$c['id']?></td>
						<td><?=$c['buy_date']?></td>
						<td><?=$c['net_price']?></td>
						<td> <a href="customer_purchase_detail.php?id=<?=$c['id']?>" class="btn btn-primary"> ดูใบสั่งซื้อ</a>  </td>
					</tr>
					<?php
						}
					?>
				</table>
			 </div>
			 
		 
		 
		 
	 </div>
	  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>