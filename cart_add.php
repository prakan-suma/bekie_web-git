<?php
include "db.php";
$user_type = $_SESSION['user_type'] ?? "" ;

if( empty($_SESSION['login']) || $user_type == "seller" ){
	header('location:login.php');
}

if(empty($_GET['id'])){
	header('location:index.php');
}

$id = $_GET['id'];

$sql = "select * from product where id = ".$id;
$product = get($sql);

if(!isset($_SESSION['cart'][$id] ) ){
	$_SESSION['cart'][$id] = $product[0];
	$_SESSION['cart'][$id]['amount'] = 1;
	$_SESSION['cart'][$id]['sum'] = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['amount'];
	
}else{
	$_SESSION['cart'][$id]['amount']++; 
	$_SESSION['cart'][$id]['sum'] = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['amount'];
}


$_SESSION['cart_summary']['total'] = 0;
foreach($_SESSION['cart'] as $c){
	$_SESSION['cart_summary']['total'] += $c['sum'];
	$_SESSION['cart_summary']['vat'] = $_SESSION['cart_summary']['total'] * 0.07;
	$_SESSION['cart_summary']['shipping'] = 40;
	$_SESSION['cart_summary']['net_price'] = $_SESSION['cart_summary']['total'] + $_SESSION['cart_summary']['vat'] + $_SESSION['cart_summary']['shipping'];
}


header('location:cart.php');
?>