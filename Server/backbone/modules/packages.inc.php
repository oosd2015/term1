<?php
include("../global.php");
/*
  $db = new DB('travelexperts');

  $query = "SELECT * FROM `packages`";
  $packages = $db->get($query);
  print_r($packages);
*/

class packages{  //class that returns the array of packages sorted by date (either ascening or descending)
  public function getPackages($sortBy){
    $packagesArray;
    switch ($sortBy) {
        case "newest": //sort newest to oldest
<<<<<<< HEAD
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` DESC" ;
          return $this->connectToDatabase($query);
=======
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` DESC";
          $packagesArray = $this->connectToDatabase($query);
>>>>>>> origin/master
        break;
        case "oldest": //sort oldest to newest
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` ASC";
          $packagesArray = $this->connectToDatabase($query);
        break;
        default:
            //Do Nothing
    }
    return $this->processArray($packagesArray);  //returns value of processArray($packagesArray)
  }
  public function connectToDatabase($query){ // Pass query from getPackages based on sorting method.
    $db = new DB('travelexperts');
    $packages = $db->get($query);
    return $packages;
  }
  public function processArray($packagesArray){
    foreach ($packagesArray as &$value) {  //& means that the changes we input will be kept in the array.  So, the startDatePassed and endDatePassed columns
     //$value->PkgStartDate." ".$value->PkgEndDate;
     $startMilli = (strtotime($value->PkgStartDate) * 1000); // convert to milliseconds
     $endMilli = (strtotime($value->PkgEndDate) * 1000); // convert to milliseconds
     $startDatePassed = false;
     $endDatePassed = false;
     if($startMilli >= round(microtime(true) * 1000)){
      $startDatePassed = false;
     }else{
      $startDatePassed = true;
     }
     if($endMilli >= round(microtime(true) * 1000)){
      $endDatePassed = false;
     }else{
      $endDatePassed = true;
     }
     $value->startDatePassed = $startDatePassed; //push new value called "datePassed" to the $value array
     $value->endDatePassed = $endDatePassed; //push new value called "datePassed" to the $value array
     //$value["datePassed"] = $hasDatePassed;
     //return $value;
    }
    return $packagesArray;
  }
  public function htmlFormatter($allPackages){
    $html = "";
    foreach ($allPackages as $package){
      $html .=  $package->PackageId;
      $html .=  $package->PkgName;
      $html .=  $package->PkgStartDate;
      $html .=  $package->PkgEndDate;
      $html .=  $package->PkgDesc;
      $html .=  $package->PkgBasePrice;
      $html .=  $package->PkgAgencyCommission;
    }
   return $html;
  }

}

<<<<<<< HEAD
$packagesArray = new packages();
$allPackages = $packagesArray->getPackages('oldest'); //getPackages($sortBy = 'oldest', $sortMax = 5)
print_r($allPackages);
=======
$packageInstance = new packages();
$allPackages = $packageInstance->getPackages('oldest'); //value of the arrays sorted asc. or desc.
$htmlOutput = $packageInstance->htmlFormatter($allPackages);
//print_r($allPackages);
print($htmlOutput);
>>>>>>> origin/master

 ?>
