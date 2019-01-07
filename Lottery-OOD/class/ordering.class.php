<?php


 class Ordering
{
     private $orderno;
     private $saledate ;
     private $saletime;
     private $totalprice;
     private $status ;
     private $totalquantity ;


    public function setOrdering($sdate,$stime,$price,$totalq){

       $this->saledate      = $sdate;
       $this->saletime      = $stime;
       $this->totalprice    = $price;
       $this->totalquantity = $totalq;

  

    }


    public function createOrder($idm,$idd){

      if($idd == ' '){
          $arr = array(  
         
           'saledate'     =>     $this->saledate,  
           'saletime'     =>     $this->saletime , 
           'totalprice'   =>     $this->totalprice,
          'totalquantity' =>     $this->totalquantity,
          'id_member'     =>     $idm
      
         );  

      }else{
         $arr = array( 
            'id_delivery'   =>   $idd,  
            'saledate'      =>   $this->saledate,  
            'saletime'      =>   $this->saletime , 
            'totalprice'    =>   $this->totalprice,
            'totalquantity' =>   $this->totalquantity,
            'id_member'     =>   $idm
         );
      }


        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $t = $mysql->J_Insert($arr,"ordering");
        $mysql->J_Close();

        return $t;
    }



    public function calTotal($q){

        $this->totalPrice = $q*80;
        return $this->totalPrice;
    }


 
    public function getOrder($select,$idm){
          $mysql = new Databases;
          $mysql->J_Connect();
          $mysql->set_char_utf8();
              if($select == 'all'){
                  $sql = "SELECT * FROM Ordering where id_member = '$idm' order by orderno desc";
                  $data = $mysql->J_Execute($sql);
                  
              }
              else if($select == 'one'){
                   $sql = "SELECT orderno FROM Ordering where saledate = '$this->saledate' and saletime = '$this->saletime' 
                   and id_member = '$idm'";
                   $arr = $mysql->J_Execute($sql);
                    foreach($arr as $read){
                       $data = $read['orderno'];
                     }


              }

                $mysql->J_Close();
                return $data;

    }



    public function setStatus($status,$no){

          $mysql = new Databases;
          $mysql->J_Connect();
          $mysql->set_char_utf8();
          $this->status = $status;
          $sql = "Update ordering set status_ = '".$this->status."' where orderno = $no" ;
          $data = $mysql->connect($sql);
          $mysql->J_Close();
          return 1;


         

    }
 


    public function saleSumary(){

          $mysql = new Databases;
          $mysql->J_Connect();
          $mysql->set_char_utf8();

          $sql =   "SELECT date_ ,SUM(totalprice) AS totalp,SUM(quantity) as totalq
                   FROM ordering,orderline
                   WHERE ordering.orderno = orderline.orderno
                   GROUP BY date_
                   ORDER BY date_ DESC";

          $rs = $mysql->J_Execute($sql);
          $mysql->J_Close();
          return $rs;


       

    }



    public function confirmPayment(){

          $mysql = new Databases;
          $mysql->J_Connect();
          $mysql->set_char_utf8();

          $sql = "SELECT *
                  FROM ordering
                  ORDER BY ordering.orderno desc";
       
          $data= $mysql->J_Execute($sql);
          $mysql->J_Close();
    
          return $data;

    }
}
?>