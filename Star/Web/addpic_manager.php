<?php  

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_database = "id615238_case";

// $servername = "localhost";
// $username = "id615238_user_case";
// $password = "12345678";
// $db_database = "id615238_case";
$connect = new mysqli($servername, $username, $password,$db_database);

session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];

$Id_star = $_SESSION['Id_star'];

if(isset($_POST["insert"]))  
 {  

      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO PICTURE(P_picture,P_id_star) VALUES ('$file','$Id_star')";  
      if(mysqli_query($connect, $query))  
      {  
        echo '<script>alert("ยืนยันการเพิ่มรูปภาพ")</script>';  
      }  
}  
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
            <title>เพิ่มรูปภาพดารา</title>  
            <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
            <script type="text/javascript" src="function.js"></script>
            <!-- end -->

            <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
            <link rel="stylesheet" href="CSS/addpic_style_manager.css">


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
<br/>
<br/>  
<div class="container" style="width:500px;">  

        <h2 align="center">เพิ่มรูปภาพดารา</h2> 
        <h5 align="center">ขนาดรูปภาพไม่เกิน 64kB</h5>
   
        <?php
          // echo "$Id_star";
          echo "<center><h3>";
          echo $_SESSION['First_name_star'].' '.$_SESSION['Last_name_star'];
          echo "</center></h3><br>";

          echo "<center><a href='addstar_finish_manager.php'><u>กลับไปหน้าเพิ่มข้อมูลอย่างละเอียด</u></a></center>";
        ?>
        <br><br>
        <form method="post" enctype="multipart/form-data">
            <div class="login-form">
                <div class="group">
                    <input type="file" name="image" id="image" />  
                    <br>
                    <input type="submit" name="insert" id="insert" value="เพิ่ม" class="button" />  
                </div>  
            </div> 
        </form>  
        <table class="table table-bordered">  
             <tr>  
                  <th>Image</th>
                  <th>delete</th>  
             </tr>  
        <?php  
        $query = "SELECT * FROM PICTURE WHERE P_id_star = '$Id_star' ORDER BY id_pic" ;  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_array($result))  
        {  

          echo "</tr>";
          echo '<td>
                <img src="data:image/jpeg;base64,'.base64_encode($row['P_picture'] ).'" height="600" width="500" class="img-thumnail"/>
                </td>';

          echo "<td><center><u><a href='delete_picture_manager.php?id_pic=$row[id_pic]'>ลบ</a></u></center></td>";
          echo "</tr>";
        }  
        ?>  
                  
                   
        </table>  
   </div>  
</body>  
 </html>  

 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("กรุณาเลือกรูปภาพ");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('ไฟล์รูปภาพไม่ถูกต้อง');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>
    </form>
</div>
<!-- end -->