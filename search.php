<?php
session_start();
include "db.php";
$user_type = $_SESSION['user_type'] ?? "";

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
	<link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>
  <?php
	include "menu.php";  
  ?>
<!-- body code goes here -->
	  
	  <section class="container">
		  <form action="search.php" method="post" class="mt-4 mb-4">
		  	  <div class="input-group">
				  <input type="text" name="keyword" class="form-control" >
				  <div class="input-group-append">
				  	<button type="submit" class="btn btn-secondary"> ค้นหา </button>
				  </div>
				  
			  </div>
		  </form>
		  
		  
		  <?php
		 if(isset($_SESSION['alert-message'])){ 
		 ?>
		  <div class="alert <?=$_SESSION['alert-class']?>"> <?=$_SESSION['alert-message']?> </div>

		 <?php
			 unset($_SESSION['alert-message']);
			 unset($_SESSION['alert-class']);
		  }
		?>
		  
	  	
	  </section>
	  
	  
	  <section class="container">
	  	<h2>รายการสินค้าที่ตรงกับคำค้นหา </h2>
		<div class="row product_list">
			<?php
			$perpage = 20;
			$page = ( empty($_GET['page']) )? 1 : $_GET['page'];
			$start = $perpage * $page - $perpage ; // (1*15)-20 = 0 , (2*15)-20 = 15 ;
			
			$keyword = $_POST['keyword'];
			$sql = "select * from product where name LIKE '%$keyword%' ";
			 
			
			$all = get($sql);
			 
			$pages = ceil( count($all) / $perpage );
			
			$sql .= " limit $start,$perpage ";
			$products = get($sql);
			foreach($products as $p){
			?>
			<div class="col-md-2 m-1">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							  <img src="upload_picture/<?=$p['picture']?>" height="70" class="img-fluid">  
						</div>
						<div class="text-primary"> <?=$p['name']?> </div>
						<div class="text-danger">ราคา : <?=$p['price']?> บาท </div>
					</div>
					<div class="card-footer">
					<?php
					if($user_type != 'seller'){
					?>
						<a href="cart_add.php?id=<?=$p['id']?>" class="btn btn-block btn-success"> สั่งซื้อ</a>
					<?php
					}
					?>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	  </section>

	  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<nav aria-label="Page navigation example" class="container">
	  <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
	  <ul class="pagination ">
		  
	    <li class="page-item"> 
			<a class="page-link" href="index.php?page=1" aria-label="Previous"> 
				<span aria-hidden="true">&laquo;</span> 
				<span class="sr-only">Previous</span> 
			</a> 
		</li>
		<?php
		for($i=1 ;$i<=$pages ;$i++){  
		?>
	    	<li class="page-item"> <a class="page-link" href="index.php?page=<?=$i?>"> <?=$i?> </a> </li>
		<?php
		}
		?>
	    <li class="page-item"> 
			<a class="page-link" href="index.php?page=<?=$lastpage?>" aria-label="Next"> 
				<span aria-hidden="true">&raquo;</span> 
				<span class="sr-only">Next</span> 
			</a> 
		</li>
      </ul>
  </nav>
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>