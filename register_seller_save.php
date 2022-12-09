<?php

include "db.php";

//เตรียมคำสั่ง SQL
$sql = "insert into seller values (null,'{$_POST['username']}','{$_POST['password']}','{$_POST['shop_name']}','{$_POST['address']}',
'{$_POST['phone']}','{$_POST['contace_name']}','{$_POST['email']}','{$_POST['website']}')";

// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if( save($sql) ){
	//ถ้าบันทึกได้ ให้เก็บ login = true และ ข้อมูลของ user ไว้ใน session และย้ายไปหน้า index.php

	$_SESSION['login'] = true;
	$_SESSION['user_type'] = 'seller';
	$_SESSION['user'] = $_POST;
	$_SESSION['user']['id'] = mysqli_insert_id($link);
	header('location:index.php');
}else{
	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ erro และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
	$_SESSION['alert-class'] = "alert-danger"	;
	header('location:register_seller.php');
}
?>