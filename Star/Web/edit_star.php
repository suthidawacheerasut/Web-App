<?php  
    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "";
    // $db_database = "test";
    session_start();
    echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";

    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";
    $connect = new mysqli($servername, $username, $password,$db_database);
    $connect->set_charset("utf8");
    
?>

 <!DOCTYPE html>  
 <html>  
    <head>  
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

            <!-- manu -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <title>เเก้ไขข้อมูลดารา</title>  
            <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
            <script type="text/javascript" src="function.js"></script>
            <!-- end -->

            <!-- Validation -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

            <link rel="stylesheet" href="CSS/style_manager.css">
            <link rel="stylesheet" href="CSS/formhack_manager.css">
            <!-- end -->

            <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
            <link rel="stylesheet" href="CSS/addpic_style_manager.css">

            <style>
                .error {color: #FF0000;}
            </style>

    </head>  
    <body>  
    <!-- menu -->
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
    <div class="under-line"></div>
</div> 

    <!-- <div><img src="pic/bg1.png" width="100%" height="30px"></div> -->
    <!-- end -->   

    <br>
    <br>

<?php
    $id=$_GET['uid'];


    // if($connect->connect_error){
    //     die("connection failed:".$connect->connect_error);
    // }
    $query = "SELECT * FROM STAR WHERE Id_star = '$id'";

    $result = mysqli_query($connect,$query);
    //ต้องเปิด ปิดไว้เช็คงานเฉยๆ
    while($row = mysqli_fetch_array($result))  
    {  
        $_SESSION['Id_star'] = "$row[Id_star]";
        $Age                = "$row[Age]";
        $Gender_star        = "$row[Gender_star]";
        $Height             = "$row[Height]";
        $Weight             = "$row[Weight]";
        $First_name_star    = "$row[First_name_star]";
        $Last_name_star     = "$row[Last_name_star]";
        $State_job          = "$row[State_job]";
        $Place_of_birth     = "$row[Place_of_birth]";
        $Affiliation        = "$row[Affiliation]";
        $Precent_slave_price = "$row[Precent_slave_price]";
        $Phone_star         = "$row[Phone_star]";
    }  

    $AgeErr                = "";
    $HeightErr             = "";
    $WeightErr             = "";
    $First_name_starErr    = "";
    $Last_name_starErr     = "";
    $Place_of_birthErr     = "";
    $AffiliationErr        = "";
    $Precent_slave_priceErr = "";
    $Phone_starErr         = "";

    $up = 1;

    if (empty($_POST["First_name_star"])){
        $First_name_starErr = "";
    }else{
        $First_name_star = $_POST["First_name_star"];
    }

    if (empty($_POST["Last_name_star"])){
        $Last_name_starErr = "";
    }else{
        $Last_name_star = $_POST["Last_name_star"];
    }



    if (!empty($_POST["Gender_star"])){
        $Gender_star = $_POST["Gender_star"];
    }

    if (!empty($_POST["State_job"])){
        $State_job = $_POST["State_job"];
    }
    

    if (empty($_POST["Age"])){
        $AgeErr = "";
    }else{    
        $Age = $_POST["Age"];
    }

    if (empty($_POST["Height"])){
        $HeightErr  = "";
    }else{   
        $Height = $_POST["Height"];     
    }

    if (empty($_POST["Weight"])){
        $WeightErr = "";
    }else{  
        $Weight = $_POST["Weight"];     
    }

    if (empty($_POST["Place_of_birth"])){
        $Place_of_birthErr = "";
    }else{
        $Place_of_birth = $_POST["Place_of_birth"];      
    }

    if (empty($_POST["Affiliation"])){
        $AffiliationErr = "";
    }else{
        $Affiliation = $_POST["Affiliation"];
    }

    if (empty($_POST["Precent_slave_price"])){
        $Precent_slave_priceErr = "";
    }else{
        $Precent_slave_price = $_POST["Precent_slave_price"];
    }

    if (empty($_POST["Phone_star"])){
        $Phone_starErr = "";
    }else{    
        $Phone_star = $_POST["Phone_star"];
    }

    // //ข้อมูลเก่าใน database
    //  action='htmlspecialchars($_SERVER['PHP_SELF'])'
     // echo "<form method='POST' action ='$keep'>";
     //                        //ชื่อ
     //                        echo "<label for='M_firstname'>";
     //                        echo "<div class='group'>";

     //                        echo "<h4><b>ชื่อจริง</b></h4>";
     //                        echo "<input id='M_firstname' class = 'input' type='text' name='First_name_star_manager'  
     //                        minlength='2' maxlength='50' value = '$First_name_star_manager'>";
     //                        echo "<ul class='input-requirements'>";
     //                        echo "<li> 2 < ความยาวตัวอักษร < 50 </li>";
     //                        echo "<li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>";
     //                        echo "</ul>";
     //                        echo "</div>";
     //                        echo "</label>";
     //                        echo "<span class='error'>$First_name_star_managerErr</span>";

    

    if(isset($_SESSION['PHP_SELF'])){

        $keep = htmlspecialchars($_SESSION['PHP_SELF']);
    }
    else{
        $keep = '';
    }
    
    echo "<form method='POST' action ='$keep'>";

    echo "<div class = 'login-form '>";
        echo "<center>";

        //ชื่อ
        echo "<label for='M_firstname'>";
        echo "<div class='group'>";
        echo "<h4><b>ชื่อจริง</b></h4>";
        // echo "<div class = 'button_css'>";
        echo "<input style='width: 500px; height: 55px;' class = 'input' id='M_firstname' type='text' name='First_name_star'  minlength='2' maxlength='50' value = '$First_name_star'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5>2 < ความยาวตัวอักษร < 50</h5></li>";
        echo "<li><h5>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</h5></li>";
        echo "</ul>";
        // echo "</div>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$First_name_starErr</span>";
        echo "<br>";

        //นามสกุล

        echo "<label for='M_lastname'>";
        echo "<div class='group'>";
        echo "<h4><b>นามสกุล</b></h4>";
        // echo "<div class = 'button_css'>";
        echo "<input id='M_lastname' style='width: 500px; height: 55px;' class = 'input' type='text' name='Last_name_star' minlength='2' maxlength='50' value = '$Last_name_star'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5> 2 < ความยาวตัวอักษร < 50 </h5></li>";
        echo "<li><h5>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$Last_name_starErr</span>";
        echo "<br>";

        if($Gender_star == 'หญิง'){
            $Gender_star2 = 'ชาย';
        }else{
            $Gender_star2 = 'หญิง';
        }
        echo "<div class='group'>";
        echo "<h4><b>เพศ</b></h4>"; 
        echo "<select style='width: 500px; height: 55px;' class = 'input' name='Gender_star'>;
                <option value='$Gender_star'>$Gender_star</option>
                <option value='$Gender_star2'>$Gender_star2</option>
            </select>";
        echo "</div>";
        echo "<br>";

        if($State_job == 'รับงาน'){
            $State_job2 = 'ไม่รับงาน';
        }else{
            $State_job2 = 'รับงาน';
        }
        echo "<div class='group'>";
        echo "<h4><b>สถานะการรับงาน</b></h4>"; 
        echo "<select style='width: 500px; height: 55px;' class = 'input' name='State_job'>;
                <option value='$State_job'>$State_job</option>
                <option value='$State_job2'>$State_job2</option>
            </select>";
        echo "</div>";
        echo "<br>";

        //อายุ
        echo "<label for='M_age'>";
        echo "<div class='group'>";
        echo "<h4><b>อายุ</b></h4>"; 
        // echo "<div class = 'button_css'>";
        echo "<input style='width: 500px; height: 55px;' class = 'input' id='M_age' type='text' name='Age' value = '$Age'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5>กรองเป็นตัวเลข</h5></li>";
        echo "<li><h5>มากกว่า 0 ไม่เกิน 100</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$AgeErr</span>";
        echo "<br>";

        //น้ำหนัก
        echo "<label for='M_weight'>";
        echo "<div class='group'>";
        echo "<h4><b>น้ำหนัก</b></h4>"; 
        // echo "<div class = 'button_css'>";
        echo "<input style='width: 500px; height: 55px;' class = 'input' id='M_weight' type='text' name='Weight' value = '$Weight'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5>มากกว่า 2 เเละไม่เกิน 200</h5></li>";
        echo "<li><h5>กรองเป็นตัวเลข</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$WeightErr</span>";
        echo "<br>";

        //ส่วนสูง
        echo "<label for='M_height'>";
        echo "<div class='group'>";
        echo "<h4><b>ส่วนสูง</b></h4>";
        // echo "<div class = 'button_css'>";  
        echo "<input style='width: 500px; height: 55px;' class = 'input' id='M_height' type='text' name='Height' value = '$Height'>"; 
        echo "<ul class='input-requirements'>";
        echo "<li><h5>มากกว่า 30 เเละไม่เกิน 250</h5></li>";
        echo "<li><h5>กรองเป็นตัวเลข</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$HeightErr</span>";
        echo "<br>";

        echo "<div class='group'>";
        echo "<h4><b>สังกัด</b></h4>";
        // echo "<div class = 'button_css'>";
        echo "<input type='text' style='width: 500px; height: 55px;' class = 'input' name='Affiliation' pattern='.{3,}' value = '$Affiliation'>"; 
        echo "</div>";
        echo "<span class='error'>$AffiliationErr</span>";
        echo "<br>";

        echo "<div class='group'>";
        echo "<h4><b>บ้านเกิด</b></h4>";
        // echo "<div class = 'button_css'>";
        echo "<input type='text' style='width: 500px; height: 55px;' class = 'input' name='Place_of_birth' pattern='.{3,}' value = '$Place_of_birth'>";
        echo "</div>";
        echo "<span class='error'>$Place_of_birthErr</span>";
        echo "<br>";
    
        //เปอร์เซ็นค่าตัว
        echo "<label for='M_percent'>";
        echo "<div class='group'>";
        echo "<h4><b>เปอร์เซ็นค่าตัว</b></h4>";
        // echo "<div class = 'button_css'>"; 
        echo "<input id='M_percent' style='width: 500px; height: 55px;' class = 'input' type='text' name='Precent_slave_price' value = '$Precent_slave_price'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5>มากกว่า 0 เเละไม่เกิน 100</h5></li>";
        echo "<li><h5>กรองเป็นตัวเลข</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>";
        echo "<span class='error'>$Precent_slave_priceErr</span>";
        echo "<br>";

        //เบอร์โทร
        echo "<label for='M_phone'>";
        echo "<div class='group'>";
        echo "<h4><b>เบอร์โทร</b></h4>";
        // echo "<div class = 'button_css'>"; 
        echo "<input id='M_phone' style='width: 500px; height: 55px;' class = 'input' type='text' name='Phone_star' value = '$Phone_star' minlength='10' maxlength='10'>";
        echo "<ul class='input-requirements'>";
        echo "<li><h5>08XXXXXXXX</h5></li>";
        echo "</ul>";
        echo "</div>";
        echo "</label>"; 
        echo "<span class='error'>$Phone_starErr</span>";
        echo "<br>";
        echo "<br>";
        echo "<br>";

        echo "<div class='group'>";
        echo "<input style='width: 500px; height: 55px;' class = 'button' name='submit' type='submit'  value='เเก้ไขข้อมูล'>"; 
        echo "</center>";
        echo "</div>";
    echo "</div>";
    // echo "<div class = 'button_update'>";
    // echo "</div>";
    echo "</form>"; 

    // echo "$Id_star";
    echo "<br>";
    echo "<br>";
    echo "<center><a href='addpic_manager.php'><u><h4>เพิ่มรูปภาพดารา</h4></u></a></center>";
    echo "<center><a href='adddata_manager.php'><u><h4>เพิ่มข้อมูลเเบบละเอียด</h4></u></a></center>";
    echo "<br>";
    echo "<br>";  
    
    $_SESSION['First_name_star'] = $First_name_star;
    $_SESSION['Last_name_star'] = $Last_name_star;
    if(isset($_POST["submit"]))  
    {  

        $query_name = "SELECT Id_star FROM STAR WHERE '$First_name_star' = First_name_star AND '$Last_name_star' = Last_name_star";
        $Id_star1 = "";
        $result = mysqli_query($connect, $query_name);  
        while($row = mysqli_fetch_array($result))  
        {  
            $Id_star1 = "$row[Id_star]";
        } 
        
        if("$Id_star1" != "" && "$Id_star1" != "$id"){
            echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='home_manager.php';</script>";
        }else{
            $query = "UPDATE STAR
            SET Age = '$Age',
                Gender_star = '$Gender_star',
                Height = '$Height',
                Weight = '$Weight',
                First_name_star = '$First_name_star',
                Last_name_star  = '$Last_name_star',
                State_job = '$State_job',
                Place_of_birth = '$Place_of_birth',
                Affiliation = '$Affiliation',
                Precent_slave_price = '$Precent_slave_price',
                Phone_star = '$Phone_star' 
            WHERE Id_star = '$id'
            ";  

            if(mysqli_query($connect, $query) and ($up == 1))  
            {  
                echo "<script>alert('ยืนยันเเก้ไข');location.href='home_manager.php';</script>";
            } 
            
        }

    }  

?>
<script src="edit_star.js"></script>
    </body>  
 </html>  

