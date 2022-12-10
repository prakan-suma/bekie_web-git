<?php
include_once "header.php";

if (empty($_SESSION['login']) || $user_type == "seller") {
	header('location:login.php');
}

if (empty($_SESSION['cart'])) {
	$_SESSION['alert-message'] = "ยังไม่มีการสั่งซื้อสินค้า กรุณาเลือกสินค้าที่ต้องการ";
	$_SESSION['alert-class'] = "alert-warning";
	header('location:index.php');
}

$cart = $_SESSION['cart'] ?? [];

?>

<!-- body code goes here -->

<div class="ct">
	<h4>หน้าตะกร้าสินค้า </h4>
	<form action="cart_update.php" method="post">
		<div class="row table-responsive">
			<table class="table table-bordered table-hover">
				<tr>
					<th> รหัสสินค้า </th>
					<th> ชื่อสินค้า </th>
					<th> ราคา </th>
					<th> จำนวน </th>
					<th> ราคารวม </th>
				</tr>
				<?php
				foreach ($cart as $c) {
				?>
					<tr>
						<td><?= $c['id'] ?></td>
						<td><?= $c['name'] ?></td>
						<td><?= $c['price'] ?></td>
						<td> <input name="amount[<?= $c['id'] ?>]" value="<?= $c['amount'] ?>"> </td>
						<td><?= $c['sum'] ?></td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-primary offset-md-6 mr-2"> คำนวณราคาใหม่</button>
			<a href="cart_confirm.php" class="btn btn-success "> ยืนยันสั่งซื้อ </a>
		</div>
	</form>
	<div class="row">
		<div class="col-md-1 offset-md-9">
			ราคารวม
		</div>
		<div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['total'] ?></div>
	</div>
	<div class="row">
		<div class="col-md-1 offset-md-9">
			ภาษี 7%
		</div>
		<div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['vat'] ?></div>
	</div>
	<div class="row">
		<div class="col-md-1 offset-md-9">
			ค่าขนส่ง
		</div>
		<div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['shipping'] ?></div>
	</div>
	<div class="row">
		<div class="col-md-1 offset-md-9">
			ราคาสุทธิ
		</div>
		<div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['net_price'] ?></div>
	</div>

</div>
<?php
include_once "menu.php";
?>