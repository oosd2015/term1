<?php
include("../global.php");
/*
  $db = new DB('travelexperts');

  $query = "SELECT * FROM `packages`";
  $packages = $db->get($query);
  print_r($packages);
*/

class packages{
  public function getPackages($sortBy){
    switch ($sortBy) {
        case "newest": //sort newest to oldest
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` DESC" ;
          return $this->connectToDatabase($query);
        break;
        case "oldest": //sort oldest to newest
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` ASC";
          return $this->connectToDatabase($query);
        break;
        default:
            //Do Nothing
    }
  }
  public function connectToDatabase($query){ // Pass query from getPackages based on sorting method.
    $db = new DB('travelexperts');
    $packages = $db->get($query);
    return $packages;
  }

}

$packagesArray = new packages();
$allPackages = $packagesArray->getPackages('oldest'); //getPackages($sortBy = 'oldest', $sortMax = 5)
print_r($allPackages);

 ?>
