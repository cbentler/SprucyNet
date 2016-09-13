<?php
/*<!--SprucyNet v0.0.4 9-10-16-->*/

class query{
  function getUserDS(){
    $servername = "localhost";
    $username = "cbentle";
    $password = "guest";
    $dbname = "sprucynet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT username from user where usernum > 0";
    $result = $conn->query($sql);
    $optHTML = '<option value="default"></option>';
    while($row = $result->fetch_assoc()){
      $opt = '<option value="'.$row["username"].'">'.$row["username"].'</option>';
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

    $sql = "SELECT usergrpname from usergrp where usergrpnum > 0";
    $result = $conn->query($sql);
    $optHTML = '<option value="default"></option>';
    while($row = $result->fetch_assoc()){
      $opt = '<option value="'.$row["usergrpname"].'">'.$row["usergrpname"].'</option>';
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
    $sql1 = "SELECT username from user where usernum not in (select usernum from uxug where usergrpnum = $param)";
    $result1 = $conn->query($sql1);
    $optHTML = '<select multiple="multiple" class="ugassign" id="available">';
    while($row = $result1->fetch_assoc()){
      $opt = '<option value="'.$row["username"].'">'.$row["username"].'</option>';
      $optHTML .= $opt;
    }
//add button
      $optHTML .= '</select><button type="button" id="add" class="ugbtn" onClick="ugAddSelected();">Add</button><button id="remove" type="button" onClick="ugRemoveSelected();"class="ugbtn">Remove</button><select multiple="multiple" class="ugassign" id="assigned">';

//in user group
    $sql2 ="SELECT username from user where usernum in (select usernum from uxug where usergrpnum = $param)";
    $result2 = $conn->query($sql2);
    while($row = $result2->fetch_assoc()){
      $opt = '<option value="'.$row["username"].'">'.$row["username"].'</option>';
      $optHTML .= $opt;
    }

    echo ($optHTML);
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
