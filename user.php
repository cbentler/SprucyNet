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

        if ($result->num_rows > 0) {
              echo "results";
             // output data of each row
             /*while($row = $result->fetch_assoc()) {
                 //echo "<br> id: ". $row["requestnum"]. " - Name: ". $row["requestor"]. " " . $row["status"] . "<br>";
                 echo '<tr><td>'. $row["requestnum"].'</td><td>'. $row["requestor"].'</td><td>'. $row["title"].'</td><td>'. $row["mediatype"].'</td><td>'. $row["requestdate"].'</td><td>'. $row["comments"].'</td><td><input type="button" id="deleteButton'. $row["requestnum"].'" name="deleteButton" value="?" onclick="q()"/></td></tr>';
             }*/
        } else {
             echo "0 results";
        }

        $conn->close();
?>
