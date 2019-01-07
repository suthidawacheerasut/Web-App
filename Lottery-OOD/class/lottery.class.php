<?php
 include 'database.php';  


 class Lottery
{
  private $lottery_number;
  private $quantity ;
  private $price  ;
  private $issue_date;
  private $count ;
  private $photo;
  private $period;
  private $status;
 

  function Lottery(){
    $this->quantity = 30;
    $this->price = 80;
    $this->count = 0;


  }


  public function setLottery($num,$d,$p,$q,$c,$s,$photo){

    $this->lottery_number = $num;
    $this->quantity = $q;
    $this->issue_date = $d;
    $this->period = $p;
    $this->count = $c;
    $this->status = $s;
    $this->photo = $photo;
   


  }


  public function viewLottery($key)
  {
   
    $mysql = new Databases;
    $mysql->J_Connect();
    $mysql->set_char_utf8();

      if($key=='normal'){

          $sql = "SELECT * FROM lottery order by issue_date desc ";
      }
      else if($key == 'date'){

          $sql = "SELECT distinct issue_date FROM lottery group by issue_date";

      }else{

          $sql = "SELECT * FROM lottery where issue_date like '%$key'  order by lottery_number";
  
      
      }
        
        $data = $mysql->J_Execute($sql);
        $mysql->J_Close();
        return $data;

      

 
  }
 

  public function viewStock($by,$d){

      $mysql = new Databases;
      $mysql->J_Connect();
      $mysql->set_char_utf8();
      if($by=='bylot'){

          $sql = "SELECT * FROM lottery
                  where issue_date = '$d'
                  order by issue_date desc ";

      }else if($by=='bydate'){
          $sql = "SELECT issue_date,period,quantity,count(lottery_number) as count_,SUM(quantity) AS remain
                  FROM lottery
                  GROUP BY issue_date
                  order by issue_date desc ";
          
      }

        $lottery = $mysql->J_Execute($sql);
        $mysql->J_Close();
        return $lottery;
  }
 


  public function searchLottery($key){

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $sql = "SELECT * FROM lottery where lottery_number like '%$key' and CURDATE() <= date(issue_date) ";
        $lotter = $mysql->J_Execute($sql);
        foreach ($lotter as $read) {
          if($read['quantity'] <= 0){

              $this->lottery_number = $read['lottery_number'];
              $this->issue_date = $read['issue_date'];
              $this->setStatus('สินค้าหมด');

             $lotter = $mysql->J_Execute($sql);
          }
          else{
              $this->lottery_number = $read['lottery_number']; 
              $this->issue_date = $read['issue_date'];
              $this->count =  $read['count']+1;
        
              $sql1 = "Update lottery set count = ".$this->count." 
                      where lottery_number = ".$this->lottery_number." and issue_date = '".$this->issue_date."'";
        
              $lotter = $mysql->connect($sql1);
              $lotter = $mysql->J_Execute($sql);

          
          }
          

        }

         $mysql->J_Close();
         return $lotter;

  }
  

  public function getPop(){

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $sql = "SELECT * FROM lottery where count >= 20 and CURDATE() <= date(issue_date)  order by count desc";
        $data = $mysql->J_Execute($sql);
          foreach($data as $read){
             if($read['quantity'] <= 0){
                $this->lottery_number = $read['lottery_number'];
                $this->issue_date = $read['issue_date'];
                $this->setStatus('สินค้าหมด');
                $data = $mysql->J_Execute($sql);
              }
          }

            $mysql->J_Close();
            return $data;
 }


  public function manageLottery($manage,$id,$d){

        $arr = array(  
                    'lottery_number'   =>    $this->lottery_number,  
                    'quantity'         =>    $this->quantity,  
                    'price'            =>    $this->price, 
                    'issue_date'       =>    $this->issue_date,
                    'count'            =>    $this->count,
                    'photo'            =>    $this->photo,
                    'period'           =>    $this->period,
                    'status'           =>    $this->status
        );  
   

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

         if($manage == 'add'){
              $sql = "SELECT * FROM lottery ";
              $data= $mysql->J_Execute($sql);
              foreach($data as $read){
                    if($read['lottery_number'] == $this->lottery_number && $read['issue_date'] == $this->issue_date){
                       return 3;
                       break;
                     
                    }
              }
          
              $rs =  $mysql->J_Insert($arr,"lottery");

         }else if($manage == 'select'){
              $sql = "SELECT * FROM lottery where lottery_number = '$id' and issue_date = '".$d."'";
              $rs = $mysql->J_Execute($sql); 
         }
         else if($manage == 'edit'){
          
           $sql = "Update lottery set quantity = ".$this->quantity.",price = ".$this->price."
        ,issue_date = '".$this->issue_date."',count = ".$this->count.",period = '".$this->period."', status = '".$this->status."', photo = '".$this->photo."' 
         where lottery_number = ".$id." and issue_date = '".$d."'";
          $rs = $mysql->connect($sql);


         }else if($manage == 'delete'){

            $sql = "DELETE FROM lottery WHERE lottery_number = ".$id."
            and issue_date = '".$d."'";
            $rs = $mysql->connect($sql);
         }
         
              return $rs;
              $mysql->J_Close();
       
  }


  public function setStatus($status){

        $this->status = $status;
        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $sql = "Update lottery set status = '".$this->status."' where lottery_number = ".$this->lottery_number." and issue_date = '".$this->issue_date."'";
        $rs = $mysql->connect($sql);
        $mysql->J_Close();
 
       
  }

}
?>