<?php
include("../../Server/backbone/global.php");
include("../../Server/backbone/modules/login.inc.php");

$_SESSION["packageId"] = $_POST["packageId"];

if(loggedIn()){
  header("location: bookings.php");
}else{
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
