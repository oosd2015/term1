<?php
/****************************************************************************
Title:       Main Functions of Packages
Author:      Dylan Harty and Heidi Cantalejo (pairProgramming)
Date:        2015-11-09
Description: This file contains classes related to packages to get information
              from the database.
*****************************************************************************/

//class that returns the array of packages sorted by date
class packages{
  public function getPackages($sortBy){
    $packagesArray;
    switch ($sortBy) {
        //sort newest to oldest
        case "newest":
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` DESC";
          $packagesArray = $this->connectToDatabase($query);
        break;
        //sort oldest to newest
        case "oldest":
          $query = "SELECT * FROM `packages` ORDER BY `PkgStartDate` ASC";
          $packagesArray = $this->connectToDatabase($query);
        break;
        default:
          //do nothing
    }
    return $this->processArray($packagesArray);
  }
  //pass query from string
  public function connectToDatabase($query){
    $db = new DB('travelexperts');
    $packages = $db->get($query);
    return $packages;
  }
  public function processArray($packagesArray){
    //foreach to add if date has passed
    foreach ($packagesArray as &$value) {
      //converting time to milliseconds
     $startMilli = (strtotime($value->PkgStartDate) * 1000);
     $endMilli = (strtotime($value->PkgEndDate) * 1000);
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
     $value->startDatePassed = $startDatePassed;
     $value->endDatePassed = $endDatePassed;

    }
    return $packagesArray;
  }
  public function htmlFormatter($allPackages){
    //creating string HTML variables
    $htmlModals = "";
    $htmlThumbnails = "";
    $htmlHidden = "";
    $counterId = 0;

    //if date has passed, hide package
    $htmlHidden = '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" style="text-align:center">
          <a class="accordion-toggle" style="text-align:center !important" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            View Our Previous Vacations
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">';

    //foreach to format package HTML
    foreach ($allPackages as $package){
      //need counterId to create unique HTML Ids
      $counterId++;
      $modalId = 'portfolioModal'.$counterId;
      $anchorId = 'anchor'.$counterId;
      //format price with comma
      $packagePrice = number_format($package->PkgBasePrice, 2, '.', ',');

        //if package has expired, hide
        if(($package->startDatePassed) && ($package->endDatePassed)){
          $htmlHidden .= '<span class="col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                              <h2 class="section-heading">'.$package->PkgName.'</h2>
                                              <p style="font-size:80%;">Was Only $'.$packagePrice.'</p>
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
                                                                    You Missed a Great Deal!
                                                                  </div>
                                                                  <div class="project-name">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </span>';
          }else{
            //this is the portion of the HTML string creating the thumbnails
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

            //this is the portion of the HTML string that creates the modal
            $startDateDisplay = ($package->startDatePassed == true) ?
            '<span style="color:red;font-weight:bold; text-decoration:line-through">'.date('F j, Y', strtotime($package->PkgStartDate)).'</span>' : date('F j, Y', strtotime($package->PkgStartDate));;
            //see if date has passed and bold red if they have
            $endDateDisplay = ($package->endDatePassed == true) ?
            '<span style="color:red;font-weight:bold; text-decoration:line-through">'.date('F j, Y', strtotime($package->PkgEndDate)).'</span' : date('F j, Y', strtotime($package->PkgEndDate));

            //create base model
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
                                        <strong>$'.$packagePrice.'
                                        </strong>
                                    </li>
                                </ul>
                                <form method="post" action="orderNow.php">
                                <input type="hidden" name="packageId" value="'.$package->PackageId.'">
                                <button type="submit" class="btn btn-info"><i class="fa fa-cart-plus"></i> Order Now!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
          }
    }
    $htmlHidden .= "</div></div></div>";

    //whenever we click on an anchor with class="packageClickBtn", it will open a modal.
    $htmlScript = '<script type="text/javascript">
    $(".packageClickBtn").click(function(event){
    event.preventDefault();
    $("#"+$(this).attr("data-modal")).modal("show");});</script>';

   return array("modals"=>$htmlModals, "thumbnails"=>$htmlThumbnails, "script"=>$htmlScript, "hidden"=>$htmlHidden);
  }
}
//class extends packages so we can get details
class packageInfo extends packages{
  public $packageId;

  function __construct($packageId){
    $this->packageId = ($packageId);
  }
  function packageDetails(){
    $query = "SELECT * FROM `packages` WHERE `PackageId`='".$this->packageId."'";
    $package = $this->connectToDatabase($query);
    return $package;
  }
}
?>
