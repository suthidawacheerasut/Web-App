<html>
<body>

<?php
$id=$_GET['uid'];
   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");


     $sql = "SELECT *
   FROM star
   INNER JOIN jobtype ON (JOBTYPE.W_id_star = star.Id_star)
   INNER JOIN picture  ON (picture.P_id_star = star.Id_star)
   INNER JOIN star_manager ON (star_manager.Id_star_manager= star.S_id_star_manager)
   INNER JOIN portfolio ON (portfolio.Po_id_star = star.Id_star)
   INNER JOIN awards ON (awards.Aw_id_star = star.Id_star)
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
    $year = $row['Year_portfolio'];
    $Name_po = $row['Name_portfolio'];
    $category_po = $row['Category_portfolio'];
    $character = $row['Character'];
    $photo = $row['P_picture'];
    $name_a = $row['Name_award'];
    $phone = $row['Phone_star'];
    $branch = $row['Branch_award'];
    $year_a = $row['Year_award'];
    $name_no_a = $row['Name_award_nominations'];
    $name_job = $row['Name_jobtype'];
    $min_p = $row['Min_slave_price'];
    $max_p = $row['Max_slave_price'];
    $Fname_manager = $row['First_name_star_manager'];
    $Lname_manager = $row['Last_name_star_manager'];
    $phone_manager = $row['Phone_star_manager'];
    $gender_manager = $row['Gender_star_manager'];



      
    echo "<form  action='updatestar.php' method='POST'>";
    echo "<input type='hidden' name='id' value = '$id'><br><br>";     
    echo "Id <input type='text' name='uid' value = '$id'><br><br>"; 
    echo "ชื่อจริง <input type='text' name='fname' value = '$fname' ><br><br>"; 
    echo "นามสกุล <input type='text' name='lname' value = '$lname' ><br><br>"; 
    echo "เพศ <input type='text' name='gender' value = '$gender' ><br><br>"; 
    echo "อายุ<input type='text' name='age' value = '$age' ><br><br>"; 
    echo "น้ำหนัก<input type='text' name='weight' value = '$weight' ><br><br>"; 
    echo "ส่วนสูง<input type='text' name='height' value = '$height' ><br><br>"; 
  
    echo "สังกัด<input type='text' name='sungkud' value = '$sungkud' ><br><br>"; 

    echo "บ้านเกิด<input type='text' name='place' value = '$place' ><br><br>"; 
    echo " เบอร์โทร<input type='text' name='phone' value = '$phone'><br><br>"; 
    echo "ผลงาน ชื่อผลงาน<input type='text' name='name_po' value = '$Name_po'><br><br>";
 



   echo "<input type='submit'  value='Update' >"; 
   echo "</form>"; 







    $conn->close();
?>
</body>
</html>