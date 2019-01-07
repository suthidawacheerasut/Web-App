<?php  
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";

    session_start();
    $Id_star = $_SESSION['Id_star'];
    echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];

    $First_name_star = isset($_SESSION['First_name_star']) ? $_SESSION['First_name_star'] : '';
    $Last_name_star = isset($_SESSION['Last_name_star']) ? $_SESSION['Last_name_star'] : '';
    // echo "$First_name_star";

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";


    $connect = new mysqli($servername,$username,$password,$db_database);
    $connect->set_charset("utf8");
    // echo "$Id_star";

    $ability = isset($_POST['ability']) ? $_POST['ability'] : '';


    if(isset($_POST["insert_ability"]))  
    {  

        $query = "INSERT INTO ABILITY(ab_id_star,ability) VALUES ('$Id_star','$ability')";  
        if(mysqli_query($connect, $query))  
        {  
            echo '<script>alert("ยืนยันการเพิ่มความสามารถ")</script>';  
        }  
    }  
    $connect->close(); 
?>
<!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

<?php
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";

    $Name_jobtype = isset($_POST['Name_jobtype']) ? $_POST['Name_jobtype'] : '';
    $Max_slave_price = isset($_POST['Max_slave_price']) ? $_POST['Max_slave_price'] : '';
    $Min_slave_price = isset($_POST['Min_slave_price']) ? $_POST['Min_slave_price'] : '';
    // $Name_jobtype = $_POST['Name_jobtype'];
    // $Max_slave_price = $_POST['Max_slave_price'];
    // $Min_slave_price = $_POST['Min_slave_price'];


    $connect = new mysqli($servername,$username,$password,$db_database);
    $connect->set_charset("utf8");

    // session_start();
    $Id_star = $_SESSION['Id_star'];

    if(isset($_POST["insert_jobtype"]))  
    {  
        if(($Max_slave_price - $Min_slave_price) >= 0){

            $query2 = "INSERT INTO JOBTYPE(Name_jobtype,W_id_star,Min_slave_price,Max_slave_price) 
                    VALUES ('$Name_jobtype','$Id_star','$Min_slave_price','$Max_slave_price')";  

            if(mysqli_query($connect, $query2))  
            {  
                echo '<script>alert("ยืนยันการเพิ่มประเภทงานที่สามารถรับได้")</script>';  
            }  
        }else{
            echo '<script>alert("กรุณากรอกราคาสูงสุด ต่ำสุดให้ถูกต้อง")</script>'; 
        }
    }
    $connect->close(); 
?> 
<!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

<?php

    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";

    $Name_portfolio = isset($_POST['Name_portfolio']) ? $_POST['Name_portfolio'] : '';
    $Category_portfolio = isset($_POST['Category_portfolio']) ? $_POST['Category_portfolio'] : '';
    $Year_portfolio = isset($_POST['Year_portfolio']) ? $_POST['Year_portfolio'] : '';
    $Character_po = isset($_POST['Character_po']) ? $_POST['Character_po'] : '';

    // $Name_portfolio = $_POST['Name_portfolio'];
    // $Category_portfolio = $_POST['Category_portfolio'];
    // $Year_portfolio  = $_POST['Year_portfolio'];
    // $Character_po  = $_POST['Character_po'];

    // echo "$Name_portfolio";
    // echo "$Category_portfolio";
    // echo "$Year_portfolio";
    // echo "$Character";


    $connect = new mysqli($servername,$username,$password,$db_database);
    $connect->set_charset("utf8");

    // session_start();
    $Id_star = $_SESSION['Id_star'];

    if(isset($_POST["insert_portfolio"]))  
    {  

        $query = "INSERT INTO PORTFOLIO(Po_id_star,Name_portfolio,Category_portfolio,Year_portfolio,Character_po) 
                VALUES ('$Id_star','$Name_portfolio','$Category_portfolio','$Year_portfolio','$Character_po')";  

        if(mysqli_query($connect, $query))       
        {  
            // echo "toytoytoy_toy";
            echo '<script>alert("ยืนยันการเพิ่มผลงาน")</script>';  
        }  
    }
    $connect->close(); 
