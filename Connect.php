<?php

   class Connect{
   
     public $servername = "localhost";
         public $Cusername = "root";
      public $Cpassword = "root";
        public  $db="Test";
     public function __construct(){
       
         $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db,$this->Cusername,$this->Cpassword);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
         }
       
         public function showData($uname,$pass){
        
        
        $stmt =$this->conn->prepare("SELECT * FROM registerUser WHERE username = '$uname' AND pass = '$pass' ;");
    
    $record=$stmt->execute();
    return $record;
        
         }


         

         public function insertData($data){
        $this->d=$data;
           $sql="INSERT INTO registerUser (id,rname,email,gender,dob,qualification,username,pass) VALUES (:id, :rname, :email, :gender, :dob, :qualification, :username, :pass)";

            $q = $this->conn->prepare($sql);
          
            $q->execute($this->d);
           
            return true;
          
            }
         
        
        
        

   }


?>