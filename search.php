<?php include 'header.php' ?>

<!-- alert  -->
<?= alert() ?>

<section class="ct">
	<h4>รายการสินค้าที่ตรงกับคำค้นหา </h4>

	<div class="product_list">
		<?php
		$perpage = 20;
		$page = (empty($_GET['page'])) ? 1 : $_GET['page'];
		$start = $perpage * $page - $perpage; // (1*15)-20 = 0 , (2*15)-20 = 15 ;

		$keyword = $_POST['keyword'];
		$sql = "select * from product where name LIKE '%$keyword%' ";

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
	<ul class="pagination ">

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
			<li class="page-item"> <a class="btn-ac-link" href="index.php?page=<?= $i ?>"> <?= $i ?> </a> </li>
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