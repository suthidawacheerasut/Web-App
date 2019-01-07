<?php   
 //database.php  
 class Databases{  


  private $db_host;
  private $db_user;
  private $db_pass;
  private $db_name;
  private $db_connection;

 function Databases(){
    $this->db_host = "localhost";
    $this->db_user = "root";
    $this->db_pass = "";
    $this->db_name = "lotterysalesystem";
}
public function set_char_utf8(){
    $cs1 = "SET character_set_results = utf8";
    $cs2 = "SET character_set_client = utf8";
    $cs3 = "SET character_set_connection = utf8";
    mysqli_query($this->db_connection,$cs1);
    mysqli_query($this->db_connection,$cs2);
    mysqli_query($this->db_connection,$cs3);
}
public function J_Connect(){
  $this->db_connection =  mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
}


function J_Insert($arr,$tblName){

    $str = "INSERT INTO ".$tblName."(".implode(",",array_keys($arr)).")";
    $str2 = " VALUES('".implode("','",$arr)."');";
    $sql = $str.$str2;
    $rs = mysqli_query($this->db_connection,$sql);

    return $rs;

}

function connect($sql){




    $rs = mysqli_query($this->db_connection,$sql);
    return $rs;

}
public function J_Execute($sql){
    $rs = mysqli_query($this->db_connection,$sql);
    $array = array();
    while($row = mysqli_fetch_array($rs)){
        array_push($array,$row);
    }
    mysqli_free_result($rs);
    return $array;
}


public function J_ExecuteNonQuery($sql){
    $rs = mysqli_query($this->db_connection,$sql);
    return $rs;
}


public function J_Close(){
    $rs = mysqli_close($this->db_connection);
    return $rs;
}


}
?>