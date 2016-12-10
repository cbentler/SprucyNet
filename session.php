<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = $db->prepare("SELECT usernum, username from user where username = :username ");
   $ses_sql->execute( array(':username' => $user_check));

   $result = $ses_sql->fetchColumn();

   $_SESSION['usernum'] = $result;


   if(!isset($_SESSION['login_user'])){
      header("location:login.php");

   }
?>
