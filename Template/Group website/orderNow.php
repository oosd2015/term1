<?php
/****************************************************************************
Title:       Order Now Redirect Page
Author:      Dylan Harty and Heidi Cantalejo (pairProgramming)
Date:        2015-11-09
Description: This file contains classes related to packages to get information
              from the database.
*****************************************************************************/

  include("../../Server/backbone/global.php");
  include("../../Server/backbone/modules/login.inc.php");

  $_SESSION["packageId"] = $_POST["packageId"];
  if(loggedIn()){
    header("location: bookings.php");
  }else{
    header("location: login.php");
  }
?>
