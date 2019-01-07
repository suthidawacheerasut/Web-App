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
  <title>หน้าแรก</title>
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" type="text/css" href="css/list.css">
  <link rel="stylesheet" type="text/css" href="css/menu_manager.css">
  <script type="text/javascript" src="function.js"></script>



     <!-- <link rel="stylesheet" type="text/css" href="css/font.css"> -->
  <!-- <script type="text/javascript" src="js/jquery.js"></script> -->

  


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

  <style type="text/css">
  #choose{

background-color:black;
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
    <div><img src="Pic/bg1.png" width="100%" height="350px"></div>
</div> 
</header> 

  <!-- ที่กดค้นหา -->
  <h1 class="h1">ค้นหาดารา</h1>
    <div class="flexsearch">
        <div class="flexsearch--wrapper">
            <form class="flexsearch--form" action="home_manager.php" method="post">
                <div class="flexsearch--input-wrapper">
                    <input class="flexsearch--input" type="search" name="search" placeholder="ชื่อหรือนามสกุล">
                </div>
                <input class="flexsearch--submit" type="submit" value="&#10140;"/>
            </form>
        </div>
    </div>
  <!-- end -->



<?php
function showorder(){
  $id_star_login = $_SESSION['Id_star_manager'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");


   
   
    $sql = "SELECT Distinct*
        FROM STAR LEFT OUTER JOIN PICTURE
          ON PICTURE.P_id_star= STAR.Id_star

        where S_id_star_manager = '$id_star_login'
        group By Id_star ASC
    "
    ;
    $result = $conn->query($sql);
 
    if($result->num_rows>0){

      
        while ($row=$result->fetch_assoc()) { 
          $id = $row['Id_star'];
          $age = $row['Age'];

          $gender = $row['Gender_star'];
          $weight = $row['Weight'];
          $height = $row['Height'];
          $sungkud = $row['Affiliation'];
          $Fname = $row['First_name_star'];
          $Lname = $row['Last_name_star'];
          $photo = $row['P_picture'];

          echo "<div class='col-md-6'>";
          echo "<figure class='snip0057 red'>";
          echo "<figcaption>";
          echo "<h2>$Fname $Lname</h2>";
          echo "<p>เพศ $gender อายุ $age<p>";
          echo "น้ำหนัก $weight ส่วนสูง $height";
          echo "<div class='icons'><a href=detailstar_manager.php?uid=$id target ='blank'>รายละเอียด</a></div>";

          echo "<div class='icons'><a href=edit_star.php?uid=$id>แก้ไขข้อมูล</a></div>";
          echo "<div class='icons'><a href=delete_star.php?uid=$id>ลบดารา</a></div>";
    
          echo "</figcaption>";
          echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';

          echo "</figure>";
          echo "</div>";           

      }
      echo "</div>";
    }else{
      echo "<center><h3>ไม่มีดาราในสังกัด<h3></center>";
    }
  $conn->close();
}

function search_name($search){

  $id_star_login = $_SESSION['Id_star_manager'];

     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "id615238_case";
  $conn=new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
  }
  $conn->set_charset("utf8");

  $sql = "SELECT Distinct*
        FROM STAR LEFT OUTER JOIN PICTURE
          ON PICTURE.P_id_star= STAR.Id_star
          WHERE (First_name_star LIKE '%$search%'  OR Last_name_star LIKE '%$search%')  AND S_id_star_manager = '$id_star_login'
             group By Id_star ASC
    "
    ;

   
    $result = $conn->query($sql);
    
    if($result->num_rows>0){
      while ($row=$result->fetch_assoc()) { 
        $id = $row['Id_star'];
        $age = $row['Age'];
        $gender = $row['Gender_star'];
        $weight = $row['Weight'];
        $height = $row['Height'];
        $sungkud = $row['Affiliation'];
        $Fname = $row['First_name_star'];
        $Lname = $row['Last_name_star'];
        $photo = $row['P_picture'];


        echo "<div class='col-md-6'>";
        echo "<figure class='snip0057 red'>";
        echo "<figcaption>";
        echo "<h2>$Fname $Lname</h2>";
        echo "<p>เพศ $gender อายุ $age<p>";
        echo "น้ำหนัก $weight ส่วนสูง $height";
        
        echo "<div class='icons'><a href=detailstar_manager.php?uid=$id target ='blank'>รายละเอียด</a></div>";
        echo "<div class='icons'><a href=edit_star.php?uid=$id>แก้ไขข้อมูล</a></div>";
        echo "<div class='icons'><a href=delete_star.php?uid=$id>ลบดารา</a></div>";


        echo "</figcaption>";
        echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
            
     
        echo "</figure>";
        echo "</div>";
      }
    }else{
       echo "<br><center><h3 >ไม่พบข้อมูล</h3></center>";
    }
  $conn->close();
}

echo "<br><br>";

if(isset($_POST['search'])){
  $search = $_POST['search'];
     echo "<h2>ผลการค้นหา: $search </h2><br>";
  search_name($search);//ไปฟังก์ชั่นค้นหา 
}else{
  showorder();//โชว์ปกติ
}
?>
<br><br>
</body>
</html>
