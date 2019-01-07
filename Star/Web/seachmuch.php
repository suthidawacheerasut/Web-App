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
  <title>ค้นหาอย่างละเอียด</title>





  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
      <link href="CSS/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="CSS/search.css">
   <link rel="stylesheet" type="text/css" href="CSS/list.css">
  <link rel="stylesheet" type="text/css" href="CSS/menu.css">
  <script type="text/javascript" src="function.js"></script>


   <link rel="stylesheet" href="CSS/buttons.css">
    <script type="text/javascript" src="js/buttons.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>

<style >
h3{

color: #330066;
text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff2d95, 0 0 30px #ff2d95, 0 0 40px #ff2d95, 0 0 50px #ff2d95, 0 0 75px #ff2d95;
letter-spacing: 5px;
}


</style>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Cabin:700);

/* HTML5 Boilerplate radio-one hidden styles */
[type="radio"] {
  border: 0;
  height: 1px; margin: -1px;
  padding: 0;
  position: absolute;
  width: 0.5px;
}

/* One radio button per line */


/* the basic, unchecked style */
[type="radio"] + span:before {
  content: '';
  display: inline-block;
  width: 1em;
  height: 1em;
  vertical-align: -0.25em;
  border-radius: 1em;           /*hard border*/
  border: 0.125em solid #fff;
  box-shadow: 0 0 0 0.1em #000;   /*light shadow*/
  margin-right: 0.75em;
  transition: 0.5s ease all;    /*animation here*/
}

/* the checked style using the :checked pseudo class */
[type="radio"]:checked + span:before {
  background:#FFCCFF;
  box-shadow: 0 0 0 0.18em #ccc;
}
label{
  font-size: 18px;
}


/* body attributes here */

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
<!-- STYLE  SECTION -->





    


  <!--tab-->


<br>




<form name='show' method='POST'  action='seachmuch.php'>






<center><label for="age">เพศ </label>&nbsp;

<label for="radio-one">
<input type="radio" value="ชาย" name="gender" id="radio-one" checked> <span>ชาย</span>
</label>

<label for="radio-two">
<input type="radio" value="หญิง" name="gender" id="radio-two"> <span>หญิง</span>
</label>

</center>
<br>


