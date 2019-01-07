<?php
 
 include 'class/member.class.php'; 

if(isset($_GET['user'])){
	  $m = new member;

  $key = $_GET['user'];
 	$re = $m->manageMember('delete',$key);
 	echo '<script>alert("ยืนยันการลบ")</script>';
 	if($re == 1){
 echo "<script>alert('ลบเรียบร้อย'); location.href='manageUser.php';</script>";
 	}else{
        echo '<script>alert("ไม่สามารถลบได้เนื่องจากลูกค้ามีรายการซื้อสินค้าอยู่");location.href="manageUser.php";</script>';
	}

 }


 ?>

												