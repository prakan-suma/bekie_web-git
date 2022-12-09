<?php
//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
include "db.php";

//เตรียมคำสั่ง SQL
$sql = "select * from customer where username='{$_POST['username']}' and password = '{$_POST['password']}' ";
$u1 = get($sql);

$sql = "select * from seller where username='{$_POST['username']}' and password = '{$_POST['password']}' ";
$u2 = get($sql);

// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if( count($u1) >= 1  ){
	//ถ้า มีข้อมูลตรงกับ ผู้ซื้อ
	$_SESSION['login'] = true;
	$_SESSION['user_type'] = 'customer';
	$_SESSION['user'] = $u1[0];
	header('location:index.php');
}elseif( count($u2) >= 1  ){
	//ถ้า มีข้อมูลตรงกับ ผู้ขาย
	$_SESSION['login'] = true;
	$_SESSION['user_type'] = 'seller';
	$_SESSION['user'] = $u2[0];
	header('location:seller.php');
}else{
	//ถ้าไม่มี ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า login.php
	$_SESSION['alert-message'] = "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง";
	$_SESSION['alert-class'] = "alert-danger"	;
	header('location:login.php');
}
?>