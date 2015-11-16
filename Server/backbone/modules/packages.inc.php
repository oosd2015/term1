<?php
//include("../global.php");
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
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` DESC" ;
          $packagesArray = $this->connectToDatabase($query);
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
  public function connectToDatabase($query){ //Pass query from getPackages based on sorting method.
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
     if($startMilli >= round(microtime(true) * 1000)){ //microtime is current time
      $startDatePassed = false;
     }else{
      $startDatePassed = true;
     }
     if($endMilli >= round(microtime(true) * 1000)){
      $endDatePassed = false;
     }else{
      $endDatePassed = true;
     }
     $value->startDatePassed = $startDatePassed; //push new value called "startDatePassed" to the $value array
     $value->endDatePassed = $endDatePassed; //push new value called "endDatePassed" to the $value array
     //$value["datePassed"] = $hasDatePassed;
     //return $value;
    }
    return $packagesArray; //in addPackages() we called processArray() to add $startDatePassed and $startDateEnd to return an updated $packagesArray
  }
  public function htmlFormatter($allPackages){ //create an html string
    $htmlModals = "";
    $htmlThumbnails = "";
    $counterId = 0;
    foreach ($allPackages as $package){
      /*
      $html .=  $package->PackageId;
      $html .=  $package->PkgName;
      $html .=  $package->PkgStartDate;
      $html .=  $package->PkgEndDate;
      $html .=  $package->PkgDesc;
      $html .=  $package->PkgBasePrice;
      $html .=  $package->PkgAgencyCommission;
      $html .=  $package->PkgImage;
      */
      $counterId++;
      $modalId = 'portfolioModal'.$counterId; //this is the id for the modal, this increments it so we have a new id for each new modal
      $anchorId = 'anchor'.$counterId; //this creates the id for the anchor, and increments it so we have a new id for each new anchor


      //this is the portion of the string creating the thumbnails
      $htmlThumbnails .= '<span class="container col-md-6">
                                <a href="#" id="'.$anchorId.'" class="packageClickBtn"  data-modal="'.$modalId.'" >
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h2 class="section-heading">'.$package->PkgName.'</h2>
                                        <hr class="primary">
                                    </div>
                                </div>
                                <div class="no-padding">
                                    <div class="container-fluid">
                                        <div class="row no-gutter">
                                            <div class="">

                                                    <img src="img/packages/'.$package->PkgImage.'" class="img-responsive" alt="">
                                                    <div class="packages-box-caption">
                                                        <div class="packages-box-caption-content">
                                                            <div class="project-category text-faded">
                                                              Click for more details!
                                                            </div>
                                                            <div class="project-name">

                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    </span>';

          //this is the portion of the string that creates the modal
          $startDateDisplay = ($package->startDatePassed == true) ?
          '<span style="color:gray;text-decoration:line-through">'.date('F j, Y', strtotime($package->PkgStartDate)).'</span>' : date('F j, Y', strtotime($package->PkgStartDate));;

          $endDateDisplay = ($package->startDatePassed == true) ?
          '<span style="color:gray;text-decoration:line-through">'.date('F j, Y', strtotime($package->PkgEndDate)).'</span' : date('F j, Y', strtotime($package->PkgStartDate));

          $htmlModals .= '<div class="portfolio-modal modal fade" id="'.$modalId.'" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                  <div class="lr">
                      <div class="rl">
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="row">
                      <div class="col-lg-8 col-lg-offset-2">
                          <div class="modal-body">
                              <h2>'.$package->PkgName.'</h2>
                              <hr class="star-primary">
                              <img src="img/packages/'.$package->PkgImage.'" class="img-responsive img-centered" alt="">
                              <p>'.$package->PkgDesc.'</p>
                              <ul class="list-inline item-details">
                                  <li>Start Date:
                                      <strong>'.$startDateDisplay.'
                                      </strong>
                                  </li>
                                  <li>End Date:
                                      <strong>'.$endDateDisplay.'
                                      </strong>
                                  </li>
                                  <li>Price:
                                      <strong>$'.number_format($package->PkgBasePrice, 2, '.', ',').'
                                      </strong>
                                  </li>
                              </ul>
                              <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-cart-plus"></i> Order Now!</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>';


    }
    //$htmlModals
    //$htmlThumbnails


//whenever we click on an anchor with class="packageClickBtn", it will open a modal.
    $htmlScript = '<script type="text/javascript">
    $(".packageClickBtn").click(function(event){
event.preventDefault();
$("#"+$(this).attr("data-modal")).modal("show");
});
          </script>';

   return array("modals"=>$htmlModals, "thumbnails"=>$htmlThumbnails, "script"=>$htmlScript);
  }

}

/*
$packageInstance = new packages();
$allPackages = $packageInstance->getPackages('oldest'); //value of the arrays sorted asc. or desc.
$htmlOutput = $packageInstance->htmlFormatter($allPackages);
//print_r($htmlOutput);
//echo '<html><head><script src="http://code.jquery.com/jquery-latest.min.js"
//  type="text/javascript"></script></head><body>';
//echo $htmlOutput['thumbnails'];
//echo $htmlOutput['modals'];
//echo $htmlOutput['script'];
//echo '</body></html>';
*/

 ?>
