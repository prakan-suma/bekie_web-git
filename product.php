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
	  <h2 class="col-sm-3"> รายชื่อสินค้า  </h2>
		<?php
		 if(isset($_SESSION['alert-message'])){ 
		 ?>
		  <div class="alert <?=$_SESSION['alert-class']?>"> <?=$_SESSION['alert-message']?> </div>

		 <?php
			 unset($_SESSION['alert-message']);
			 unset($_SESSION['alert-class']);

		  }
		?>

		
		
		<form action="product_delete.php" method="post">
			<div class="mb-4">
				<button class="col-sm-1 btn btn-danger" > ลบ </button>
				<a href="product_add.php" class=" col-sm-1 offset-sm-9 btn btn-success"> เพิ่ม </a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" >
					<thead>
						<tr>
							<th> <input type="checkbox" onClick="checkAll(this)"> </th>
							<th> ลำดับ </th>
							<th> ชื่อสินค้า </th>
							<th> ราคา </th>
							<th> รูปภาพ </th>
							<th> รายละเอียด </th>
							<th> ขนาด(ซม.) </th>
							<th> น้ำหนัก(กก.) </th>
							<th> แก้ไข </th>
						</tr>
					</thead>
					<tbody>
<?php
	$sql = "select * from product where seller_id  = '{$_SESSION['user']['id']}' ";	
    $products = get($sql);
	$i = 0;
	foreach($products as $p){
?>
						
						<tr>
							<td> <input class="check" type="checkbox" name="id[]" value="<?=$p['id']?>"> </td>
							<td> <?=++$i?> </td>
							<td> <?=$p['name']?> </td>
							<td> <?=$p['price']?> </td>
							<td class="text-center img-fluid"> <img src="upload_picture/<?=$p['picture']?>" height="80">  </td>
							<td> <?=$p['detail']?> </td>
							<td> <?=$p['box_width']?> x <?=$p['box_height']?> x<?=$p['box_long']?> </td>
							<td> <?=$p['box_weight']?>  </td>
							<td> <a href="product_edit.php?id=<?=$p['id']?>" class=" btn btn-warning"> แก้ไข </a> </td>
						</tr>
<?php
	}
?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
	 <script>
	 	function checkAll(obj){
			c = document.querySelectorAll('.check');
			for(i=0;i<c.length;i++){
				c[i].checked = obj.checked;
			}
		} 
	 </script>
  </body>
</html>