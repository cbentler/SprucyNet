<?php
        $servername = "localhost";
        $username = "cbentle";
        $password = "guest";
        $dbname = "sprucypay";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * from user WHERE usernum > 0";
        $result = $conn->query($sql);


              echo "results";
              $var = '';
             // output data of each row
             while($row = $result->fetch_assoc()) {

                 $a = '<tr><td>'. $row["usernum"].'</td><td>'. $row["username"].'</td><td>'. $row["email"].'</td><td>'. $row["fname"].'</td><td><input type="button" class="pwResetBtn" id="pwResetBtn'. $row["usernum"].'" name="pwResetBtn" value="?"/></td></tr>';
                 $var .= $a;
             }

             echo ($var);

        $conn->close();
?>
