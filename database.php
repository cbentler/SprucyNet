<?php
/*<!--SprucyNet v1.0.0 12-28-16-->>*/

class query{
  function getUserDS(){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT username, usernum from user where usernum > 0";
    $result = $conn->query($sql);
    $optHTML = '<option value="default"></option>';
    while($row = $result->fetch_assoc()){
      $opt = '<option value="'.$row["usernum"].'">'.$row["username"].'</option>';
      $optHTML .= $opt;
    }
    echo ($optHTML);
    $conn->close();
  }

  function getUserGrpDS(){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT usergrpname, usergrpnum from usergrp where usergrpnum > 0";
    $result = $conn->query($sql);
    $optHTML = '<option value="default"></option>';
    while($row = $result->fetch_assoc()){
      $opt = '<option value="'.$row["usergrpnum"].'">'.$row["usergrpname"].'</option>';
      $optHTML .= $opt;
    }
    echo ($optHTML);
    $conn->close();
  }

  function getCats(){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT catname from category where catnum > 0 ORDER BY catnum";
    $result = $conn->query($sql);
    $optHTML = '<option value="default"></option>';
    while($row = $result->fetch_assoc()){
      $opt = '<option value="'.$row["catname"].'">'.$row["catname"].'</option>';
      $optHTML .= $opt;
    }
    echo ($optHTML);
    $conn->close();
  }

  function getUserGrpTable(){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * from usergrp where usergrpnum > 0 ORDER BY usergrpnum";
    $result = $conn->query($sql);
    $optHTML = '';
    while($row = $result->fetch_assoc()){
      $opt = '<tr><td>'.$row["usergrpnum"].'</td><td>'.$row["usergrpname"].'</td><td>'.$row["grouptype"].'</td><td><button type="button" class="editBtn" id="'. $row["usergrpnum"].'" name="editBtn'. $row["usergrpnum"].'" onClick="editUserGrp(this.id);"><img src="resources/pencil.png"></button></td></tr>';
      $optHTML .= $opt;
    }
    echo ($optHTML);
    $conn->close();
  }

  function userGrpEdit($param){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

//out of user group
    $sql1 = "SELECT usernum, username from user where usernum not in (select usernum from uxug where usergrpnum = $param) and active = 1";
    $result1 = $conn->query($sql1);
    $optHTML = '';
    while($row = $result1->fetch_assoc()){
      $opt = '<option value="'.$row["usernum"].'">'.$row["username"].'</option>';
      $optHTML .= $opt;
    }

//in user group
    $sql2 ="SELECT usernum, username from user where usernum in (select usernum from uxug where usergrpnum = $param)";
    $result2 = $conn->query($sql2);
    $optHTML2 = '';
    while($row = $result2->fetch_assoc()){
      $opt = '<option value="'.$row["usernum"].'">'.$row["username"].'</option>';
      $optHTML2 .= $opt;
    }

//ugname
    $sql3 ="SELECT usergrpname from usergrp where usergrpnum = $param";
    $result3 = $conn->query($sql3);
    $row = $result3->fetch_assoc();
    $optHTML3 = $row["usergrpname"];

    echo json_encode(array($optHTML, $optHTML2, $optHTML3));
    $conn->close();
  }

  function onLoad(){
        if (isset($_POST['action'])) {
          $action = $_POST['action'];
          if(isset($_POST['param'])){
            $param = $_POST['param'];
            $this->userGrpEdit($param);
          }else{
          $servername = "localhost";
          $username = "cbentle";
          $password = "guest";
          $dbname = "sprucynet";
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
           }
           switch($action){
             case 'user':
             $this->getUserDS();
             break;

             case 'userGrp' :
             $this->getUserGrpDS();
             break;

             case 'cat' :
             $this->getCats();
             break;

             case 'usergrptable' :
             $this->getUserGrpTable();
             break;
           }
         }
        }else{
        }
      }
    }


$start = new query();
$start->onLoad();


?>
