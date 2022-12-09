<?php
session_start();
include "db.php";
$user_type = $_SESSION['user_type'] ?? "" ;

if( empty($_SESSION['login']) || $user_type == "seller" ){
	header('location:login.php');
}

if(empty($_SESSION['cart'])){
	header('location:index.php');
}
 
$cart = $_SESSION['cart'];


$_SESSION['cart_summary']['total'] = 0;
foreach($cart as $c){
	$id = $c['id'] ;
	$_SESSION['cart'][$id]['amount'] = $_POST['amount'][$id];
	$_SESSION['cart'][$id]['sum'] = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['amount'];
	
	
	$_SESSION['cart_summary']['total'] += $c['sum'];
	$_SESSION['cart_summary']['vat'] = $_SESSION['cart_summary']['total'] * 0.07;
	$_SESSION['cart_summary']['shipping'] = 40;
	$_SESSION['cart_summary']['net_price'] = $_SESSION['cart_summary']['total'] + $_SESSION['cart_summary']['vat'] + $_SESSION['cart_summary']['shipping'];
}

 
header('location:cart.php');
?>