<?php


class query{
function onLoad(){
  include ('config.php');
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
         switch($action){
           case "bill":
             $this->addBill();
             break;

           case "billgrp":
             $this->
             break;

           case "editu":
             $this->editUser();
             break;

           case "editug":
             $this->UserGroup();
             break;

           case "pay":
             $this->
             break;

          case "request":
            $this->compReq();
            break;
         }
      }else{
      }
    }

    function addBill(){
      include ('config.php');
      if ($db->connect_error) {
         die("Connection failed: " . $db->connect_error);
       }else{
         $lendor = $_POST["lendor"];
         $debtor = $_POST["debtor"];
         $addAmt = $_POST["amt"];
         $notes = $_POST["notes"];
         $getSql = "SELECT lendor, amt from tab where lendor = $lendor and debtor = $debtor";
         $iniAmt = $db->query($getSql);
         $row = $iniAmt->fetch_assoc();
         $numrows = mysql_num_rows($iniAmt);
         if($numrows = 1){
           $total = $row["amt"] + $addAmt;
           $updateSql = "UPDATE tab set amt = $total where lendor = $lendor and debtor = $debtor";
           $result = $db->query($updateSql);
         }else{
           $insertSql = "INSERT into tab (tabnum, lendor, amt, debtor) SELECT maxnumval, $lendor, $addAmt, $debtor from maxnum where maxnum = 5";
            $result = $db->query($insertSql);
            $updateMax = "UPDATE maxnum set maxnumval = maxnumval + 1 where maxnum = 5";
            $result = $db->query($updateMax);
         }
         $db->close();
       }
    }

    function editUser(){
      include('config.php');
      if($db->connect_error){
        die("Connection failed: ".$db->connect_error);
      }else{
        $usernum = $_POST["usernum"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $pwreset = $_POST["pwreset"];
        $deactivate = $_POST["deactivate"];

        if($deactivate !== ''){
          $deactivateSql = "UPDATE user set active = 0 where usernum = $usernum";
          $result = $db->query($deactivateSql);
        }else{
          $userSql = "UPDATE user set username = '$username', email = '$email', fname = '$fname', lname = '$lname'  where usernum = $usernum";
          $result = $db->query($userSql);
          if($pwreset !== ''){
            $pwSql = "UPDATE user set password = 'password' where usernum = $usernum";
            $pw = $db->query($pwSql);
          }
        }
      $db->close();
      }
    }

    function UserGroup(){
      $ugnum = $_POST["ugnum"];
      $addArray = array($_POST["addusers"]);
      $removeArray = array($_POST["removeusers"]);

    }

    function compReq(){
      include ('config.php');
      $compArr = $_POST['compArr'];
      echo($compArr);
      $updateSql = "UPDATE requesttable set status = 1 where requestnum in ($compArr)";
      $result = $db->query($updateSql);
      $db->close();
    }
  }

    $start = new query();
    $start->onLoad();

?>
