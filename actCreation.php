<?php
/*<!--SprucyNet v0.0.4 9-10-16-->*/
$servername = "localhost";
$username = "cbentle";
$password = "guest";
$dbname = "sprucynet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO user (usernum, username, password, email, amtowed, fname, lname, active)
   SELECT maxnumval,
   \"{$_POST['username']}\",
   \"{$_POST['password']}\",
   \"{$_POST['email']}\",
   0,
   \"{$_POST['fname']}\",
   \"{$_POST['lname']}\",
   1


   from
   sprucynet.maxnum
   where
   maxnum = 1";

   if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $update = "update sprucynet.maxnum set maxnumval = maxnumval + 1 where maxnum = 1";

   if ($conn->query($update) === TRUE) {
       echo "Update Successful";
   } else {
       echo "Error: " . $update . "<br>" . $conn->error;
   }

   $conn->close();

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   header('Location: home.php');
   exit();

?>
