<?php
/*******************************************************************************
Title:       Login page
Author:      Royal Bissell, Deyanira Cerdas Calvo (Pair Programming)
Date:        2015-11-18 
Description: logout page for customers.
*******************************************************************************/
  include ("../../Server/backbone/global.php");
  session_destroy();

  header("Location: index.php");
 ?>
