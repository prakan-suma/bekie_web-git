<?php

//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
require_once "db.php";

//เตรียมคำสั่ง SQL
$sql = "insert into customer values (null,'{$_POST['username']}','{$_POST['password']}','{$_POST['first_name']}','{$_POST['last_name']}',
'{$_POST['phone']}','{$_POST['email']}','customer');";

// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if (save($sql)) {

	//ถ้าบันทึกได้ ให้เก็บ login = true และ ข้อมูลของ user ไว้ใน session และย้ายไปหน้า index.php
	$_SESSION['login'] = true;
	$_SESSION['user'] = $_POST;
	$_SESSION['user_type'] = 'customer';
	$_SESSION['user']['id'] = mysqli_insert_id($conn);
	header('location:index.php');

} elseif (save($sql) == false) {
	
	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้ " . $sql;
	$_SESSION['alert-class'] = "alert-danger";
	header('location:register_customer.php');
}
?>
