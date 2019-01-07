<?php
 include 'class/lottery.class.php'; 




if(isset($_GET['lottery'])){
	  $l = new lottery;

  $no = $_GET['lottery'];
  $d = $_GET['d'];
 	$re = $l->manageLottery('delete',$no,$d);
 	echo '<script>alert("ยืนยันการลบ")</script>';
 	if($re == 1){
 echo "<script>alert('ลบเรียบร้อย'); location.href='Managelottery.php';</script>";
 	}else{
        echo '<script>alert("ไม่สามารถลบได้")</script>';
		}
}

 ?>

										