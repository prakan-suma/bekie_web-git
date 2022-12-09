<?php
//เปิดใช้งานตัวแปร session
session_start();
//เรียกใช้ไฟล์ติดต่อฐานข้อมูล
include "db.php";

//เตรียมคำสั่ง SQL

if(!empty($_FILES['picture']['name'])){
	$ext = explode('.' , $_FILES['picture']['name'] );
	$pic_name = md5(strtotime("now").$_SERVER['REMOTE_ADDR']).'.'.$ext[ count($ext)-1 ] ;
	copy($_FILES['picture']['tmp_name'],"upload_picture/$pic_name");
}

$sql = "insert into product values 
		(
			null,
			'{$_POST['name']}',
			'{$_POST['price']}',
			'$pic_name',
			'{$_POST['detail']}',
			'{$_POST['box_width']}',
			'{$_POST['box_height']}',
			'{$_POST['box_long']}',
			'{$_POST['box_weight']}',
			'{$_SESSION['user']['id']}'
	    )";
 
// ประมวลผลคำสั่ง SQL และตรวจสอบการทำงาน
if( save($sql) ){
	//ถ้าบันทึกได้ 
	header('location:product.php');
}else{
	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
	$_SESSION['alert-class'] = "alert-danger"	;
	//header('location:product_add.php');
	echo mysqli_error($link);
}
?>