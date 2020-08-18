<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login</title>

    <?php include 'style.php' ?>
    <?php include 'links.php' ?>
    
</head>
<body>

<?php
  
  include 'dbconnection.php';
  if(isset($_POST['submit'])){
      
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $email_search = "select * from registration where email='$email'";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            ?>
                <script>
                    alert("login successful");
                    location.replace('home.php');
                </script>
           <?php
        }else{
            ?>
                <script>
                    alert("password incorrect");
                </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert("email already exists");
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
                         <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email address" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="" required>
               </div>
               <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit" >Login Now</button>
               </div>
               <p class="text-center">Not have an account? <a href="registration.php">Sign up here.</a></p>
            </form>
        
    </article>
     
</div>



</body>
</html>