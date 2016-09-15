
<?php
/* <!--SprucyNet v0.0.4 9-10-16-->*/
        $servername = "localhost";
        $username = "cbentle";
        $password = "guest";
        $dbname = "sprucynet";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * from user WHERE usernum > 0 AND active = 1";
        $result = $conn->query($sql);


              echo "results";
              $var = '';
             // output data of each row
             while($row = $result->fetch_assoc()) {

                 $a = '<tr><td>'. $row["usernum"].'</td><td id="username'. $row["usernum"].'">'. $row["username"].'</td><td id="email'. $row["usernum"].'">'. $row["email"].'</td><td id="fname'. $row["usernum"].'">'. $row["fname"].'</td>';
                 $a .= '<td id="lname'. $row["usernum"].'">'.$row["lname"].'</td><td><button type="button" class="editBtn" id="editBtn'. $row["usernum"].'" name="editBtn" onClick="editUser(this.id);"><img src="resources/pencil.png"></button></td></tr>';
                 $var .= $a;
             }

             echo ($var);

        $conn->close();
?>
