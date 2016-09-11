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

  function onLoad(){
        if (isset($_POST['action'])) {
          $action = $_POST['action'];

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

           }

        }
        else{

        }
      }
}

$start = new query();
$start->onLoad();


?>
