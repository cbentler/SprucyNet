<!--SprucyNet Account Creation Script 8-24-16 v.0.0.3-->

<?php
$servername = "localhost";
$username = "cbentle";
$password = "guest";
$dbname = "sprucynet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO user (usernum, username, password, email, amtowed, fname, lname)
   SELECT maxnumval,
   \"{$_POST['username']}\",
   \"{$_POST['password']}\",
   \"{$_POST['email']}\",
   0,
   \"{$_POST['fname']}\",
   \"{$_POST['lname']}\"


   from
   sprucypay.maxnum
   where
   maxnum = 1";

   if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $update = "update sprucypay.maxnum set maxnumval = maxnumval + 1 where maxnum = 1";

   if ($conn->query($update) === TRUE) {
       echo "Update Successful";
   } else {
       echo "Error: " . $update . "<br>" . $conn->error;
   }

   $conn->close();


?>
