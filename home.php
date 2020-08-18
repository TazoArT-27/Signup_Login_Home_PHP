<?php
  session_start();

  if(!isset( $_SESSION['username'])){
      ?>

        <script>
           alert('You have been logged out');
        </script>

      <?php
      header('location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Home</title>
    <?php include 'homestyle.php' ?>
    <?php include 'links.php' ?>
    
    
    
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="https://i.postimg.cc/GpdP362Q/logo.png" alt="">
            </div>
    <ul class="nav-area">
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Portfolio</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="logout.php">Log out</a></li>
    </ul>
    </div>
    <div class="welcome-text">
            <h1>Hello, This is <?php echo $_SESSION['username']; ?></h1>
    <a href="#">Contact US</a>
        </div>
    </header>
    
</body>
</html>