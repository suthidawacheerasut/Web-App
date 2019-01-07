<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_customers'];
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>ค้นหาจากราคา</title>






  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
      <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/search.css">
   <link rel="stylesheet" type="text/css" href="css/list.css">
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <script type="text/javascript" src="function.js"></script>


   <link rel="stylesheet" href="css/buttons.css">
    <script type="text/javascript" src="js/buttons.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>







<style>
h3{

color: #330066;
text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff2d95, 0 0 30px #ff2d95, 0 0 40px #ff2d95, 0 0 50px #ff2d95, 0 0 75px #ff2d95;
letter-spacing: 5px;
}
h2{
  font-size: 20px;
 padding: 0cm 6cm ;

}
</style>


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
</head>
<body >
<div id="wrap">
    <header>
        <div class="inner relative">
            <a class="logo" href="ordertime.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="ordertime.php"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li><a href="ordertime.php"><b>หน้าหลัก</b></a></li>
                    <li class="parent">
                        <a href="#"><b>ค้นหา</b></a>
                        <ul class="sub-menu">
                        
                            <li><a href="price.php"><i class="icon-wrench"></i>ค้นหาจากราคา</a></li>
                            <li><a href="seachmuch.php"><i class="icon-credit-card"></i>ค้นหาแบบละเอียด</a></li>
                        </ul>
                    </li>
                    <li ><a href="profile.php"><b>ข้อมูลส่วนตัว</b></a></li>
                    <li class="parent">
                        <a href="#"><b>การแจ้งเตือน</b></a>
                        <ul class="sub-menu">
                            <li><a href="list.php">รายการจองคิว</a></li>
                            <li><a href="status.php">สถานะการจอง</a></li>
                        </ul>
                    </li>
                    <li><a href="login.php"><b>ออกจากระบบ</b></a></li>
                </ul>
            </nav>
        </div>
    </header>  
    <div><img src="Pic/bg1.png" width="100%" height="350px"></div>



<form name="from" method="POST" action="price.php">
<br><br>
<center><select name="type" class="btn btn-default">
<option value="choice" style="background-color: #F2A4F2;color: #000000;">ประเภทงาน</option>
  <option value="ละคร ต่อ 1 ตอน" style="background-color: #F2A4F2;color: #000000;">ละคร ต่อ 1 ตอน</option>
  <option value="เดินเเบบ 1 ครั้ง" style="background-color: #F2A4F2;color: #000000;">เดินแบบ 1 ครั้ง</option>
       <option value="ถ่ายเเบบ 1 งาน" style="background-color: #F2A4F2;color: #000000;">ถ่ายแบบ 1 งาน</option>
       <option value="พิธีกร 1 งาน" style="background-color: #F2A4F2;color: #000000;">พิธีกร 1 งาน</option>
         <option value="พิธีกรประจำ" style="background-color: #F2A4F2;color: #000000;">พิธีกรประจำ</option>
           <option value="โฆษณา 1 ชิ้น" style="background-color: #F2A4F2;color: #000000;">โฆษณา 1 ชิ้น</option>
  <option value="ภาพยนตร์ 1 เรื่อง" style="background-color: #F2A4F2;color: #000000;">ภาพยนตร์ 1 เรื่อง</option>
  <option value="ร้องเพลง 1 เพลง" style="background-color: #F2A4F2;color: #000000;">ร้องเพลง 1 เพลง</option>
    <option value="ร้องเพลง 1 อัลบั้ม" style="background-color: #F2A4F2;color: #000000;">ร้องเพลง 1 อัลบั้ม</option>


  
</select>
&nbsp;


  <input type="submit"  value="ค้นหา" class="button button-pill button-flat-primary"></center>
  </form>
 


<?php

function multiple_table($type){

     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
  $conn->set_charset("utf8");


   
   
$sql = "SELECT distinct *
        FROM JOBTYPE INNER JOIN (STAR LEFT OUTER JOIN PICTURE ON PICTURE.P_id_star=STAR.Id_star)
          ON JOBTYPE.W_id_star= STAR.Id_star
              where Name_jobtype = '$type' 
              Group by Id_star

     order by Min_slave_price
        


     
     
    "
    ;

   
    $result = $conn->query($sql);
      
  

 
        if($result->num_rows>0){


          
            while ($row=$result->fetch_assoc()) { 
          
                   $id = $row['W_id_star'];
                 
               
                    $Fname = $row['First_name_star'];
                     $Lname = $row['Last_name_star'];

                    $type_=$row['Name_jobtype'];
                    $price = $row['Min_slave_price'];
                    $photo = $row['P_picture'];
             
                    


                         

                  
                    echo "<div class='col-md-6'>";
                echo "<figure class='snip0057 red'>";
                  echo "<figcaption>";
                    echo "<h2> $Fname $Lname</h2>";
                    echo "<p>ค่าจ้าง $price บาท</p>";
     echo "<div class='icons'><a href=detailstar.php?uid=$id target ='blank'>รายละเอียด</a></div>";
     
                  echo "</figcaption>";
              echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                        echo '<div class="position"></div>';
                echo "</figure>";
                echo "</div>";
            
       


            

           }
        }else{
           echo "<br><center><h3 >ไม่พบข้อมูล</h3></center>";
        }
      
        

    $conn->close();
 


}

echo "<br><br>";



if(isset($_POST['type'])){
  $type = $_POST['type'];
   echo "<h2>ผลการค้นหา: $type </h2><br>";

multiple_table($type);


}


?>



<br><br>


  
</body></html>
