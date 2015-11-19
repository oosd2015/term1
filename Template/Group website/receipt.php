<?php
/****************************************************************************
Title:       Receipt Page
Author:      Dylan Harty and Heidi Cantalejo (pairProgramming)
Date:        2015-11-09
Description: This file contains classes related to packages to get information
              from the database.
*****************************************************************************/
  include ("../../Server/backbone/modules/packages.inc.php");
  include ("../../Server/backbone/modules/customers.inc.php");
  include ("../../Server/backbone/global.php");
  if(loggedIn()){
    $packageInstance = new packageInfo($_SESSION["packageId"]);
    $package = $packageInstance->packageDetails();

    $customer=$_SESSION["user"];
    $customerFullName = $customer->getCustFirstName()." ".$customer->getCustLastName();

    $grandTotal = "";
    $specialRequests = "";
    $numberTravelers = "";
    $departDate = date('F j, Y', strtotime($package[0]->PkgStartDate));
    $returnDate = date('F j, Y', strtotime($package[0]->PkgEndDate));
    define("CONFIRMATIONNUMBER",randomString());
  if($_POST){
    $grandTotal = $_POST['grandTotal'];
    $specialRequests = $_POST['specialRequests'];
    $numberTravelers = $_POST['numberTravelers'];

    //Add booking to database
    $db = new DB('travelexperts');
    $query = "INSERT INTO `bookings` (`BookingNo`,`TravelerCount`, `CustomerId`, `TripTypeId`, `PackageId`)
    VALUES ( '".CONFIRMATIONNUMBER."', '".$numberTravelers."', '".$customer->getCustomerId()."', 'L', '".$_SESSION["packageId"]."')";
    $customers = $db->set($query);
    if (isset($_SESSION['packageId'])) {
      unset($_SESSION['packageId']);
    }
    /*No need to add data to booking details;
    that info can all be gathered by joins*/

  }else{
    header("Location: packages.php");
  }

  }else{
  header("Location: login.php");
  }
?>
<!-----------------------------------------------------------------------------
License:     Apache 2.0 by Start Bootstrap.
             The MIT License (MIT) Copyright (c) 2011-2015 Twitter, Inc.
             Permission is hereby granted, free of charge, to any person
             obtaining a copy of this software and associated documentation
             files (the 'Software'), to deal in the Software without
             restriction, including without limitation the rights to use, copy,
             modify, merge, publish, distribute, sublicense, and/or sell copies
             of the Software, and to permit persons to whom the Software is
             furnished to do so, subject to the following conditions:
             The above copyright notice and this permission notice shall be
             included in all copies or substantial portions of the Software.

             THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
             EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
             MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
             NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
             BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
             ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
             CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
             SOFTWARE."
------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel Experts Individual Project">
    <title>Travel Experts</title>
    <!-- CSS ------------------------------------------------------------------>
    <!-- Default Bootstrap and Template -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <!-- Travel Experts CSS -->
    <link rel="stylesheet" href="css/customStyle.css" type="text/css">
    <!------------------------------------------------------------------------->
    </head>
    <body id="page-top">
      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Travel Experts</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a class="page-scroll" href="index.php">Home</a>
              </li>
              <li>
                <a class="page-scroll" href="packages.php">Packages</a>
              </li>
              <li>
                <a class="page-scroll" href="registration.php">Registration</a>
              </li>
              <li>
                <a class="page-scroll" href="contact.php">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section id="Receipt">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">Receipt</h2>
              <hr class="primary"/>
            </div>
          </div>
        </div>
      </section>

      <div class="receipt-content">
        <div class="container bootstrap snippet">
    		  <div class="row">
    			  <div class="col-md-12">
    				  <div class="invoice-wrapper">
    					<div class="intro">
    						<strong><?php echo $customerFullName; ?></strong>,
    						<br>
    						This is the receipt for your Travel Experts Package.
    					</div>

    					<div class="payment-info">
    						<div class="row">
    							<div class="col-sm-6">
    								<span>Receipt</span>
    								<strong>#<?php echo CONFIRMATIONNUMBER; ?></strong>
    							</div>
    							<div class="col-sm-6 text-right">
    								<span>Payment Date</span>
    								<strong><span id="currentDate"></span></strong>
    							</div>
    						</div>
    					</div>

    					<div class="payment-details">
    						<div class="row">
    							<div class="col-sm-6">
    								<span>Customer</span>
    								<strong>
    									<?php echo $customerFullName; ?>
    								</strong>
    							</div>
    							<div class="col-sm-6 text-right">
    								<span>Payment To</span>
    								<strong>
    									Travel Experts
    								</strong>
    							</div>
    						</div>
    					</div>

    					<div class="line-items">
    						<div class="headers clearfix">
    							<div class="row">
    								<div class="col-xs-4">Package</div>
    								<div class="col-xs-3"></div>
    								<div class="col-xs-5 text-right">Payment of</div>
    							</div>
    						</div>
    						<div class="items">
    							<div class="row item">
    								<div class="col-xs-4 desc">
    									<?php echo $package[0]->PkgName; ?><br>
                      Depart: <?php echo $departDate; ?><br>
                      Return: <?php echo $returnDate; ?><br>
    								</div>
    								<div class="col-xs-3 qty">
    									<?php echo $numberTravelers; ?>
    								</div>
    								<div class="col-xs-5 amount text-right">
    									$<?php echo $grandTotal; ?>
    								</div>
    							</div>
    						</div>
    						<div class="total text-right">
    							<p class="extra-notes">
    								<strong>Special Instructions</strong>
    							<?php echo $specialRequests; ?>
    							</p>
                  <br>
    						</div>
                <div class="col-lg-12 text-center">
                  <a href="plane.php?travellers=<?php print($numberTravelers) ?>" target="_blank" class="btn btn-primary" style="margin: 3em; width:130px" >Select Seat</a>
                  <a href="index.php" class="btn btn-primary" style="margin: 3em; width:130px">Home</a>
                </div>

                <div class="thanks">
                  <p><strong>Thank you!</strong>
                  </p>
                </div>

    						<div class="print">
    							<a href="#">
    								<i class="fa fa-print"></i>
    								Print this receipt
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <!--JavaScript------------------------------------------------------------->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script type="text/javascript">
    /********************************
    Author: Dylan Harty
    Date: 11/18/2015
    Project: Travel Experts
    ********************************/
    d = new Date();
    $("#currentDate").text(d.toLocaleString());
    </script>

  </body>
</html>
