<?php

 

 class Delivery
{
    private $id_delivery;
    private $name ;
    private $newAddress ;
    private $phone ;
    

    public function setDelivery($name,$newad,$phone){

      $this->name = $name;
      $this->newAddress = $newad;
      $this->phone = $phone;

    }


    public function getDelivery(){

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $sql = "SELECT id_delivery FROM Delivery where newAddress = '".$this->newAddress."'";
        $data = $mysql->J_Execute($sql);
        foreach($data as $read){
          $id = $read['id_delivery'];
        }
        return $id;  
        $mysql->J_Close();


    }
  

    public function saveDelivery(){
   
   
        $arr = array(  
          'name' => $this->name, 
           'newAddress' => $this->newAddress,
          'phone' => $this->phone );  

        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $t = $mysql->J_Insert($arr,"Delivery");
        $mysql->J_Close();
    
 
    }



 

}
?>