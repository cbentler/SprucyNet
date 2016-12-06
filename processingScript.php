
<?php
/*<!--SprucyNet v0.0.4 9-10-16-->*/
include("config.php");

$request = $db->prepare("SELECT maxnumval from maxnum where maxnum = 3");
$request->execute();
$reqReturn = $request->fetchColumn();

$sql = $db->prepare("INSERT INTO requesttable (requestnum, requestdate, requestor, mediatype, title, artist, author, tvseason, tvepisode, year, genre, comments, status)
SELECT maxnumval,:dateReq,:requestor,:mediaType,:title,:artist,:author,:season,:episode,:year,:genre,:comments,0 FROM maxnum WHERE maxnum = 3");

$sql->execute( array(':dateReq' => $_POST['dateReq'], ':requestor' => $_POST['requestor'], ':mediaType' => $_POST['mediaType'], ':title' => $_POST['title'], ':artist' => $_POST['artist'],
':author' => $_POST['author'],':season' => $_POST['season'],':episode' => $_POST['episode'],':year' => $_POST['year'],':genre' => $_POST['genre'],
':comments' => $_POST['comments']));

$update = $db->prepare("UPDATE maxnum set maxnumval = maxnumval + 1 WHERE maxnum = 3");

$update->execute();


// the message
$msg = "There is a new request on the server.  Please login to SprucyNet to view and complete pending requests.
Request #".$reqReturn." - ".$_POST['title']." requested by ".$_POST['requestor']." on ".$_POST['dateReq']."
 https://gamer3.us.to/home.php";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("serverform@gamer3.us.to","New Server Request",$msg);


header('Location: pendingrequest.php');
exit;
?>
