<?php
//เปิดใช้งานตัวแปร session
session_start();
//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
include "db.php";

//เตรียมคำสั่ง SQL
if( isset($_POST['id']) ){
	$ids = implode(',',$_POST['id']);
	$sql = "delete from product where id in ($ids) ";
	
	// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
	if( save($sql) ){
		//ถ้าบันทึกได้ 
		header('location:product.php');
	}else{
		//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
		$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
		$_SESSION['alert-class'] = "alert-danger"	;
		header('location:product.php');
	}
}else{
	$_SESSION['alert-message'] = "กรุณาเลือกรายการที่จะลบ";
	$_SESSION['alert-class'] = "alert-warning"	;
	header('location:product.php');
}
 


 

?>