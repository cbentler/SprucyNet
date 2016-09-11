<!--SprucyNet v0.0.4 9-10-16-->

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
      border-collapse: collapse;
    }

    .reqtable th {
      background-color: #3b5998;
      color: white;
    }

    .reqtable tr:nth-child(even) {
      background-color: #f2f2f2 !important
    }
    .reqtable tr:nth-child(odd){
      background-color: #DFE3EE;
    }

    .reqtable td {
      text-align: center;
    }

    .contentHead{
      width: 100%;
      background-color: #3b5998;
      color: #fff;
      text-align: center;
  	  vertical-align: center;
      text-decoration: none;
      font-size: 20px;
      line-height: 51px;
    }
    .content{
      padding: 12px;
      background-color: #cdd3e5;
      min-height: 1000px;
    }

    .compBtn{
      background-color: #3b5998;
      color: #fff;
      height: 30px;
      width: 30px;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }

    .btnSelected{
      background-color: #FF0010;
      color: #fff;
      height: 30px;
      width: 30px;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }


    .modal{
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }

    .popContent{
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      width: 80%;
    }

    .popCancel{
      width: 60px;
      height: 40px;
      background-color: #FF0010;
      text-align: center;
      color: #FFF;
      font-size: 22pt;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }

      .popSubmit{
        width: 60px;
        height: 40px;
        background-color: #00e600;
        text-align: center;
        color: #FFF;
        font-size: 22pt;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
    }

    .requestButtons{
      padding: 8px;
      background-color: #3b5998;
      text-align: center;
      color: #FFF;
      font-size: 12pt;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
    }

		</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript">
      var compArr = [];
      function q(btnID){
        $('#'+btnID).toggleClass("btnSelected");
        if($('#'+btnID).hasClass("btnSelected")){
          compArr.push(btnID);
          $('#'+btnID).val("X");
        }else{
          compArr = $.grep(compArr, function(val){
            return val != btnID;
          });
          $('#'+btnID).val(" ");
        }
      }

      function compReq(){
        if(compArr == ""){
          alert("Please select a request to complete!");
        }else{
        compArr.sort();
        var popComp = 'Are you sure you would like to complete the following requests?<br>';
        for(i = 0; i < compArr.length; i++){
          var num = $('#'+compArr[i]).attr("id");
          var title = $('#title'+compArr[i]).text();
          var person = $('#user'+compArr[i]).text();
          var date = $('#date'+compArr[i]).text();
          popComp += '<br>Request <b>#'+num+'</b>: <b>"'+title+'"</b> requested by <b>'+person+'</b> on <b>'+date+'</b>'
        }
        $('#popText').html(popComp);
        $('#modal').css("display", "block");
        }
      }

      function popExit(){
        $('#modal').css("display", "none");
      }

      window.onclick = function(event){
        if (event.target == modal){
          $('#modal').css("display", "none");
        }
      }

		</script>
    <link rel="icon" href="/sprucynet/favicon.png">
	</head>
	<body>
    <div id="banner">
  		<a href="home.html">
  		    <img src="resources/sprucy.png" alt="sprucy">
  		</a>
  	</div>
    <br>
    <br>
    <div class="contentHead">Below are the pending requests for the server.</div>
    <div class="content">
      <br>
			<table id="pendingReq" name="pendingReq" class="reqtable">
        <tr>
          <th style="width: 5%;">Req #</th>
          <th style="width: 10%;">Requestor</th>
          <th style="width: 30%">Title</th>
          <th style="width: 10%;">Media Type</th>
          <th style="width: 10%;">Date Requested</th>
          <th style="width: 30%">Comments</th>
          <th style="width: 5%;">Select Row</th>
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
          $table = '';
             while($row = $result->fetch_assoc()) {

               $table = '<tr><td>'. $row["requestnum"].'</td><td id="user'. $row["requestnum"].'">'. $row["requestor"].'</td><td id="title'. $row["requestnum"].'">';
               $table .= $row["title"].'</td><td>'. $row["mediatype"].'</td><td id="date'. $row["requestnum"].'">'. $row["requestdate"].'</td><td>'. $row["comments"];
               $table .= '</td><td><input type="button" id="'. $row["requestnum"].'" name="deleteButton" value=" " onclick="q(this.id)" class="compBtn"/></td></tr>';
               echo($table);

             }
        } else {
             echo '<tr><td style="font-size: 30; height: 50px;"colspan="7"><b>There are no current requests!</b></td></tr>';
        }

        $conn->close();
        ?>
			</table>
		<br>
    <div style="text-align: right;">
		<input id="submitNew" name="submitNew" class="requestButtons" type="button" value="New Request" onclick="location.href='serverForm.html'" />
    <input id="compReq" name="compReq" class="requestButtons" type="button" onclick="compReq()" value="Complete Requests"/>
  </div>
    </div>
    <div id="modal" class="modal">
        <div id="popContent" class="popContent">
          <div id="popText">
          </div>
          <div style="text-align: right;">
            <button type="button" class="popCancel" id="popCancel" onclick="popExit();">x</button>
            <button type="submit" class="popSubmit" id="popSubmit">+</button>
          </div>
        </div>
    </div>
	</body>
</html>
