<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  	<a class="navbar-brand font-weight-bold" href="index.php">BEKIE</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> 
		<span class="navbar-toggler-icon"></span> 
	</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
		  <li class="nav-item active"> <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a> </li>
		   <?php
			if( isset($_SESSION['login']) ){	 
		   ?>		
		  		<?php
					if($_SESSION['user_type']=='customer'){
		  		?>
		  				<li class="nav-item"> <a href="customer.php" class="nav-link">ข้อมูลลูกค้า</a> </li>
		  				<li class="nav-item"> <a href="customer_purchase.php" class="nav-link">รายการใบสั่งซื้อ</a> </li>
		  				<li class="nav-item"> <a href="cart.php" class="nav-link">ตะกร้าสินค้า</a> </li>
		  		
		  		<?php
		  			}else{
				?>
		  				<li class="nav-item"> <a href="shop.php" class="nav-link">ข้อมูลร้านค้า</a> </li>
		  				<li class="nav-item"> <a href="seller_purchase.php" class="nav-link">รายการใบสั่งซื้อ</a> </li>
		  				<li class="nav-item"> <a href="product.php" class="nav-link">สินค้า</a> </li>
				<?php
					}
		  		?>
		  		 
		  		
			<?php
				} 
			?>
		  
	  </ul>
		
		
      <ul class="navbar-nav ">
         <?php
			if( isset($_SESSION['login']) ){	 
		 ?>		
				<li class="nav-item"> <span class="nav-link"><?=$_SESSION['user']['username']?></span> </li>
				<li class="nav-item"><a href="logout.php"  class="nav-link btn-warning text-white">ออกจากระบบ</a></li>
		 <?php
			}else{
		 ?>
			  <li class="nav-item dropdown">
				  	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สมัครสมาชิก </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
				  		<a class="dropdown-item" href="register_seller.php">ผู้ขาย</a> 
				  		<a class="dropdown-item" href="register_customer.php">ผู้ซื้อ</a>
				  	</div>
			   </li>

		  	   <li class="nav-item"> <a href="login.php"  class="nav-link btn-success text-white">เข้าสู่ระบบ</a></li>
		<?php
			}  
		?>
      </ul>
      
    </div>
  </nav>