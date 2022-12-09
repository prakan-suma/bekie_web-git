<?php
include_once "db.php";

//เตรียมคำสั่ง SQL
if (!empty($_FILES['picture']['name'])) {

	$ext = explode('.', $_FILES['picture']['name']);
	// md5() เป็น Function แบบ Hashing Algorithm คือการเข้ารหัสข้อมูลที่มีความยาว 128 bits คือไม่ว่าข้อความจะยาวหรือสั้นเพียงใด รหัสทมี่ถูกแปลกออกมาจะมีจำนวน 32 ตัวอักษรเท่ากันหมด 

	// 	strtotime() จะ return ค่า timestamp ของวันเวลา  รูปแบบของ string ที่ใส่เป็นพารามิเตอร์มีมากมายหลากหลาย

	// $_SERVER คือ ตัวแปร PHP ชนิดพิเศษ ที่ทำหน้าที่ต่าง ๆ เกี่ยวกับข้อมูลของเครื่อง Server ที่เราใช้ Run Script PHP ของเรา และ REMOTE_ADDR คือ แสดงค่า IP Address ของเครื่องที่เข้ามา

	// ตัวแปร = ย่ออักษร(รับค่าวันที่("เวลาตอนนี้")) . $_SERVER(แสดงค่า id เครื่อง) . 'จุด' $ext[นับ($ext) - 1 ]
	$pic_name = md5(strtotime("now") . $_SERVER['REMOTE_ADDR']) . '.' . $ext[count($ext) - 1 ];
	
	copy($_FILES['picture']['tmp_name'], "upload_picture/$pic_name");

	// ผลลัพ
	// string(13) "deptCover.jpg" 
	// array(2) { [0]=> string(9) "deptCover" [1]=> string(3) "jpg" }
	// string(36) "fa6e32652139b2098f240c4217145a96.jpg" 
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
if (save($sql)) {

	//ถ้าบันทึกได้ 
	header('location:product.php');
} else {

	//ถ้าบันทึกไม่ได้ ให้เก็บข้อความ error และ class css ที่จะใช้แสดง error ใน session และย้ายไปหน้า index.php
	$_SESSION['alert-message'] = "ไม่สามารถบันทึกข้อมูลได้";
	$_SESSION['alert-class'] = "alert-danger";

	//header('location:product_add.php');
	echo mysqli_error($conn);
}

?>