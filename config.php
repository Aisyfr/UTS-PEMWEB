 <?php 
      try 
      { 
           $con = new PDO('mysql:host=localhost;dbname=pemweb', 'root', '', array(PDO::ATTR_PERSISTENT => true)); 
      } 
      catch(PDOException $e) 
      { 
           echo $e->getMessage(); 
      } 
      include_once 'user.php'; 
      $user = new user($con); 
 ?> 