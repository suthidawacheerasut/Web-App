<?php
 include 'class/orderline.class.php'; 
$order = new orderline;
$no = $_GET['id'];

$data = $order->printReceipt($no);
?>
<!DOCTYPE html>
<html>
<head>
	<title>พิมพ์ใบเสร็จรับเงิน</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body onLoad="window.print()"><br><br>
<div style="margin:50px; padding:50px;">
<center><h2>ใบเสร็จรับเงิน</h2></center>


<?php
		   foreach ($data as $read) {
		   	// <p>ชื่อ : สุทธิดา วชีระสุทธิ์</p>
          $orderno =  $read['orderno'];
         $fname = $read['fName'];
          $lname  =  $read['lName'];
          $address  =  $read['address'];
          $phone  =  $read['phone'];
          $date  =  $read['saledate'];
          $time  =  $read['saletime'];




        }
       

        echo "<center><h3>เลขที่ใบสั่งซื้อ : ".$orderno."</h3></center><br>";
     

        echo "<center><h4>วันเวลาที่ซื้อขาย : ".$date." ".$time."</h4></center><br>";

        echo "<h3>รายละเอียดลูกค้า</h3>";

        echo"<p>   <b>&nbsp;&nbsp;ชื่อ-นามสกุล :</b> ".$fname." ".$lname."<br><br> <b> &nbsp;&nbsp;ที่อยู่ : </b> ".$address." &nbsp;&nbsp;&nbsp;&nbsp;</br></br><b>&nbsp;&nbsp;เบอร์โทรศัพท์ : </b>".$phone."</p><br><br>";
        echo "<table class='table table-striped' width='200' height='50' >
        		<tr>
        		<td>อันดับ</td> <td>หมายเลขลอตเตอรี่</td> <td>จำนวน(ฉบับ)</td> <td>ราคา(บาท)</td>

        		</tr>";


        		$i=0;
           foreach ($data as $read) {
           	$totalp = $read['totalprice'];
          
           	$i++;

		  echo "<tr>
		  			<td>".$i."</td>

		  			<td>".$read['lotteryno']."</td>
		  			<td>".$read['quantity']."</td>
		  			<td>".($read['quantity']*80)."</td>




		        </tr>";


        }
       echo "</table><br><br>";
       echo"<p align = 'right'>ราคาสินค้าทั้งหมด  &nbsp;&nbsp;&nbsp;&nbsp;".($totalp-32)."&nbsp;&nbsp;&nbsp;&nbsp;  บาท</p>";
       echo"<p align = 'right'>ค่าขนส่ง  &nbsp;&nbsp;&nbsp;&nbsp;32 &nbsp;&nbsp;&nbsp;&nbsp; บาท</p>";
       echo"<p align = 'right'>ราคาสุทธิ &nbsp;&nbsp;&nbsp;&nbsp; ".$totalp."&nbsp;&nbsp;&nbsp;&nbsp;  บาท</p><br>";
       echo "<center><b>---ขอบคุณที่ใช้บริการ---</b></center>";
        echo "<center><h5>ร้านขายลอตเตอรี่จังหวัดเชียงใหม่</h4ช5></center><br>";







?>

</div>



</body>
</html>