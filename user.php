<?php  
   class User
   { 
     private $db; 
     private $error;
     function __construct($db_conn) 
     { 
       $this->db = $db_conn;  
       session_start(); 
     } 
     public function register($nama, $email, $password) 
     { 
       try 
       { 

         $hashPasswd = password_hash($password, PASSWORD_DEFAULT); 

         $stmt = $this->db->prepare("INSERT INTO users(nama, email, password) VALUES(:nama, :email, :pass)"); 

         $stmt->bindParam(":nama", $nama); 

         $stmt->bindParam(":email", $email); 

         $stmt->bindParam(":pass", $hashPasswd); 

         $stmt->execute(); 

         return true; 

       }catch(PDOException $e){ 
         if($e->errorInfo[0] == 23000){ 
           $this->error = "Email sudah digunakan!"; 
           return false; 
         }else{ 

           echo $e->getMessage(); 

           return false; 

         } 

       } 

     } 
}
 ?> 
