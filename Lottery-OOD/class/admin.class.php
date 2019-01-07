<?php

 include 'database.php';  

 

 class Administrator
{
    private $id_admin;
    private $password ;

    public function setAdmin($id,$password){
        $this->id_admin = $id;
        $this->password = $password;


    }


    public function viewOrder() {
   
        $mysql = new Db;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

         if($key=='normal'){
          $sql = "SELECT * FROM lottery order by issue_date,lottery_number desc";
         }
        
        $rs = $mysql->J_Execute($sql);
        $mysql->J_Close();

        return $rs;

    
 
    }



    public function loginAdmin(){
       
        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

        $sql = "SELECT * FROM administrator WHERE id_admin = "."'"."$this->id_admin"."'"." AND password = "."'"."$this->password"."'";
  
        $rs = $mysql->J_Execute($sql);

        foreach($rs as $read){
          $mysql->J_Close();
          return 1;

        }
          return 0;

    }
}
?>