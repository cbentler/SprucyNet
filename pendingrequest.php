<!--Server Home v.1.3 5-18-2016-->

<!DOCTYPE html>
<html>
    <head>
    <title>
			Server Requests
		</title>
		<style>
    #banner{
    background-color: #3b5998;
    min-height: 90px;
    max-height: 100px;
    width: 100%;
    }

    body {
    font-family: "Lato", sans-serif;
    margin: 0px;
    }

			table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
			}

			th, td {
			border: 1px solid black;
			}
		</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript">
      function getFileText(){
        $.get("output.txt", function(data){
          var reqArr = data.split(/\n/);
          var HTMLText = '<tr><th style="width: 10%;">Requestor</th><th style="width: 35%">Title</th><th style="width: 10%;">Media Type</th><th style="width: 10%;">Date Requested</th><th style="width: 35%">Comments</th><th>Button</th></tr>';

          for (i = 0; i < reqArr.length; i++) {
            var reqSubArr = reqArr[i].split("_");
                if(reqSubArr != ''){
                HTMLText += '<tr><td>'+reqSubArr[1]+'</td><td>'+reqSubArr[3]+'</td><td>'+reqSubArr[2]+'</td><td>'+reqSubArr[0]+'</td><td>'+reqSubArr[7]+'</td><td><input type="button" id="deleteButton'+[i]+'" name="deleteButton" value="?" onclick="q()"/></td></tr>';
              }
          }

          $('#pendingReq').html(HTMLText);

      });
      }

      function q(){
        alert('???');
      }

      function feedback(){
        alert("I aint got no time for yo bitch-ass feedback");
      }

      //getFileText();


		</script>
    <link rel="icon" href="/sprucynet/favicon.png">
	</head>
	<body>
    <div id="banner">
  		<a href="home.html">
  		    <img src="sprucy.png" alt="sprucy">
  		</a>
  	</div>
    <br>
    <br>


		<fieldset>
			<legend>Pending Requests</legend>
			<div>Below are the pending requests for the server.</div>
			<table id="pendingReq" name="pendingReq">
        <tr>
          <th style="width: 5%;">Req #</th>
          <th style="width: 10%;">Requestor</th>
          <th style="width: 35%">Title</th>
          <th style="width: 10%;">Media Type</th>
          <th style="width: 10%;">Date Requested</th>
          <th style="width: 30%">Comments</th>
          <th>Button</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "cbentle";
        $password = "guest";
        $dbname = "serverForm";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * from requesttable WHERE status = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              //echo "results";
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 //echo "<br> id: ". $row["requestnum"]. " - Name: ". $row["requestor"]. " " . $row["status"] . "<br>";
                 echo '<tr><td>'. $row["requestnum"].'</td><td>'. $row["requestor"].'</td><td>'. $row["title"].'</td><td>'. $row["mediatype"].'</td><td>'. $row["requestdate"].'</td><td>'. $row["comments"].'</td><td><input type="button" id="deleteButton'. $row["requestnum"].'" name="deleteButton" value="?" onclick="q()"/></td></tr>';
             }
        } else {
             echo "0 results";
        }

        $conn->close();
        ?>
			</table>
		</fieldset>
		<br>
		<input id="submitNew" name="submitNew" type="button" value="New Request" onclick="location.href='serverForm.html'" />
    <input id="feedback" name="feedback" type="button" onclick="feedback()" value="Feedback :)"/>
	</body>
</html>
