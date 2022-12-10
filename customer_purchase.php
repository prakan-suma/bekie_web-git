<?php
include_once "header.php";

if( empty($_SESSION['login']) || $user_type == "seller" ){
	header('location:login.php');
}

$sql = "select p.* , c.first_name , c.last_name 
		from purchase p
		inner join customer c on c.id = p.customer_id 
		where c.id = ".$_SESSION['user']['id'];
$purchase = get($sql);
 
?>

<!-- body code goes here -->
	 <div class="ct">
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
	  
<?php
	include 'footer.php';
?>