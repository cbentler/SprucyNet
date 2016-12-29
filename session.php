<!--SprucyNet v1.0.0 12-28-16-->
<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];
   $startTime = $_SESSION['timeout'];
   $endTime = $startTime + 30000;
   $nowTime = time();

   $ses_sql = $db->prepare("SELECT usernum, username from user where username = :username ");
   $ses_sql->execute( array(':username' => $user_check));

   $result = $ses_sql->fetchColumn();

   $_SESSION['usernum'] = $result;

   $adminsql = $db->prepare("SELECT usergrpnum from uxug where usernum = :usernum");
   $adminsql->execute( array(':usernum' => $result));

   $_SESSION['adminug'] = false;
/*
   while($ugresult = $adminsql->fetch(PDO::FETCH_ASSOC)){
     if($ugresult == 1){
       $_SESSION['adminug'] = true;
     }else{
       //$_SESSION['adminug'] = false;
     }
   }
*/
  if($nowTime > $endTime){
    header("location:logout.php");
  }else{
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
  }
?>
