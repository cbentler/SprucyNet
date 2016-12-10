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

    function UserGroup(){
      include('config.php');
      if($db->connect_error){
        die("Connection failed: ".$db->connect_error);
      }else{
        $ugnum = $_POST["ugnum"];
        $addList = $_POST["addusers"];
        $addArray = explode(',',$addList);
        $removeList = $_POST["removeusers"];
        $removeArray = explode(',',$removeList);
        if($addList !== ''){
          for($i = 0; $i < count($addArray); $i++){
            $stmt = $db->prepare("INSERT into uxug (usergrpnum, usernum) VALUES(:ugnum, :usernum)");
            $stmt->execute(array(
              ':ugnum' => $ugnum,
              ':usernum' => $addArray[$i]
            ));
          }
        }
        if($removeList !== ''){
          for($i = 0; $i < count($removeArray); $i++){
            $stmt = $db->prepare("DELETE from uxug where usergrpnum = :ugnum and usernum = :usernum");
            $stmt->execute(array(
              ':ugnum' => $ugnum,
              ':usernum' => $removeArray[$i]
            ));
          }
        }
      }
      $db->close();

    }

    function editUser(){
      include('config.php');

        //$usernum = $_POST["usernum"];
        $usernum = $_POST["usernum"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $pwreset = $_POST["pwreset"];
        $deactivate = $_POST["deactivate"];

        $password = "password";
        $hashpw = password_hash($password, PASSWORD_DEFAULT);

        if($deactivate !== ''){
          $query = "UPDATE user set active = 0 where usernum = :usernum";
          $deactivateSql = $db->prepare($query);
          $deactivateSql->bindValue(':usernum', $usernum);
          $deactivateSql->execute();
        }else{
          $userSql = $db->prepare("UPDATE user set username = :username, email = :email, fname = :fname, lname = :lname  where usernum = :usernum");
          $userSql->execute(array(
            ":username" => $username,
            ":email" => $email,
            ":fname" => $fname,
            ":lname" => $lname,
            ":usernum" => $usernum
          ));
          if($pwreset !== ''){
            $pwSql = $db->prepare("UPDATE user set password = :password and pwreset = 1 where usernum = :usernum");
            $pwSql->execute(array(':usernum' => $usernum, ':password' => $hashpw));
          }
        }
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
