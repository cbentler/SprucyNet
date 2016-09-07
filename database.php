//SprucyNet database queries PHP 9-6-16 v.0.0.3

<?php

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

           }


           function getUserDS(){
             $sql = "SELECT username from user where usernum > 0";
             $result = $conn->query($sql);
             $optHTML = '';
             while($row = $result->fetch_assoc()){
               $opt = '<option value="'.$row["username"].'">'.$row["username"].'</option>';
               $optHTML .= $opt;
             }
             echo json_encode($optHTML);
             $conn->close();
           }

           function getUserGrpDS(){
             $sql = "SELECT usergrpname from usergrp where usergrpnum > 0";
             $result = $conn->query($sql);
             $optHTML = '';
             while($row = $result->fetch_assoc()){
               $opt = '<option value="'.$row["username"].'">'.$row["username"].'</option>';
               $optHTML .= $opt;
             }
             echo json_encode($optHTML);
             $conn->close();
           }


        }
        else{
          echo("butts");
        }

?>
