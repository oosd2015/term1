<?php
include("../global.php");
  $db = new DB('travelexperts');

  $query = "SELECT * FROM `packages`";
  $packages = $db->get($query);
  print_r($packages);
 ?>