<center><div class="clear"></div>
        <div class="container">
            <label for="age">อายุ&nbsp;</label>
            <select name ="ageone" class="btn btn-info" >
            <?php
            for($i=1;$i<=100;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select>
        

         <label for="age">ถึง&nbsp;</label>
        
           
            <select name="agetwo" class="btn btn-info" >
             
                 <?php
            for($i=1;$i<=100;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select>
          </div></div>


          <center><br>
            <center><div class="clear"></div>
        <div class="container">
            <label for="height">ส่วนสูง&nbsp;</label>
            <select name="heightone" class="btn btn-warning" >
             
          
                 <?php
            for($i=30;$i<=250;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select>
        

                <label for="age">ถึง&nbsp;</label>
           
            <select name="heighttwo" class="btn btn-warning">
             
                  <?php
            for($i=30;$i<=250;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select>
          </div></div>


          <center><br>


            <center><div class="clear"></div>
        <div class="container">
            <label for="weight">น้ำหนัก&nbsp;</label>
            <select name ="weightone" class="btn btn-info" >
             
                <?php
            for($i=2;$i<=200;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select>
        

               <label for="age">ถึง&nbsp;</label>
        
           
            <select name="weighttwo" class="btn btn-info" >
             
                       
                <?php
            for($i=2;$i<=200;$i++){
                echo "<option value='$i' style='background-color: #F2A4F2;color: #000000;'>$i</option>";
            }
             
              ?>
               
            </select></center>
          </div></div><br>
<?php


     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
  $conn->set_charset("utf8");


   
   
$sql = "SELECT distinct ability
        FROM ABILITY
      




     
     
    "
    ;

   
    $result = $conn->query($sql);
      
  

 
        if($result->num_rows>0){

           echo "<center><label for='age'>ความสามารถ&nbsp; <select name='ability' class='btn btn-warning'>";
              echo"<option value='ทุกความสามารถ' style='background-color: #F2A4F2;color: #000000;'>ทุกความสามารถ</option>";
            while ($row=$result->fetch_assoc()) { 
          
                  
                    $ability = $row['ability'];
                

                 
                    echo"<option value='$ability' style='background-color: #F2A4F2;color: #000000;'>$ability</option>";
                  

              
                 
                
              }

                  echo"<option value='อื่นๆ' style='background-color: #F2A4F2;color: #000000;'>ความสามารถอื่นๆ</option>";
                 
               echo"</select></center>";
              }?>





<br>
<?php


     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
  $conn->set_charset("utf8");


   
   
$sql = "SELECT distinct Affiliation
        FROM STAR
  




     
     
    "
    ;

   
    $result = $conn->query($sql);
      
  

 
        if($result->num_rows>0){

           echo "<center><label for='age'>สังกัด&nbsp; <select name='affiliation' class='btn btn-info'>";
                echo"<option value='ทุกสังกัด' style='background-color: #F2A4F2;color: #000000;'>ทุกสังกัด</option>";
            while ($row=$result->fetch_assoc()) { 
          
                  
                    $sungkud = $row['Affiliation'];
                

                   if($sungkud!=NULL){

              echo"<option value='$sungkud' style='background-color: #F2A4F2;color: #000000;'>$sungkud</option>";
                 }
                
              }
            
          
               echo"</select></center>";
              }
                   

               echo "<br><center><label for='age'>ผลงาน&nbsp; <select name='port' class='btn btn-warning'>";
             echo"<option value='ไม่มีผลงาน' style='background-color: #F2A4F2;color: #000000;'>ไม่จำเป็นต้องมีผลงาน</option>";
                echo"<option value='มีผลงาน' style='background-color: #F2A4F2;color: #000000;'>จำเป็นต้องมีผลงาน</option>";
                
            

             
            
          
               echo"</select></center><br>";
              

                   echo "<center><label for='age'>รางวัล&nbsp; <select name='award' class='btn btn-info'>";
              echo"<option value='ไม่มีรางวัล' style='background-color: #F2A4F2;color: #000000;'>ไม่จำเป็นต้องมีรางวัล</option>";
                echo"<option value='มีรางวัล' style='background-color: #F2A4F2;color: #000000;'>จำเป็นต้องมีรางวัล</option>";
            

            
                   
             
            
          
               echo"</select></center><br>";




echo "<br><center><input type='submit'  value='ค้นหาอย่างละเอียด'  class='button button-pill button-flat-action'> 
<input type='reset'  value='ล้างข้อมูล' class='button button-pill button-flat-highlight'></center></form><br><br><br>";


  

function searchdetail($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio){
     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";
    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }

    $conn->set_charset("utf8");

if($award=='มีรางวัล' && $portfolio=='มีผลงาน'){
  $sql1 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation' AND AWARDS.Id_awards IS NOT NULL AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
          $result = $conn->query($sql1);
}else if($portfolio=='มีผลงาน' && $ability== 'ไม่มีรางวัล'){
  $sql2 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation'  AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
          $result = $conn->query($sql2);

}else if($award=='มีรางวัล'&&$portfolio=='ไม่มีผลงาน' ){
  $sql3 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation' AND AWARDS.Id_awards IS NOT NULL 
          group by Id_star ASC";
          $result = $conn->query($sql3);
       

}

else{
  $sql4 = "SELECT distinct *
        FROM ABILITY INNER JOIN (STAR LEFT OUTER JOIN PICTURE ON PICTURE.P_id_star=STAR.Id_star)
          ON ABILITY.ab_id_star= STAR.Id_star
           WHERE ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation'
          group by Id_star ASC";
    $result = $conn->query($sql4);

}
    
    








        

 
        if($result->num_rows>0){
          
            while ($row=$result->fetch_assoc()) { 
          
               $id = $row['Id_star'];
                    $age = $row['Age'];
                    $gender = $row['Gender_star'];
                    $weight = $row['Weight'];
                    $height = $row['Height'];
                    $sungkud = $row['Affiliation'];
                    $ability2 = $row['ability'];
                    $Fname = $row['First_name_star'];
                    $Lname = $row['Last_name_star'];
                    $affiliation = $row['Affiliation'];
                    $photo = $row['P_picture'];
              


               
          
             
                  
                echo "<div class='col-md-6'>";
                             echo "<figure class='snip0057 red'>";
                  echo "<figcaption>";
                    echo "<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;  $Fname $Lname</h2>";
                 echo "<p>เพศ $gender อายุ $age<p>";
                 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;น้ำหนัก $weight ส่วนสูง $height<br>";
                 
   echo "<div class='icons'><a href=detailstar.php?uid=$id target ='blank'>รายละเอียด</a></div>";
      
                  echo "</figcaption>";
                  echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                            echo '<div class="position"></div>';
                  
                echo "</figure>";
                echo "</div>";

      ?>
    </li>
  </ul>

</nav>
<?php

          
               
            }
        }else{
    echo "<br><center><h3 >ไม่พบข้อมูล</h3></center><br><br>";
        }
   



      
        

    $conn->close();


}

function searchdetailabilitynull($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio){

     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";
    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }

    $conn->set_charset("utf8");

if($award=='มีรางวัล' && $portfolio=='มีผลงาน' && $ability=="อื่นๆ"&&$affiliation=="ทุกสังกัด"){
  $sql1 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE   STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2  AND AWARDS.Id_awards IS NOT NULL AND PORTFOLIO.Id_portfolio IS NOT NULL AND ABILITY.ability IS NULL
          group by Id_star ASC";
          $result = $conn->query($sql1);
}else if($portfolio=='มีผลงาน' && $award== 'ไม่มีรางวัล' AND  $ability=="อื่นๆ"&&$affiliation=="ทุกสังกัด"){
  $sql2 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2  AND PORTFOLIO.Id_portfolio IS NOT NULL AND ABILITY.ability IS NULL
          group by Id_star ASC";
          $result = $conn->query($sql2);

}else if($award=='มีรางวัล'&&$portfolio=='ไม่มีผลงาน' AND  $ability=="อื่นๆ"&&$affiliation=="ทุกสังกัด"){
  $sql3 = "SELECT distinct *
           FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2 AND AWARDS.Id_awards IS NOT NULL AND ABILITY.ability IS NULL
          group by Id_star ASC";
          $result = $conn->query($sql3);
       
       
}

else if($portfolio=='ไม่มีผลงาน' && $award== 'ไม่มีรางวัล' AND  $ability=="อื่นๆ"&&$affiliation=="ทุกสังกัด"){
  $sql4 = "SELECT distinct *
           FROM STAR
   
  
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
 
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1
            AND STAR.Height<=$height2 AND  ABILITY.ability IS NULL
          group by Id_star ASC";
          $result = $conn->query($sql4);


    }else{
      echo "55";
    }
    





        

 
        if($result->num_rows>0){
          
            while ($row=$result->fetch_assoc()) { 
          
                $id = $row['Id_star'];
                    $age = $row['Age'];
                    $gender = $row['Gender_star'];
                    $weight = $row['Weight'];
                    $height = $row['Height'];
                    $sungkud = $row['Affiliation'];
                    $ability2 = $row['ability'];
                    $Fname = $row['First_name_star'];
                    $Lname = $row['Last_name_star'];
                    $affiliation = $row['Affiliation'];
                    $photo = $row['P_picture'];
              


           

                  echo "<div class='col-md-6'>";
                             echo "<figure class='snip0057 red'>";
                  echo "<figcaption>";
                    echo "<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;  $Fname $Lname</h2>";
                 echo "<p>เพศ $gender อายุ $age<p>";
                 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;น้ำหนัก $weight ส่วนสูง $height<br>";
                 
   echo "<div class='icons'><a href=detailstar.php?uid=$id target ='blank'>รายละเอียด</a></div>";
      
                  echo "</figcaption>";
                  echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                            echo '<div class="position"></div>';
                  
                echo "</figure>";
                echo "</div>";

         

            
      ?>
    </li>
  </ul>

</nav>
<?php

          
               
            }
        }else{
        echo "<br><center><h3 >ไม่พบข้อมูล</h3></center><br><br>";
        }
   



      
        

    $conn->close();


}


function searchdetailfree($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio){
     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";
    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }

    $conn->set_charset("utf8");
    if($affiliation=="ทุกสังกัด"&&$ability=="ทุกความสามารถ" AND $award=='มีรางวัล' && $portfolio=='มีผลงาน'){
       $sql1 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE   STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2
            AND STAR.Height>=$height1 AND STAR.Height<=$height2  AND AWARDS.Id_awards IS NOT NULL AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql1);
        }else if($affiliation=="ทุกสังกัด"  AND $award=='มีรางวัล' && $portfolio=='มีผลงาน' ){
          $sql2 = "SELECT distinct *
        FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND
            STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2  
            AND AWARDS.Id_awards IS NOT NULL AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql2);

        }else if($ability=="ทุกความสามารถ" AND $award=='มีรางวัล' && $portfolio=='มีผลงาน'){
          $sql3 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 
           AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation'  AND AWARDS.Id_awards IS NOT NULL AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql3);






          
        }else  if($affiliation=="ทุกสังกัด"&&$ability=="ทุกความสามารถ" AND $award=='ไม่มีรางวัล' && $portfolio=='มีผลงาน'){
       $sql4 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE   STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1
            AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2   AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql4);
          }
        else if($affiliation=="ทุกสังกัด"  AND $award=='ไม่มีรางวัล' && $portfolio=='มีผลงาน'  ){
          $sql5 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 
           AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql5);

        }else if($ability=="ทุกความสามารถ" AND $award=='ไม่มีรางวัล' && $portfolio=='มีผลงาน' ){
          $sql6 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 
           AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation' AND PORTFOLIO.Id_portfolio IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql6);

          
        


        }else  if($affiliation=="ทุกสังกัด"&&$ability=="ทุกความสามารถ" AND $award=='มีรางวัล'&&$portfolio=='ไม่มีผลงาน'){
       $sql7 = "SELECT distinct *
        FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE   STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1  AND AWARDS.Id_awards IS NOT NULL
           AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 
          group by Id_star ASC";
            $result = $conn->query($sql7);
          }
        else if($affiliation=="ทุกสังกัด"  AND $award=='มีรางวัล'&&$portfolio=='ไม่มีผลงาน' ){
          $sql8 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 
           AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2  AND AWARDS.Id_awards IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql8);

        }else if($ability=="ทุกความสามารถ" AND $award=='มีรางวัล'&&$portfolio=='ไม่มีผลงาน' ){
          $sql9 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1 
           AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation'  AND AWARDS.Id_awards IS NOT NULL
          group by Id_star ASC";
            $result = $conn->query($sql9);

          
        


   


   
           }else  if($affiliation=="ทุกสังกัด"&&$ability=="ทุกความสามารถ" AND $award=='ไม่มีรางวัล'&&$portfolio=='ไม่มีผลงาน'){
       $sql10 = "SELECT distinct *
        FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE   STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1
            AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 
          group by Id_star ASC";
            $result = $conn->query($sql10);
          }
        else if($affiliation=="ทุกสังกัด"  AND $award=='ไม่มีรางวัล'&&$portfolio=='ไม่มีผลงาน' ){
          $sql11 = "SELECT distinct *
         FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  ABILITY.ability =  '$ability' AND STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 
           AND STAR.Weight>=$weight1 AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 
          group by Id_star ASC";
            $result = $conn->query($sql11);

        }else if($ability=="ทุกความสามารถ" AND $award=='ไม่มีรางวัล'&&$portfolio=='ไม่มีผลงาน' ){
          $sql12 = "SELECT distinct *
        FROM STAR
   
   LEFT OUTER JOIN AWARDS ON (AWARDS.Aw_id_star = STAR.Id_star) 
   LEFT OUTER JOIN ABILITY ON (ABILITY.Ab_id_star = STAR.Id_star)
   LEFT OUTER JOIN PORTFOLIO ON (PORTFOLIO.Po_id_star = STAR.Id_star)
   LEFT OUTER JOIN PICTURE  ON (PICTURE.P_id_star = STAR.Id_star)
           WHERE  STAR.Gender_star = '$gender' AND STAR.Age>=$age1 AND STAR.Age<=$age2 AND STAR.Weight>=$weight1
            AND STAR.Weight<=$weight2 AND STAR.Height>=$height1 AND STAR.Height<=$height2 AND STAR.Affiliation='$affiliation' 
          group by Id_star ASC";
            $result = $conn->query($sql12);

          
        }
 
        if($result ->num_rows>0){
          
            while ($row=$result->fetch_assoc()) { 
          
              $id = $row['Id_star'];
                    $age = $row['Age'];
                    $gender = $row['Gender_star'];
                    $weight = $row['Weight'];
                    $height = $row['Height'];
                    $sungkud = $row['Affiliation'];
                    $ability2 = $row['ability'];
                    $Fname = $row['First_name_star'];
                    $Lname = $row['Last_name_star'];
                    $affiliation = $row['Affiliation'];
                    $photo = $row['P_picture'];
              


           

                  echo "<div class='col-md-6'>";
                             echo "<figure class='snip0057 red'>";
                  echo "<figcaption>";
                    echo "<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; $Fname $Lname</h2>";
                 echo "<p>เพศ $gender อายุ $age<p>";
                 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;น้ำหนัก $weight ส่วนสูง $height<br>";
                 
  echo "<div class='icons'><a href=detailstar.php?uid=$id target ='blank'>รายละเอียด</a></div>";
      
                  echo "</figcaption>";
                  echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                            echo '<div class="position"></div>';
                  
                echo "</figure>";
                echo "</div>";



            
      ?>
    </li>
  </ul>

</nav>
<?php

          
               
            }
        }else{
          echo "<br><center><h3 >ไม่พบข้อมูล</h3></center><br><br>";
        }
   



      
        

    $conn->close();


}


if(isset($_POST['agetwo'],$_POST['gender'],$_POST['weighttwo'],$_POST['heighttwo'],$_POST['affiliation'],$_POST['ability'],$_POST['award'],$_POST['port'])){
 
 $age1 = $_POST['ageone'];
  $age2 = $_POST['agetwo'];
$gender = $_POST['gender'];
$weight1 = $_POST['weightone'];
$weight2 = $_POST['weighttwo'];

$height1 = $_POST['heightone'];
$height2 = $_POST['heighttwo'];
  $ability = $_POST['ability'];
  $affiliation = $_POST['affiliation'];
  $award = $_POST['award'];
  $portfolio = $_POST['port'];



  if($ability == "อื่นๆ"){
    searchdetailabilitynull($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio);

  }else if($affiliation=="ทุกสังกัด"||$ability=="ทุกความสามารถ"){
    searchdetailfree($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio);

  }else{
    searchdetail($age1,$age2,$gender,$weight1,$weight2,$height1,$height2,$ability,$affiliation,$award,$portfolio);
  
  }



}









?>



 


      



    
















