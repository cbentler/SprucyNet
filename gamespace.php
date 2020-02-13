<!--SprucyNet v1.0.0 12-28-16-->
<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
    <head>
      <title>
  			GameSpace
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
        var processing = '<div style="text-align: center;"><img src="resources/processing.png"></div>';

        function openGame(link){
          window.open(link,'_blank');
        }

  		</script>
      <link rel="icon" href="/sprucynet/favicon.png">
	  </head>
	<body>
    <div id="banner">
  		<a href="home.php">
  		    <img src="resources/sprucy.png" alt="sprucy">
  		</a>
      <a href="logout.php" style="float: right;">
        <img src="resources/logout.png" alt="logout">
      </a>
  	</div>
    <br>
    <br>
    <div class="contentHead">Welcome to GameSpace!</div>
    <div class="content">
      <div style="text-align: right;">
        <!--<input id="submitNew" name="submitNew" class="requestButtons" type="button" value="New Request" onclick="location.href='serverForm.php'" />-->
    </div>
    <br>
			<table id="pendingReq" name="pendingReq" class="reqtable">
        <tr>
          <th style="width: 95%">Title</th>
          <th style="width: 5%;">Open Game</th>
        </tr>

        <?php
        include("config.php");
        $sql = "SELECT * from gamespace";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();
        $count = $stmt->rowCount();

        if ($count > 0) {
          $table = '';
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $table = '<tr><td>'.$row["name"].'</td><td><input style="background: url(resources/folderIcon.png); width:40px; height:30px" type="button"  id="g'.$row["gamenum"].'" onclick="openGame('.$row["link"].')"></td></tr>';
               echo($table);
             }
        } else {
             echo '<tr><td style="font-size: 30; height: 50px;"colspan="7"><b>There are no current games!</b></td></tr>';
        }
        ?>
			</table>
		<br>
    </div>
	</body>
</html>
