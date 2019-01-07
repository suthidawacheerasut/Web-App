<?php
include 'db.php';  
  
 class Orderline
{
    private $quantity;


    public function setOrderline($q){
        $this->quantity = $q;

    }
 
    public function addToCart($no,$d,$orderno){

        $arr = array(  
                'orderno'       =>     $orderno,  
                'lotteryno'     =>     $no,  
                'date_'         =>     $d, 
                'quantity'      =>     $this->quantity
        ); 

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $t = $mysql->J_Insert($arr,"Orderline");
        $mysql->J_Close();
      


    }



    public function detailOrder($orderno){
        $mysql = new DB;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

        $sql = "SELECT * 
                FROM orderline,ordering 
                WHERE  orderline.orderno = ordering.orderno AND ordering.orderno = $orderno";
        $data = $mysql->J_Execute($sql);
     
        $mysql->J_Close();
         return $data;
    }


    public function printReceipt($orderno){

        $mysql = new DB;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

        $sql = "SELECT * 
                FROM member,orderline,ordering 
                WHERE member.id_member = ordering.id_member and orderline.orderno = ordering.orderno AND ordering.orderno = $orderno";

        $data = $mysql->J_Execute($sql);
     
        $mysql->J_Close();
        return $data;
    }
}
?>