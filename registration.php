<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Sign up</title>

    <?php include 'style.php' ?>
    <?php include 'links.php' ?>
    
</head>
<body>

<?php

    include 'dbconnection.php';

    if(isset($_POST['submit'])){
         $username = mysqli_real_escape_string($con, $_POST['username']);
         $email = mysqli_real_escape_string($con, $_POST['email']);
         $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
         $password = mysqli_real_escape_string($con, $_POST['password']);
         $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    }

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from registration where email='$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0){
         echo "Email already exists";
    }else{
         if($password === $cpassword){
              //for inserting into database
              $insertquery = "insert into registration(username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";

              //for showing into database
              $iquery = mysqli_query($con, $insertquery);
              if($con){
               ?>
                 <script>
                     alert("inserted successful");
                 </script>
                <?php
                }else{
                     ?>
                 <script>
                     alert("not inserted");
                 </script>
                 <?php
           }
         }else{
               ?>
                    <script>
                        alert("Password didn't matched");
                    </script>
               <?php
              
         }
    }
 
?>






     <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
           <h4 class="card-title mt-3 text-center">Create Account</h4>
           <p class="text-center">Get started with your free account</p>
           <p>
               <a href="" class="btn btn-block btn-gmail"><i class="fab fa-google-plus-square"></i>Login via Gmail</a>
               <a href="" class="btn btn-block btn-facebook"><i class="fab fa-facebook-square"></i>Login via Facebook</a>

           </p>
           <p class="divider-text">
               <span class="bg-light">OR</span>
           </p>
           <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="Full name" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email address" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="number" class="form-control" name="mobile" placeholder="Phone number" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Create password" value="" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="cpassword" placeholder="Repeat password" required>
               </div>
               <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit" >Create Account</button>
               </div>
               <p class="text-center">Have an account? <a href="login.php">Login</a></p>

           </form>
        
        </article>
     
     </div>
    
     
</body>
</html>