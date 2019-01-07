<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>รายการจองคิว</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/list_m.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    
    

</head>
<body>
<div id="wrap" class="menu_manager">
    <header>
        <div class="inner relative">
            <a class="logo" href="home_manager.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li><a href="home_manager.php"><b>หน้าเเรก</b></a></li>
                    <li><a href="addstar_manager.php"><b>เพิ่มดาราในสังกัด</b></a></li>
                    <li><a href="setting_manager.php"><b>ตั้งค่าบัญชีผู้ใช้</b></a></li>
                    <li class="current-menu-item parent">
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
</div> 
    </header> 

    <h1 class="h1">ค้นหาดารา</h1>
    <div class="flexsearch">
        <div class="flexsearch--wrapper">
            <form class="flexsearch--form" action="queue_confirm.php" method="post">
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
     
<?php
function show() {
    echo "<div>";
            echo "<center><h1>คิวที่ได้รับการยืนยัน</h1></center>";
                $Id_star_manager = isset($_SESSION['Id_star_manager']) ? $_SESSION['Id_star_manager'] : '';
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "id615238_case";

                $conn=new mysqli($servername,$username,$password,$dbname);

                if($conn->connect_error){
                    die("connection failed:".$conn->connect_error);
                }
                $conn->set_charset("utf8");


               
               
                $sql = "SELECT First_name_star,Last_name_star,Id_reserve,Time_work,Date_work,Detail_work,Total_time_work,The_propose_price,P_picture,First_name_customers,Phone_customers
                    FROM star LEFT OUTER JOIN picture ON Id_star = P_id_star JOIN reserve ON R_id_star = Id_star and State_reserve = 3 and S_id_star_manager = '$Id_star_manager' JOIN customers on R_id_customer = id_customers 
                    group By Id_reserve ASC";

                $result = $conn->query($sql);
             
                if($result->num_rows>0){

                  
                    while ($row=$result->fetch_assoc()) { 
                        $Fname = $row['First_name_star'];
                        $Lname = $row['Last_name_star'];
                        $time_work = $row['Time_work'];
                        $date_work = $row['Date_work'];
                        $detail = $row['Detail_work'];
                        $total_time = $row['Total_time_work'];
                        $price = $row['The_propose_price'];
                        $nameC = $row['First_name_customers'];
                        $phone = $row['Phone_customers'];

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
            ?>
                        </figcaption>

                        <?php echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>'; ?>
                        <div class="position">ติดต่อ คุณ <?php echo"$nameC เบอร์โทร $phone"?></div>
                        </figure>
                        </div>
                <?php  
                    }

                } else {
                    echo "<center><h3>ไม่มีการยืนยันคิว</h3></center>";
                }
                ?>
            </div>

            
    </div>

<?php
}

function search_name($search) {
    echo "<div>";
            echo "<center><h1>คิวที่ได้รับการยืนยัน</h1></center>";
                $Id_star_manager = isset($_SESSION['Id_star_manager']) ? $_SESSION['Id_star_manager'] : '';
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "id615238_case";

                $conn=new mysqli($servername,$username,$password,$dbname);

                if($conn->connect_error){
                    die("connection failed:".$conn->connect_error);
                }
                $conn->set_charset("utf8");


               
               
                $sql = "SELECT First_name_star,Last_name_star,Id_reserve,Time_work,Date_work,Detail_work,Total_time_work,The_propose_price,P_picture,First_name_customers,Phone_customers
                    FROM star LEFT OUTER JOIN picture ON Id_star = P_id_star JOIN reserve ON R_id_star = Id_star and State_reserve = 3 and S_id_star_manager = '$Id_star_manager' JOIN customers on R_id_customer = id_customers 
                   AND (First_name_star LIKE '%$search%' || Last_name_star LIKE '%$search%')
                     group By id_reserve ASC";

                $result = $conn->query($sql);
             
                if($result->num_rows>0){

                  
                    while ($row=$result->fetch_assoc()) { 
                        $Fname = $row['First_name_star'];
                        $Lname = $row['Last_name_star'];
                        $time_work = $row['Time_work'];
                        $date_work = $row['Date_work'];
                        $detail = $row['Detail_work'];
                        $total_time = $row['Total_time_work'];
                        $price = $row['The_propose_price'];
                        $nameC = $row['First_name_customers'];
                        $phone = $row['Phone_customers'];

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
            ?>
                        </figcaption>

                        <?php echo '<div class="image"><img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="500" width="500" class="img-thumnail" /> </div>'; ?>
                        <div class="position">ติดต่อ คุณ <?php echo"$nameC เบอร์โทร $phone"?></div>
                        </figure>
                        </div>
                <?php  
                    }

                } else {
                    echo "<center><h3>ไม่มีการยืนยันคิว</h3></center>";
                }
                ?>
            </div>

            
    </div>

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