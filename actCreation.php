<?php
/*<!--SprucyNet v0.0.4 9-10-16-->*/
include("config.php");

  $password = $_POST['password'];
  $hashpw = password_hash($password, PASSWORD_DEFAULT);

   $sql = $db->prepare("INSERT INTO user (usernum, username, password, email, amtowed, fname, lname, active)
   SELECT maxnumval, :username, :password, :email, 0, :fname, :lname, 1
   FROM maxnum WHERE maxnum = 1");

   $sql->execute(array(':username' => $_POST['username'], ':password' => $hashpw, ':email' => $_POST['email'], ':fname' => $_POST['fname'], ':lname' => $_POST['lname']));


   $update = $db->prepare("update sprucynet.maxnum set maxnumval = maxnumval + 1 where maxnum = 1");
   $update->execute();


   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   header('Location: home.php');
   exit();

?>
