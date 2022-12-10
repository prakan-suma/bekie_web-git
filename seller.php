<?php include 'header.php' ?>

<!-- body code goes here -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<div class="ct">
	  <h4>ร้าน <?=$_SESSION['user']['shop_name']?></h4>
		
		<h4>รายการสั่งซื้อ</h4>
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