<!--SprucyNet v0.0.4 9-10-16-->
<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="icon" href="/sprucynet/favicon.png">
        <title>
            Server Request Form
        </title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js">
        </script>
        <script>
            $(document).ready(function(){
                $("#search").click(function(){
                    var title = $('#title').val();
                    var year = $('#year').val();
					var type = $('#mediaType').val();
					if(type == "TV Show"){
						type = "series";
					}

                    var url = "https://www.omdbapi.com/?t="+title+"&y="+year+"&type="+type+"&plot=short&r=json";
					$.ajax({url: url, success: function(result){
					if(result.Title == null){
						alert("Update yo bitch-ass search terms.");
					}else{
                    $('#year').val(result.Year);
                    $('#poster').attr('src', result.Poster);
					$('#poster').show();
                    $('#genre').val(result.Genre);
                    $('#plot').val(result.Plot);
					$('#plotDiv').show();
                    $('#score').val(result.imdbRating);
					$('#title').val(result.Title);
                    }}});
                    //$('#comments').val(url);
                });

            });

        function hideMedia(){
        $('#infoTable').hide();
				$('#plotDiv').hide();
				$('#poster').hide();
            }

        function checkForType(){
				switch($('#mediaType').val()){
					case "TV Show":
						selectTV();
						break;

					case "Movie":
						selectMovie();
						break;

					case "Book":
						selectBook();
						break;

					case "Audio":
						selectAudio();
						break;

					default:

					}
			}

			function selectMovie(){
				$('#infoTable').show();
				$('#plotDiv').show();
				$('#authorRow').hide();
				$('#seasonRow').hide();
        $('#episodeRow').hide();
				$('#artistRow').hide();
				$('#scoreRow').show();
				$('#poster').hide();
				$('#search').show();
				$('#clear').show();
				$('#plotDiv').hide();
				clearKeys();
			}

			function selectBook(){
				$('#infoTable').show();
				$('#plotDiv').show();
				$('#authorRow').show();
				$('#seasonRow').hide();
        $('#episodeRow').hide();
				$('#artistRow').hide();
				$('#scoreRow').hide();
				$('#poster').hide();
				$('#search').hide();
				$('#clear').hide();
				$('#plotDiv').hide();
				clearKeys();
			}

            function selectTV(){
				$('#infoTable').show();
				$('#plotDiv').show();
        $('#authorRow').hide();
				$('#seasonRow').show();
        $('#episodeRow').show();
				$('#artistRow').hide();
				$('#scoreRow').show();
				$('#poster').hide();
				$('#search').show();
				$('#clear').show();
				$('#plotDiv').hide();
				clearKeys();
            }

			function selectAudio(){
				$('#infoTable').show();
				$('#plotDiv').show();
        $('#authorRow').hide();
				$('#seasonRow').hide();
        $('#episodeRow').hide();
				$('#artistRow').show();
				$('#scoreRow').hide();
				$('#poster').hide();
				$('#search').hide();
				$('#clear').hide();
				$('#plotDiv').hide();
				clearKeys();
            }

			function clearKeys(){
				$('#title').val('');
				$('#season').val('');
        $('#episode').val('');
				$('#artist').val('');
				$('#author').val('');
				$('#year').val('');
				$('#genre').val('');
				$('#score').val('');
				$('#plot').val('');
				$('#plotDiv').hide();
				$('#poster').hide();
				$('#poster').attr('src', '');
			}

			function populateDate(){
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
        var hours = d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();
        var mili = d.getMilliseconds();
				var output = d.getFullYear() + "-" + (month<10 ? '0' : '') + month + "-" + (day<10 ? '0' : '') + day + " " + hours + ":" + min + ":" + sec;
				$('#dateReq').val(output);
			}

			function doOnLoad(){
				hideMedia();
				clearKeys()
				checkForType();
				populateDate();

			}


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
          font-size: 12px;
          border-radius: 5px;
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
        }

        textarea{
          border-radius: 5px;
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
        }

        select{
          border: none;
          background-color: #cdd3e5;
          padding: 4px;
          border-radius: 5px;
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
        }

		.label{
			width:95px;
		}
		#plot{
			background-color: #e6e6e6;
			color: #8c8c8c;
		}
    #comments{
      background-color: #cdd3e5;
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
      padding: 12px;
      background-color: #cdd3e5;
      min-height: 1000px;
    }
    .contentForm{
      background-color: white;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
      width: 740px;
    }
    .contentFormHeader{
      color: #fff;
      background-color: #3b5998;
      width: 100%;
      line-height: 42px;
      text-align: center;
      width: 780px;
      margin-left: auto;
      margin-right: auto;

    }
    .movieBtn{
      padding: 4px;
      background-color: #3b5998;
      text-align: center;
      color: #FFF;
      font-size: 12pt;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
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
    <body onLoad="doOnLoad()">
    <form action="processingScript.php" method="POST">
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
      <div class="contentHead"></div>
      <div class="content">
        <br>
        <div class="contentFormHeader">What are you looking for?</div>
        <div class="contentForm">
            <table id="picTable">
                <tr>
                    <td valign="top">
            <table id="selectorTable">
                <tr>
                    <td class="label">
                        Media Type:
                    </td>
                    <td>
                        <select name="mediaType" id="mediaType" onchange="checkForType()">
                            <option value="default"></option>
							<option value="Audio">Audio</option>
							<option value="Book">Book</option>
                            <option value="Movie">Movie</option>
                            <option value="TV Show">TV Show</option>
                        </select>
                </td>
                </tr>

			</table>
			<table id="infoTable">
                <tr>
                    <td class="label">
                        Title:
                    </td>
                    <td>
                        <input name="title" id="title" type="text">
                </td>
                <td>
                </td>
                <td>
                    <input type="button" id="search" value="Search" class="movieBtn">
                </td>
				<td>
                    <input type="button" id="clear" value="Clear" class="movieBtn" onclick="clearKeys()">
                </td>
            </tr>
            <tr id="seasonRow">
                    <td class="label">
                        Season:
                    </td>
                    <td>
                        <input name="season" id="season" type="text">
                    </td>
                </tr>
            <tr>
            <tr id="episodeRow">
                    <td class="label">
                        Episode:
                    </td>
                    <td>
                        <input name="episode" id="episode" type="text">
                    </td>
                </tr>
            <tr>
			<tr id="artistRow">
                <td>
                    Artist:
                </td>
                <td>
                    <input id="artist" name="artist" type="text">
                </td>
            </tr>
			<tr id="authorRow">
                <td class="label">
                    Author:
                </td>
                <td>
                    <input id="author" name="author" type="text">
                </td>
            </tr>
            <tr id="yearRow">
                <td class="label">
                    Year:
                </td>
                <td>
                    <input name="year" id="year" type="text">
                </td>
            </tr>
            <tr id="genreRow">
                <td class="label">
                    Genre:
                </td>
                <td>
                    <input name="genre" id="genre" type="text">
                </td>
            </tr>
            <tr id="scoreRow">
                <td class="label">
                    IMDB Score:
                </td>
                <td>
                    <input id="score" type="text">
                </td>
            </tr>
        </table>
                    </td>
                    <td>
                        <img id="poster" src="" height="150px" width="100px">
                    </td>
                    </tr>
                </table>
				<div id="plotDiv">
                    Synopsis:
                    <br>
                    <textarea id="plot" rows="5" cols="100" readonly></textarea>
				</div>
        <div>
          <br>
              Comments:
          <br>
          <textarea name="comments" id="comments" rows="5" cols="100"></textarea>
          <br>
        </div>
		<input type="text" id="dateReq" name="dateReq" hidden  />
    <input id="requestor" name="requestor" type="text" value="<?php echo $login_session; ?>" hidden/>
		<br>
    <div style="text-align: right;">
        <button type="submit" id="submit" class="submitBtn">Submit</button>
      </div>
      </div>
    </form>
    </body>
</html>
