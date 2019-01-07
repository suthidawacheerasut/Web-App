<?php
 include 'database.php';  

 class Member
{
    private $id_member;
    private $password;
    private $fName;
    private $lName;
    private $phone;
    private $address;


    public function setMember($id,$pw,$fn,$ln,$phone,$ad){
      $this->id_member = $id;
      $this->password = $pw;
      $this->fName = $fn;
      $this->lName = $ln;
      $this->phone = $phone;
      $this->address = $ad;



    }


    public function loginMember($id,$pw)
    {

      $mysql = new Databases;
      $mysql->J_Connect();
      $mysql->set_char_utf8();
      $sql = "SELECT * FROM member WHERE id_member = "."'"."$id"."'"." AND password = "."'"."$pw"."'";
      $rs = $mysql->J_Execute($sql);
      foreach($rs as $read){

          $mysql->J_Close();
          return 1;

      }
          return 0;

    }


    public function editProfile(){

      $mysql = new Databases;
      $mysql->J_Connect();
      $mysql->set_char_utf8(); 

      $sql = "Update member set password = '".$this->password."',fName = '".$this->fName."'
        ,lName = '".$this->lName."',phone = '".$this->phone."',address = '".$this->address."'
         where id_member = '".$this->id_member."'";
       
      $a = $mysql->connect($sql);
      $mysql->J_Close();
      return $a;

    }


    public function register(){

      $mysql = new Databases;
      $mysql->J_Connect();
      $mysql->set_char_utf8();
      $arr = array(  
           'id_member'    =>     $this->id_member,  
           'password'     =>     $this->password,  
           'fName'        =>     $this->fName, 
           'lName'        =>     $this->lName,
           'phone'        =>     $this->phone,
           'address'      =>     $this->address
      );  

      $sql = "SELECT * FROM member ";
      $data= $mysql->J_Execute($sql);
        foreach($data as $read){
             if($read['id_member'] == $this->id_member){
                return 3;
             }
        }

    
      $t = $mysql->J_Insert($arr,"member");
      $mysql->J_Close();
      return $t;


    }



    public function showProfile($id){
        
        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();
        $sql = "SELECT * FROM member where id_member = '$id'";
        $data= $mysql->J_Execute($sql);
        $mysql->J_Close();
        return $data;
    }



    public function manageMember($user,$key){


        $mysql = new Databases;
        $mysql->J_Connect();
        $mysql->set_char_utf8();

         if($user == 'view'){
            $sql = "SELECT * FROM member order by id_member ";
            $rs = $mysql->J_Execute($sql);
      
         }else if($user == 'delete'){

            $sql1 = "DELETE FROM ordering WHERE id_member = '".$key."'";
            $mysql->connect($sql1);
            $sql2 = "DELETE FROM member WHERE id_member = '".$key."'";
            $rs = $mysql->connect($sql2);

         }
            $mysql->J_Close();

         return $rs;


  }

}
?>