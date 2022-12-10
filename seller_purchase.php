<?php

include 'header.php';

$sql = "select l.purchase_id
	 	from purchase_list l 
        inner join product p on p.id = l.product_id
		inner join seller s on s.id = p.seller_id
		where s.id = ".$_SESSION['user']['id'];
$purchase_list = get($sql);

$purchase_ids = [];
foreach($purchase_list as $p){
	array_push($purchase_ids,$p['purchase_id']);	
}

$purchase_ids = implode(',',$purchase_ids);

$sql = "select p.* , c.first_name , c.last_name 
		from purchase p
		inner join customer c on c.id = p.customer_id 
		where p.id in ($purchase_ids)";
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
						<td> <a href="seller_purchase_detail.php?id=<?=$c['id']?>" class="btn btn-primary"> ดูใบสั่งซื้อ</a>  </td>
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