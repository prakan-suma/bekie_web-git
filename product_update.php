<?php
//เปิดใช้งานตัวแปร session
session_start();
//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
include "db.php";


//เตรียมคำสั่ง SQL
$change_picture = "";
 
if( !empty($_FILES['picture']['name']) ){
	$ext = explode('.' , $_FILES['picture']['name'] );
	$pic_name = md5(strtotime("now").$_SERVER['REMOTE_ADDR']).'.'.$ext[ count($ext)-1 ] ;
	copy($_FILES['picture']['tmp_name'],"upload_picture/$pic_name");
	$change_picture = "picture = '$pic_name', ";
}

$sql = "update product set name = '{$_POST['name']}',
						   price = '{$_POST['price']}',
						   $change_picture
						   detail = '{$_POST['detail']}',
						   box_width = '{$_POST['box_width']}',
						   box_height = '{$_POST['box_height']}',
						   box_long = '{$_POST['box_long']}',
						   box_weight = '{$_POST['box_weight']}'
					   where id = '{$_POST['id']}'
	   ";
 
// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if( save($sql) ){
	//ถ้าบันทึกได้ 
	header('location:product.php');
}else{
	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
	$_SESSION['alert-class'] = "alert-danger"	;
	header('location:product_edit.php');
}
?>