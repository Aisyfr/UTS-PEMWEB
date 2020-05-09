<?php  

   require_once "config.php"; 

   if(isset($_POST['kirim'])){ 

     $nama = $_POST['nama']; 

     $email = $_POST['email']; 

     $password = $_POST['password']; 

     if($user->register($nama, $email, $password)){ 
       $success = true; 
     }else{
       $error = $user->getLastError(); 

     } 

   } 

  ?> 

 <!DOCTYPE html>  

 <html>  

   <head> 

     <title>Sign Up</title> 

   </head> 

   <body> 

      <div class="form"> 

        <form class="register-form" method="post"> 

        <?php if (isset($error)): ?> 

          <div class="error"> 

            <?php echo $error ?> 

          </div> 

        <?php endif; ?> 

        <?php if (isset($success)): ?> 

          <div class="success"> 

            <meta http-equiv="refresh" content="3,URL=home.php">

          </div> 

        <?php endif; ?> 

         Nama <input type="text" name="nama" placeholder="nama" required/> <br>

         Email <input type="email" name="email" placeholder="email address" required/> <br>

         Password <input type="password" name="password" placeholder="password" required/> <br>

         <button type="submit" name="kirim">Sign Up</button> 

         <p class="message">Sudah Memiliki Akun? <a href="login.php">Sign In</a></p> 

        </form> 

      </div> 

   </body> 

 </html>  