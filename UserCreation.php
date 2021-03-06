<!--SprucyNet v1.0.0 12-28-16-->
<HTML>
  <head>
    <title>SprucyNet Account Creation</title>
    <link rel="icon" href="resources/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
    </script>
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

      input{
        border: none;
        background-color: #cdd3e5;
        padding: 4px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
      }

      .contentHead{
        width: 100%;
        background-color: #3b5998;
        color: #fff;
        text-align: center;
        vertical-align: center;
        text-decoration: none;
        font-size: 20px;
        height: 51px;
      }
      .content{
        background-color: #cdd3e5;
        min-height: 1000px;
      }
      .contentForm{
        background-color: white;
        width: 450px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        min-height: 300px;
      }
      .contentFormHeader{
        color: #fff;
        background-color: #3b5998;
        width: 100%;
        line-height: 42px;

      }
      .inputTable{
        margin-left: auto;
        margin-right: auto;
      }
      .inputTable td{
        padding: 3px;
      }
      .submitBtn{
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
  </head>
  <body>
    <form action="actCreation.php" method="POST" >
    <div id="banner">
  		<img src="resources/sprucy.png" alt="sprucy">
  	</div>
    <br>
    <br>
    <div class="contentHead"></div>
    <div class="content">
      <br>
      <br>
      <div class="contentForm">
        <div class="contentFormHeader">Enter your user information</div>
        <br>
      <table class="inputTable">
        <tr>
          <td>
            User Name:
          </td>
          <td>
            <input type="text" id="username" name="username" required/>
          </td>
        </tr>
        <tr>
          <td>
            Email:
          </td>
          <td>
            <input type="email" id="email" name="email" required/>
          </td>
        </tr>
        <tr>
          <td>
            Password:
          </td>
          <td>
            <input type="password" id="password" name="password" required/>
          </td>
        <tr>
          <td>
            First Name:
          </td>
          <td>
            <input type="text" id="fname" name="fname" required/>
          </td>
        </tr>
        <tr>
          <td>
            Last Name:
          </td>
          <td>
            <input type="text" id="lname" name="lname" required/>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="height: 10px;"></td>
        </tr>
        <tr>
          <td>
          </td>
          <td style="text-align: right;">
            <button type="submit" id="submit" class="submitBtn">Submit</button>
          </td>
        </tr>

      </table>
    </div>
    </form>
  </div>
  </body>
</HTML>
