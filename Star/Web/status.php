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
  <title>หน้าแรก</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" type="text/css" href="css/list.css">
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <script type="text/javascript" src="function.js"></script>
    
</head>
<body>
<div id="wrap">
    <header>
        <div class="inner relative">
            <a class="logo" href="index.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="index.php"><i class="icon-reorder"></i></a>
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
                    <li class="parent current-menu-item">
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
            <!-- <div class="under"><img src="Pic/bg1.png" width="100%" height="350px"></div> -->
            <div class="under-line"></div>

     <h1 class="h1">ค้นหาดารา</h1>
    <div class="flexsearch">
        <div class="flexsearch--wrapper">
            <form class="flexsearch--form" action="status.php" method="post">
                <div class="flexsearch--input-wrapper">
                    <input class="flexsearch--input" type="search" name="search" placeholder="ชื่อหรือนามสกุล">
                </div>
                <input class="flexsearch--submit" type="submit" value="&#10140;"/>
            </form>
        </div>
    </div><br>  <br>
                        
   <style type="text/css">
h2{
  font-size: 20px;
 padding: 0cm 6cm ;

}
   </style>        
 <div>
<?php
function show(){

           
               
                $id_customers = $_SESSION['Id_customers'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "id615238_case";
                // $servername = "localhost";
                // $username = "root";
                // $password = "";
                // $dbname = "star";

                $conn=new mysqli($servername,$username,$password,$dbname);

                if($conn->connect_error){
                    die("connection failed:".$conn->connect_error);
                }
                $conn->set_charset("utf8");


               
               
                $sql = "SELECT distinct*
                 FROM star LEFT OUTER JOIN picture ON Id_star = P_id_star JOIN reserve ON R_id_customer = '$id_customers' and R_id_star = Id_star and State_reserve != 0
                  group By Id_star ASC";

                $result = $conn->query($sql);
             
                if($result->num_rows>0){

                  
                    while ($row=$result->fetch_assoc()) {
                        $state = $row['State_reserve']; 
                        $Fname = $row['First_name_star'];
                        $Lname = $row['Last_name_star'];
                        $time_work = $row['Time_work'];
                        $date_work = $row['Date_work'];
                        $detail = $row['Detail_work'];
                        $total_time = $row['Total_time_work'];
                        $price = $row['The_propose_price'];
                        $photo = $row['P_picture'];

                        $e = explode("/", $total_time);
                        $year = $e[0];
                        $month = $e[1];
                        $day = $e[2];
                        $hour = $e[3];
                        $min = $e[4];

                        echo "<div>";
                        echo '<figure class="snip0057 red">';
                        echo "<figcaption>";
                        echo "<h2>$Fname $Lname</h2>";
                        echo "<p>วันเริ่มทำงาน $date_work
                        <br>เวลาทำงาน $time_work
                        <br>ระยะเวลาทำงาน 
                        <br>$year ปี $month เดือน $day วัน
                        <br>$hour ชั่วโมง $min นาที
                        <br>รายละเอียดงาน 
                        <br>$detail
                        <br>ราคาว่าจ้าง $price
                        </p>";
                        
                        if($state == '1') {
                            echo '<div class="icons">รอการยืนยัน</div>';                            
                        } elseif ($state == '2') {
                            echo '<div class="icons">ปฏิเสธ</div>'; 
                        } else {
                            echo '<div class="icons">รับการยืนยัน</div>'; 
                        }
                        echo "</figcaption>";
                        echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                        echo "<div class='position'>";?>
                                <input type="button" class="button right" name="cancleList" value="ยกเลิกการจอง" onclick="cancleList(<?php echo $row['id_reserve'];?>)">
                        <?php
                        echo "</div>";
                        echo "</figure>";
                        echo "</div>";           
                    }
                } else {
                    echo "<center><h1>ไม่มีการจองคิว</h1></center>";
                }
            ?>
            </div>
</div> 

<script>
function cancleList(id) {
    if(confirm("คุณต้องการยกเลิกการจองคิวใช่ไหม")) {
        window.location.href='del_list.php?id_reserve='+id;
        return true;
    }
}
</script>
<?php
   
}


function search_name($search){

 $id_customers = $_SESSION['Id_customers'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "id615238_case";
                // $servername = "localhost";
                // $username = "root";
                // $password = "";
                // $dbname = "star";

                $conn=new mysqli($servername,$username,$password,$dbname);

                if($conn->connect_error){
                    die("connection failed:".$conn->connect_error);
                }
                $conn->set_charset("utf8");


               
               
                $sql = "SELECT distinct*
                 
                  FROM star LEFT OUTER JOIN picture ON Id_star = P_id_star JOIN reserve ON R_id_customer = '$id_customers' and R_id_star = Id_star and State_reserve != 0
                AND (First_name_star LIKE '%$search%' OR Last_name_star LIKE '%$search%')
                    group By Id_star ASC";

                $result = $conn->query($sql);
             
                if($result->num_rows>0){

                  
                    while ($row=$result->fetch_assoc()) {
                        $state = $row['State_reserve']; 
                        $Fname = $row['First_name_star'];
                        $Lname = $row['Last_name_star'];
                        $time_work = $row['Time_work'];
                        $date_work = $row['Date_work'];
                        $detail = $row['Detail_work'];
                        $total_time = $row['Total_time_work'];
                        $price = $row['The_propose_price'];
                        $photo = $row['P_picture'];
               

                        echo "<div>";
                        echo '<figure class="snip0057 red">';
                        echo "<figcaption>";
                        echo "<h2>$Fname $Lname</h2>";
                        echo "<p>วันเริ่มทำงาน $date_work
                        <br>เวลาทำงาน $time_work
                        <br>ระยะเวลาทำงาน $total_time
                        <br>รายละเอียดงาน 
                        <br>$detail
                        <br>ราคาว่าจ้าง $price
                        </p>";
                        if($state == '1') {
                            echo '<div class="icons">รอการยืนยัน</div>';                            
                        } elseif ($state == '2') {
                            echo '<div class="icons">ปฏิเสธ</div>'; 
                        } else {
                            echo '<div class="icons">รับการยืนยัน</div>'; 
                        }
                        echo "</figcaption>";
                        echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>';
                        echo "<div class='position'>";?>
                                <input type="button" class="button right" name="cancleList" value="ยกเลิกการจอง" onclick="cancleList2(<?php echo $row['id_reserve'];?>)">
                        <?php
                        echo "</div>";
                        echo "</figure>";
                        echo "</div>";           
                    }
                } else {
                    echo "<center><h1>ไม่มีการจองคิว</h1></center>";
                }
            ?>
            </div>
</div> 

<script>
function cancleList2(id) {
    if(confirm("คุณต้องการยกเลิกการจองคิวใช่ไหม")) {
        window.location.href='del_list.php?id_reserve='+id;
        return true;
    }
}
</script>
 <?php
   
}
echo "<br><br>";

if(isset($_POST['search'])){
  $search = $_POST['search'];
     echo "<h2>ผลการค้นหา: $search </h2><br>";
  search_name($search);//ไปฟังก์ชั่นค้นหา 
}else{
  show();//โชว์ปกติ
}
?>
</body>
</html>
