<?php
include "db.php";

$user_type = $_SESSION['user_type'] ?? "" ;

if( empty($_SESSION['login']) || $user_type == "seller" ){
	header('location:login.php');
}

if(empty($_SESSION['cart'])){
	header('location:index.php');
}
 
$cart = $_SESSION['cart'];
$user_id = $_SESSION['user']['id'];
$buy_date = date('Y-m-d H:i:s');

$total = $_SESSION['cart_summary']['total'];
$vat = $_SESSION['cart_summary']['vat'];
$shipping = $_SESSION['cart_summary']['shipping'];
$net_price = $_SESSION['cart_summary']['net_price'];


$sql = "insert into purchase values(
				NULL,
				'$user_id',
				'$buy_date',
				'$total',
				'$vat',
				'$shipping',
				'$net_price'
		    )";
$saved = save($sql);
$purchase_id = mysqli_insert_id($conn);

foreach($cart as $c){
	$id = $c['id'] ;
	$amount = $c['amount'];
	$price = $c['price'];
	$sum = $c['sum'];
	$sql = "insert into purchase_list values(
		    	'$purchase_id',
				'$id',
				'$amount',
				'$price',
				'$sum'
			)";
	$saved = save($sql);
}

unset($_SESSION['cart']);
unset($_SESSION['cart_summary']);

header('location:cart_detail.php?id='.$purchase_id);
?>