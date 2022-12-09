<?php include 'header.php' ?>

<!-- body code goes here -->
<section class="container">
	<form action="search.php" method="post" class="mt-4 mb-4">
		<div class="input-group">
			<input type="text" name="keyword" class="form-control">
			<div class="input-group-append">
				<button type="submit" class="btn btn-secondary"> ค้นหา </button>
			</div>

		</div>
	</form>

	<!-- alert  -->
	<?= alert() ?>

	<h2>สินค้าขายดี</h2>
	
	<div class="row best_product">
		<?php
		$sql = "SELECT p.* , COUNT(product_id) as cnt
						FROM purchase_list l
						inner join product p on p.id = l.product_id
						GROUP by product_id
						order by cnt desc
						LIMIT 0 , 10";

		$best_products = get($sql);
		$best_ids = [];
		foreach ($best_products as $p) {
			array_push($best_ids, $p['id']);
		?>
			<div class="col-md-2 m-1">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<img src="upload_picture/<?= $p['picture'] ?>" height="70" class="img-fluid">
						</div>
						<div class="text-primary"> <?= $p['name'] ?> </div>
						<div class="text-danger">ราคา : <?= $p['price'] ?> บาท </div>
					</div>
					<div class="card-footer">
						<?php
						if ($user_type != 'seller') {
						?>
							<a href="cart_add.php?id=<?= $p['id'] ?>" class="btn btn-block btn-success"> สั่งซื้อ</a>
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


<section class="container">
	<h2>รายการสินค้า</h2>
	<div class="row product_list">
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
			<div class="col-md-2 m-1">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<img src="upload_picture/<?= $p['picture'] ?>" height="70" class="img-fluid">
						</div>
						<div class="item-info">
							<div class="text-primary"> <?= $p['name'] ?> </div>
							<div class="text-danger "> ราคา : <?= $p['price'] ?> บาท </div>
						</div>
					</div>
					<div class="card-footer">
						<?php
						if ($user_type != 'seller') {
						?>
							<a href="cart_add.php?id=<?= $p['id'] ?>" class="btn btn-block btn-success"> สั่งซื้อ</a>
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
	<ul class="pagination dsd">

		<li class="page-item">
			<a class="page-link" href="index.php?page=1" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<?php
		for ($i = 1; $i <= $pages; $i++) {
		?>
			<li class="page-item"> <a class="page-link" href="index.php?page=<?= $i ?>"> <?= $i ?> </a> </li>
		<?php
		}
		?>
		<li class="page-item">
			<a class="page-link" href="index.php?page=<?= $lastpage ?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul>
</nav>

<?php
include 'footer.php';
?>