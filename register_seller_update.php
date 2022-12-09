<?php
//เปิดใช้งานตัวแปร session
session_start();
//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
include "db.php";

//เตรียมคำสั่ง SQL
$sql = "update seller set username = '{$_POST['username']}',
						  password = '{$_POST['password']}',
						  shop_name = '{$_POST['shop_name']}',
						  address = '{$_POST['address']}',
						  phone = '{$_POST['phone']}',
						  contace_name = '{$_POST['contace_name']}',
						  email = '{$_POST['email']}',
						  website = '{$_POST['website']}'
				      where id = '{$_POST['id']}'";

// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if( save($sql) ){
	//ถ้าบันทึกได้  
	$_SESSION['user'] = $_POST;
	header('location:shop.php');
}else{
	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ erro และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า shop_edit.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
	$_SESSION['alert-class'] = "alert-danger"	;
	header('location:shop_edit.php');
}
?>