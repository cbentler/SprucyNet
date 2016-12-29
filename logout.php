<!--SprucyNet v1.0.0 12-28-16-->
<?php
   session_start();

   if(session_destroy()) {
      header("Location: login.php");
   }
?>
