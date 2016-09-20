<?php
  $servername = "localhost";
  $username = "cbentle";
  $password = "guest";
  $dbname = "sprucynet";
  $dsn = 'mysql:host=localhost;dbname=sprucynet';

  $db = new PDO($dsn, $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
