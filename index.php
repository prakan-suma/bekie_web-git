<?php include 'header.php' ?>

<!-- body code goes here -->
<section class="ct">

	<!-- alert  -->
	<?= alert() ?>

	<div class="head-ix ct-bd">
		<h4>สินค้าขายดี</h4>
	</div>

	<div class="best_product">

		<?php

		// ดึงข้อมูลจากตาราง product ทั้งหมด , นับ(product_id) ใส่ Column ใหม่ ชื่อ cnt 
		// ตาราง purchase_list ชื่อใหม่ว่า l 
		// ต่อตาราง product ชื่อใหม่ว่า p โดย p.id = l.product_id
		// groupข้อมูล ด้วย products_id **GROUP BY คือการจัดกลุ่มคำที่ซ้ำกันให้แสดงแค่คำเดียว หรือการจัดกลุ่มของคำซ้ำกันให้รวมกลุ่มกัน โดยจะมีการเรียงลำดับตามตัวอักษร**
		//order ด้วย column cnt และ เรียงจากมากไปน้อย **ORDER BY เป็นคำสั่งที่ใช้เรียงข้อมูลที่ไม่เป็นระเบียบในตาราง โดยจะเรียงลำดับจากมากไปหาน้อย หรือ น้อยไปหามากก็ได้ และ DESC คือการกำหนดจาก มาก > น้อย**

		//limit **เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตาราง** | 0,10 = เอาข้อมูลลำดับที่ 0 - 10  

		$sql = "SELECT p.* , COUNT(product_id) as cnt
						FROM purchase_list l
						inner join product p on p.id = l.product_id
						GROUP by product_id
						order by cnt desc
						LIMIT 0 , 10";
		$best_products = get($sql);
		$best_ids = [];

		foreach ($best_products as $p) {
			array_push($best_ids, $p['id']); //array_push() จะเป็นการเพิ่มค่าเข้าไปในอาร์เรย์
		?>
			<div class="">
				<div class="">
					<div class="text-center pd-img">
						<img src="upload_picture/<?= $p['picture'] ?>" class="img-fluid">
					</div>
					<div class="pt-1 "> <?= $p['name'] ?> </div>

					<div class="pd-info-bt pt-1 pb-2 pr-4">

						<div class="tx-g">ราคา : <?= $p['price'] ?> บาท </div>
						<div class="">
							<?php
							if ($user_type != 'seller') {
							?>
								<a class="li-inf" href="cart_add.php?id=<?= $p['id'] ?>"> สั่งซื้อ</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</section>

<!-- รายการสินค้า  -->
<section class="ct">
	<h4 class="head-ix ct-bd">รายการสินค้า</h4>

	<div class="product_list">
		<?php

		$perpage = 20;
		$page = (empty($_GET['page'])) ? 1 : $_GET['page'];
		$start = $perpage * $page - $perpage; // (1*15)-20 = 0 , (2*15)-20 = 15 ;

		$sql = "select * from product ";
		if (!empty($best_ids)) {
			$best_ids = implode(',', $best_ids);
			$sql .= "where id not in($best_ids) ";
		}

		$all = get($sql);


		$pages = ceil(count($all) / $perpage);

		$sql .= " limit $start,$perpage ";
		$products = get($sql);
		foreach ($products as $p) {
		?>
			<div class="">

				<div class="">
					<div class="text-center pd-img">
						<img src="upload_picture/<?= $p['picture'] ?>" class="img-fluid">
					</div>
					<div class="pt-1 "> <?= $p['name'] ?> </div>

					<div class="pd-info-bt pt-1 pb-2 pr-4">

						<div class="tx-g">ราคา : <?= $p['price'] ?> บาท </div>
						<div class="">
							<?php
							if ($user_type != 'seller') {
							?>
								<a class="li-inf" href="cart_add.php?id=<?= $p['id'] ?>"> สั่งซื้อ</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<nav aria-label="Page navigation example" class="ct">
	<!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
	<ul class="pagination dsd">

		<li class="page-item">
			<a class="btn-ac-link" href="index.php?page=1" aria-label="Previous">
				<!-- <span aria-hidden="true">&laquo;</span> -->
				<ion-icon name="chevron-back-outline"></ion-icon>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<?php
		for ($i = 1; $i <= $pages; $i++) {
		?>
			<li class="page-item ml-1 mr-1"> <a class="btn-ac-link" href="index.php?page=<?= $i ?>"> <?= $i ?> </a> </li>
		<?php
		}
		?>
		<li class="page-item">
			<a class="btn-ac-link" href="index.php?page=<?= $lastpage ?>" aria-label="Next">
				<!-- <span aria-hidden="true">&raquo;</span> -->
				<ion-icon name="chevron-forward-outline"></ion-icon>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul>
</nav>

<?php
include 'footer.php';
?>