?> 

<!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

<?php

    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";


    $Award = isset($_POST['Award']) ? $_POST['Award'] : '';
    $Name_award = isset($_POST['Name_award']) ? $_POST['Name_award'] : '';
    $Branch_award = isset($_POST['Branch_award']) ? $_POST['Branch_award'] : '';
    $Year_award = isset($_POST['Year_award']) ? $_POST['Year_award'] : '';
    $Name_award_nominations = isset($_POST['Name_award_nominations']) ? $_POST['Name_award_nominations'] : '';
    // $Award                  = $_POST['Award'];
    // $Name_award             = $_POST['Name_award'];
    // $Branch_award           = $_POST['Branch_award'];
    // $Year_award             = $_POST['Year_award'];
    // $Name_award_nominations  = $_POST['Name_award_nominations'];

    $connect = new mysqli($servername,$username,$password,$db_database);
    $connect->set_charset("utf8");

    // session_start();
    $Id_star = $_SESSION['Id_star'];

    if(isset($_POST["insert_awards"]))  
    {  

        $query = "INSERT INTO AWARDS(Aw_id_star,Award,Name_award,Branch_award,Year_award,Name_award_nominations) 
                VALUES ('$Id_star','$Award','$Name_award','$Branch_award','$Year_award','$Name_award_nominations')";  

        if(mysqli_query($connect, $query))       
        {  
            // echo "toytoytoy_toy";
            echo '<script>alert("ยืนยันการเพิ่มรางวัล")</script>';  
        }  
    }
    $connect->close(); 
?> 

<!DOCTYPE html>  
<html>  
      <head>  
           <meta http-equiv="content-type" content="text/html; charset=UTF-8">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

            <!-- manu -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <title>เพิ่มข้อมูลดาราเเบบละเอียด</title>  
            <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
            <script type="text/javascript" src="function.js"></script>
            <!-- end -->

            <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
            <link rel="stylesheet" href="CSS/adddata_style_manager.css">

      </head>  
<body>  
<!-- menu -->
<br>
<br>
<div id="wrap" class="menu_manager">
    <header>
        <div class="inner relative">
            <a class="logo" href="home_manager.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li><a href="home_manager.php"><b>หน้าเเรก</b></a></li>
                    <li class="current-menu-item"><a href="addstar_manager.php"><b>เพิ่มดาราในสังกัด</b></a></li>
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
</div> 
<div class="under-line"></div>
<!-- <div><img src="pic/bg1.png" width="100%" height="30px"></div> -->
<!-- end -->  



