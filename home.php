<!--SprucyNet v1.0.0 12-28-16-->
<?php
   include('session.php');
?>


<html>
  <head>
    <title>SprucyNet Home</title>
    <link rel="icon" href="/resources/favicon.png">
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

      table{
        width: 100%;
        text-align: center;
      }
      td{
        width: 25%;
      }

      img.link{
        border: 10px solid #cdd3e5;
      }

      img.link:hover{
        border: 10px solid white;
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


    </style>
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
    <div class="contentHead">Welcome home <?php echo $_SESSION['login_user']; ?>!</div>
    <div class="content">
    <br>
    <br>
    <table>
      <tr>
        <td>
          <a href="pendingrequest.php">
            <img class="link" src="resources/serverform.png">
          </a>
        </td>
        <?php if ($_SESSION['adminug'] == true){ ?>
        <td>
          <img class="link" src="resources/billpay.png">
        </td>
        <?php } ?>
        <td>
          <a href="resources/feedback.gif">
          <img class="link" src="resources/feedback.png">
        </a>
        </td>
        <?php if ($_SESSION['adminug'] == true){ ?>
        <td>
          <a href="admin.php">
            <img class="link" src="resources/admin.png">
          </a>
        </td>
        <?php } ?>
      </tr>
    </table>
  </div>
  </body>
</html>
