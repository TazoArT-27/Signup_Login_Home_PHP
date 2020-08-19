<?php
  // $server = "sql310.epizy.com";
  // $user ="epiz_26532098";
  // $password = "NGc1UefxGBO";
  // $db = "epiz_26532098_userlogin";
  $server = "localhost";
  $user ="root";
  $password = "";
  $db = "signup";

  $con = mysqli_connect($server, $user, $password, $db);

  if($con){
      ?>
        <script>
            alert("connection successful");
        </script>
       <?php
  }else{
            ?>
        <script>
            alert("no connection");
        </script>
        <?php
  }
?>