<br>
<br>  
<div class="container" style="width:700px;">  

        <h2 align="center">เพิ่มข้อมูลเเบบละเอียด</h2>  
       

        <?php
          // echo "$Id_star"; 
            echo "<center><h3>";

            echo "$First_name_star $Last_name_star";
            echo "</center></h3>";
            // echo "<h2 align="center">'เพิ่มข้อมูลเเบบละเอียด'.$_SESSION['First_name_star'].' '.$_SESSION['Last_name_star']</h2>";
           
            echo "<br>";
            echo "<center><a href='addstar_finish_manager.php'><u>กลับไปหน้าเพิ่มข้อมูลอย่างละเอียด</u></a></center>";
        ?>

        <!-- ABILITY -->
        <br><br>
        <form method="post" enctype="multipart/form-data">
            <h3 ALIGN="LEFT"><u>เพิ่มความสามารถพิเศษ</h3></u><br> 
            <div class="login-form">
                <div class="group">
                    <h4 align="center">ความสามารถพิเศษ</h4>
                    <input id="user"  name="ability" type="text" class="input" placeholder="ความสามารถพิเศษ" required
                    oninvalid="setCustomValidity('กรุณากรอกความสามารถ')"
                    onchange="try{setCustomValidity('')}catch(e){}"/>
                    <br>
                    <input type="submit" name="insert_ability" id="insert" value="เพิ่ม" class="button" />  
                </div>  
            </div> 
        </form>  

        <table class="table table-bordered">  
             <tr>  
                  <th>ความสามารถพิเศษ</th>
                  <th>ลบข้อมูล</th>  
             </tr>  
        <?php  
            // $servername = "localhost";
            // $username = "id615238_user_case";
            // $password = "12345678";
            // $db_database = "id615238_case";
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $db_database = "id615238_case";


            $connect = new mysqli($servername,$username,$password,$db_database);
            $connect->set_charset("utf8");

            // session_start();
            $Id_star = $_SESSION['Id_star'];


            $query = "SELECT * FROM ABILITY WHERE ab_id_star = '$Id_star'" ;  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_array($result))  
            {  

                echo "</tr>";
                echo "<td>";
                echo " $row[ability]";
                echo "</td>";
       
                echo "<td><center><u><a href='delete_ability_manager.php?ability=$row[ability]'>ลบ</a></u></center></td>";
                echo "</tr>";
            } 
            $connect->close();  

        ?>  
        </table>  
        <!-- end -->
                  
                   

        <!-- jobtype -->
        <br>
        <br>
        <form method="post" enctype="multipart/form-data">
            <h3 ALIGN="LEFT"><u>เพิ่มงานที่สามารถรับได้</h3></u>
            <br> 
            <div class="login-form">
                <div class="group">
                    
                    <h4 align="center">ประเภทงาน</h4>
                    <select class="input" name="Name_jobtype" required>
                        <option value="NULL">-</option>
                        <option value="ละคร ต่อ 1 ตอน">ละคร ต่อ 1 ตอน</option>
                        <option value="เดินเเบบ 1 ครั้ง">เดินเเบบ 1 ครั้ง</option>
                        <option value="ถ่ายเเบบ 1 งาน">ถ่ายเเบบ 1 งาน</option>
                        <option value="พิธีกร 1 งาน">พิธีกร 1 งาน</option>
                        <option value="พิธีกรประจำ">พิธีกรประจำ</option>
                        <option value="โฆษณา 1 ชิ้น">โฆษณา 1 ชิ้น</option>
                        <option value="ภาพยนตร์ 1 เรื่อง">ภาพยนตร์ 1 เรื่อง</option>
                        <option value="ร้องเพลง 1 เพลง">ร้องเพลง 1 เพลง</option>
                        <option value="ร้องเพลง 1 อัลบั้ม">ร้องเพลง 1 อัลบั้ม</option>
                    </select>
                    <h4 align="center">ค่าตัวเเต่ล่ะงานโดยประมาน</h4>
                    
                    <input id="user" name="Min_slave_price" type="number" min = "0" class="input" placeholder="ค่าตัวต่ำสุด" required
                    oninvalid="setCustomValidity('กรุณากรอกค่าตัวตำ่สุดที่มากกว่า 0')"
                    onchange="try{setCustomValidity('')}catch(e){}"/>

                    <input id="user" name="Max_slave_price" type="number" min = "0" class="input" placeholder="ค่าตัวสูงสุด" required
                    oninvalid="setCustomValidity('กรุณากรอกค่าตัวสูงสุดที่มากกว่า 0')"
                    onchange="try{setCustomValidity('')}catch(e){}"/>
                    
                    <br>
                    <input type="submit" name="insert_jobtype" id="insert" value="เพิ่ม" class="button" />  
                </div>  
            </div> 
        </form>

        <table class="table table-bordered">  
             <tr>  
                  <th>ประเภทงาน</th>
                  <th>ค่าตัวต่ำที่สุด</th> 
                  <th>ค่าตัวสูงที่สุด</th> 
                  <th>ลบข้อมูล</th>  
             </tr>  
        <?php  
            // $servername = "localhost";
            // $username = "id615238_user_case";
            // $password = "12345678";
            // $db_database = "id615238_case";
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $db_database = "id615238_case";


            $connect = new mysqli($servername,$username,$password,$db_database);
            $connect->set_charset("utf8");

            // session_start();
            $Id_star = $_SESSION['Id_star'];


            $query = "SELECT * FROM JOBTYPE WHERE W_id_star = '$Id_star'" ;  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_array($result))  
            {  

                echo "</tr>";
                echo "<td>";
                echo " $row[Name_jobtype]";
                echo "</td>";

                echo "<td>";
                echo " $row[Min_slave_price]";
                echo "</td>";

                echo "<td>";
                echo " $row[Max_slave_price]";
                echo "</td>";
       
                echo "<td><center><u><a href='delete_jobtype_manager.php?id_jobtype=$row[id_jobtype]'>ลบ</a></u></center></td>";
                echo "</tr>";
            } 
            $connect->close();  

        ?>  
        </table>  
        <!-- end -->

        <!-- PORTFOLIO -->
        <br>
        <br>
        <form method="post" enctype="multipart/form-data">
            <h3 ALIGN="LEFT"><u>เพิ่มผลงาน</h3></u><br> 
            <div class="login-form">
                <div class="group">
                    <h4 align="center">ประเภทผลงาน</h4>
                    <input id="user" name="Category_portfolio" type="text" class="input" placeholder="ประเภทผลงาน">
    
                    <h4 align="center">ชื่อผลงาน</h4> 
                    <input id="user" name="Name_portfolio" type="text" class="input" placeholder="ชื่อผลงาน" required
                    oninvalid="setCustomValidity('กรุณากรอกชื่อผลงาน')"
                    onchange="try{setCustomValidity('')}catch(e){}">
                    
                    <h4 align="center">ปีที่มีผลงาน</h4>
                    <input id="user" name="Year_portfolio" type="number" min = "0" class="input" placeholder="ปีที่มีผลงาน" required
                    oninvalid="setCustomValidity('กรุณากรอกปีที่มีผลงานที่มากกว่า 0')"
                    onchange="try{setCustomValidity('')}catch(e){}"/>

                    <h4 align="center">บทบาทที่ได้รับ เช่น ชื่อตัวละครที่เเสดง,พิธีกร</h4>
                    <input id="user" name="Character_po" type="text" class="input" placeholder="บทบาทที่ได้รับ">
                    <br>
                    <input type="submit" name="insert_portfolio" id="insert" value="เพิ่ม" class="button" />  
                </div>  
            </div> 
        </form>  

        <table class="table table-bordered">  
             <tr>  
                  <th>ประเภทผลงาน</th>
                  <th>ชื่อผลงาน</th> 
                  <th>ปีที่มีผลงาน</th> 
                  <th>บทบาทที่ได้รับ</th> 
                  <th>ลบข้อมูล</th>  
             </tr>  
        <?php  
            // $servername = "localhost";
            // $username = "id615238_user_case";
            // $password = "12345678";
            // $db_database = "id615238_case";
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $db_database = "id615238_case";


            $connect = new mysqli($servername,$username,$password,$db_database);
            $connect->set_charset("utf8");

            // session_start();
            $Id_star = $_SESSION['Id_star'];


            $query = "SELECT * FROM PORTFOLIO WHERE Po_id_star = '$Id_star' ORDER BY Year_portfolio ASC" ;  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_array($result))  
            {  

                echo "</tr>";
                echo "<td>";
                echo " $row[Category_portfolio]";
                echo "</td>";

                echo "<td>";
                echo " $row[Name_portfolio]";
                echo "</td>";

                echo "<td>";
                echo " $row[Year_portfolio]";
                echo "</td>";

                echo "<td>";
                echo " $row[Character_po]";
                echo "</td>";
       
                echo "<td><center><u><a href='delete_portfolio_manager.php?id_portfolio=$row[id_portfolio]'>ลบ</a></u></center></td>";
                echo "</tr>";
            }  
            $connect->close(); 

        ?>  
        </table>  


        <!-- end -->

        <!-- AWARDS -->
        <br>
        <br>
        <form method="post" enctype="multipart/form-data">
            <h3 ALIGN="LEFT"><u>เพิ่มรางวัลที่ได้รับ</h3></u><br>
            <div class="login-form">
                <div class="group">
                    <h4 align="center">สาขารางวัลที่ได้</h4>
                    <input id="user" name="Branch_award" type="text" class="input" placeholder="สาขารางวัลที่ได้" required
                    oninvalid="setCustomValidity('กรุณากรอกสาขารางวัลที่ได้')"
                    onchange="try{setCustomValidity('')}catch(e){}">
                    
                    <h4 align="center">ชื่อรางวัล</h4>
                    <input id="user" name="Name_award" type="text" class="input" placeholder="ชื่อรางวัล" required
                    oninvalid="setCustomValidity('กรุณากรอกชื่อรางวัล')"
                    onchange="try{setCustomValidity('')}catch(e){}">
                    
                    <h4 align="center">ปีที่ได้รับรางวัล</h4>
                    <input id="user" name="Year_award" type="number" min = "0" class="input" placeholder="ปีที่ได้รับรางวัล" required
                    oninvalid="setCustomValidity('กรุณากรอกปีที่ได้รับรางวัลที่มากกว่า 0')"
                    onchange="try{setCustomValidity('')}catch(e){}">

                    <h4 align="center">สถานะรางวัล</h4>
                    <select class="input" name="Award" required>
                        <option value="ได้รับเสนอชื่อเข้าชิง">ได้รับเสนอชื่อเข้าชิง</option>
                        <option value="ได้รับรางวัล">ได้รับรางวัล</option>
                    </select>
                    
                    <h4 align="center">ชื่อผลงานที่ได้รับการเสนอชื่อเข้าเชิงรางวัล</h4>
                    <input id="user" name="Name_award_nominations" type="text" class="input" placeholder="ชื่อผลงานที่ได้รับการเสนอชื่อเข้าเชิงรางวัล" required
                    oninvalid="setCustomValidity('กรุณากรอกชื่อผลงานที่ได้รับการเสนอชื่อเข้าเชิงรางวัล')"
                    onchange="try{setCustomValidity('')}catch(e){}">
                    <br>
                    <input type="submit" name="insert_awards" id="insert" value="เพิ่ม" class="button" />  
                </div>  
            </div> 
        </form>  

        <table class="table table-bordered">  
             <tr>  
                  <th>สาขารางวัลที่ได้</th>
                  <th>ชื่อรางวัล</th> 
                  <th>ปีที่ได้รับรางวัล</th> 
                  <th>สถานะรางวัล</th> 
                  <th>ชื่อผลงานที่ได้รับการเสนอชื่อเข้าเชิงรางวัล</th>  
                  <th>ลบข้อมูล</th> 
             </tr>  
        <?php  
            // $servername = "localhost";
            // $username = "id615238_user_case";
            // $password = "12345678";
            // $db_database = "id615238_case";
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $db_database = "id615238_case";


            $connect = new mysqli($servername,$username,$password,$db_database);
            $connect->set_charset("utf8");

            // session_start();
            $Id_star = $_SESSION['Id_star'];


            $query = "SELECT * FROM AWARDS WHERE Aw_id_star = '$Id_star' ORDER BY Year_award ASC" ;  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_array($result))  
            {  

                echo "</tr>";
                echo "<td>";
                echo " $row[Branch_award]";
                echo "</td>";

                echo "<td>";
                echo " $row[Name_award]";
                echo "</td>";

                echo "<td>";
                echo " $row[Year_award]";
                echo "</td>";

                echo "<td>";
                echo " $row[Award]";
                echo "</td>";

                echo "<td>";
                echo " $row[Name_award_nominations]";
                echo "</td>";
       
                echo "<td><center><u><a href='delete_awards_manager.php?id_awards=$row[id_awards]'>ลบ</a></u></center></td>";
                echo "</tr>";
            }  
            $connect->close(); 

        ?>  
        </table>  
        <!-- end -->
        


   </div>
<!-- end -->
</body>  
 </html>  


<!-- end -->