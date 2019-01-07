<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>ข้อมูลดารา</title>

  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/profile.css">
    <link rel="stylesheet" type="text/css" href="CSS/star.css">

  <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
  <script type="text/javascript" src="function.js"></script>
      <link rel="stylesheet" href="CSS/tooplate-style.css">  






<style>
h3{

color: #330066;
text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff2d95, 0 0 30px #ff2d95, 0 0 40px #ff2d95, 0 0 50px #ff2d95, 0 0 75px #ff2d95;
letter-spacing: 5px;
}
.font.line{
  padding: 2cm 3cm;

}

</style>


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
</head>
<body >
<div id="wrap" class="menu_manager">
    <header>
        <div class="inner relative">
            <a class="logo" href="home_manager.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li class="current-menu-item"><a href="home_manager.php"><b>หน้าเเรก</b></a></li>
                    <li><a href="addstar_manager.php"><b>เพิ่มดาราในสังกัด</b></a></li>
                    <li><a href="setting_manager.php"><b>ตั้งค่าบัญชีผู้ใช้</b></a></li>
                    <li class="parent">
                        <a href="#"><b>รายการจองคิว</b></a>
                        <ul class="sub-menu">
                            <li><a href="queue_star.php">คิวที่รอการยืนยัน</a></li>
                            <li><a href="queue_confirm.php">คิวที่รับการยืนยัน</a></li>
                        </ul>
                    </li>
                    <?php
                    echo '<li><a href="login.php?action=logout"><b>ออกจากระบบ</b></a></li>';
                    ?>
                </ul>
            </nav>
        </div>
    </header>  

 
<?php

   

     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";

    $id=$_GET['uid'];

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
       $conn->set_charset("utf8");
    $sql = "SELECT *
   FROM STAR
   LEFT OUTER JOIN JOBTYPE ON (JOBTYPE.W_id_star = STAR.Id_star)
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN STAR_MANAGER ON (STAR_MANAGER.Id_star_manager= STAR.S_id_star_manager)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
   where Id_star = '$id'";
    $result = $conn->query($sql);


    
    $row=$result->fetch_assoc();

        $id = $row['Id_star'];
                    $age = $row['Age'];
                    $gender = $row['Gender_star'];
                    $weight = $row['Weight'];
                    $height = $row['Height'];
                    $sungkud = $row['Affiliation'];
                    $fname = $row['First_name_star'];
                    $lname = $row['Last_name_star'];
                    $place = $row['Place_of_birth'];
                 
                    $photo1 = $row['P_picture'];
                   
                    $Fname_manager = $row['First_name_star_manager'];
                    $Lname_manager = $row['Last_name_star_manager'];
                    $phone_manager = $row['Phone_star_manager'];
                  $gender_manager = $row['Gender_star_manager'];

                  ?>
                  <center>
      <div class="under-line"></div>

                    <?php
                    echo '<br><br><div class="image"><img src="data:image/jpeg;base64,'.base64_encode($photo1 ).'" height="500" width="500" class="img-thumnail" /> </div>';
                    ?><br><br>

                          
                        <h2><?php echo "<font size='6' class = 'line'>$fname $lname <font>";?></h2>
                       <p><?php 
                             echo "<font size='4'>เพศ: $gender อายุ: $age บ้านเกิด: $place <br>
                             น้ำหนัก: $weight ส่วนสูง: $height สังกัด: $sungkud<br></font>";

                             ?>
                             


                        






                             <?php
                             
                          $sql8 = "SELECT *
                           FROM ABILITY
                        WHERE Ab_id_star = '$id'
                                   ";

                     $result8 = $conn->query($sql8);


    
                     if ($result8->num_rows > 0) { //begin if
          echo" <br><u><font size='5' class = 'head'>ความสามารถ:</u><br>";
                             while($row=$result8->fetch_assoc()){
                              $ability = $row['ability'];
               

                    echo "<font size='4'> -$ability <br>
                             ";
                                       

                                }}
                                echo"<br>";
                                ?>


                            

                             <?php
                             
                          $sql4 = "SELECT *
                           FROM PORTFOLIO
                        WHERE Po_id_star = '$id'
                                   ";

                     $result4 = $conn->query($sql4);


    
                     if ($result4->num_rows > 0) { //begin if
          echo" <br><u><font size='5' class = 'head'>ผลงาน:</u>";
                             while($row=$result4->fetch_assoc()){
                              $year = $row['Year_portfolio'];
                    $Name_po = $row['Name_portfolio'];
                    $category_po = $row['Category_portfolio'];
                    $character = $row['Character_po'];

                    echo "<br><font size='4'> - $category_po $Name_po 
                               ปี: $year 
                               บทบาท: $character</font>";
                                       

                                }
                        }
                           


                               $sql5 = "SELECT *
                           FROM AWARDS
                        WHERE Aw_id_star = '$id'
                                   ";

                     $result5 = $conn->query($sql5);


    
                     if ($result5->num_rows > 0) { //begin if
          echo"<br><br><u><font size='5' class = 'head'>รางวัลที่เคยได้รับ:</u><br>";
                             while($row=$result5->fetch_assoc()){
                        $name_a = $row['Name_award'];
                    $branch = $row['Branch_award'];
                    $year_a = $row['Year_award'];
                    $name_no_a = $row['Name_award_nominations'];
                
                        echo " <font size='4'>-ชื่อรางวัล: $name_a
                        สาขา: $branch 
                             ปี: $year_a 
                             ผลงานที่ได้รับรางวัล: $name_no_a<br></font>" ;
                                       

                                }
                        }
                           





                        

                            

                            $sql3 = "SELECT *
                    FROM JOBTYPE
                    WHERE W_id_star = '$id'
                 ";

                     $result3 = $conn->query($sql3);


    
                     if ($result3->num_rows > 0) { //begin if
                  echo" <br><u><font size='5' class = 'head'>ค่าจ้างตามงานที่รับได้:</u><br>";
                             while($row=$result3->fetch_assoc()){
                                $name_j = $row['Name_jobtype'];
                                 $min_pi = $row['Min_slave_price'];
                    $max_pi = $row['Max_slave_price'];
                    
                    echo "<font size='4'>-$name_j $min_pi ถึง $max_pi บาท <br></font>";
                                       

                                }
                        }



                   


                            echo "
                        
                            <br><br><u><font size='5' class = 'head'>ติดต่อผู้จัดการ:</u> <font size='4'>คุณ $Fname_manager $Lname_manager  <br> 
                             เพศ: $gender_manager  เบอร์โทร: $phone_manager</font>
                        ";
                        ?>

                 
                     </figure>
            <br><br><center>



               
          

   <?php
            $sql2 = "SELECT P_picture 
                    FROM STAR,PICTURE
                    WHERE STAR.Id_star = PICTURE.P_id_star  AND P_id_star = $id ";

                     $result = $conn->query($sql2);


    
   if ($result->num_rows > 0) { //begin if
          
        while($row=$result->fetch_assoc()){

                 $photo = $row['P_picture'];
                 if($photo!=$photo1){
                   echo '                     
                                  <a href="data:image/jpeg;base64,'.base64_encode($photo ).'"><img src="data:image/jpeg;base64,'.base64_encode($photo ).'" height="200" width="200" "/></a>';
         

                 }
         


            }
        }



                   
            ?>        

</center>
               
</div><br>

                  <?php





    $conn->close();
?>
