<?php
  include ("../../Server/backbone/modules/packages.inc.php");
  include ("../../Server/backbone/modules/customers.inc.php");
  include ("../../Server/backbone/global.php");
//  echo($_SESSION["packageId"]);
$packageInstance = new packageInfo($_SESSION["packageId"]);
$package = $packageInstance->packageDetails();
//print_r ($package);

$packageStartDate;
$packageEndDate;
$packagePrice = number_format($package[0]->PkgBasePrice, 2, '.', ',');
$customer=$_SESSION["user"];
$customerFullName = $customer->getCustFirstName()." ".$customer->getCustLastName();

$packageCommission = round($package[0]->PkgAgencyCommission);
$_SESSION["confirmationNumber"] = randomString();
$confirmationNumber = $_SESSION["confirmationNumber"];
//print_r ($customer->getCustFirstName());
function randomString($length = 5) {
    $characters = '01234HIJKLMNOPQR56789abcdefstuvwxyzABCDEFGSTUghijklmnopqrVWXYZ';
    $charactersLength = strlen($characters);$randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel Experts Individual Project">
    <meta name="author" content="Deyanira Cerdas-Calvo, OOSD Fall 2015, SAIT.
      Boostrap.The MIT License (MIT) Copyright (c) 2011-2015 Twitter, Inc.

      Permission is hereby granted, free of charge, to any person obtaining a copy
      of this software and associated documentation files (the 'Software'), to deal
      in the Software without restriction, including without limitation the rights
      to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
      copies of the Software, and to permit persons to whom the Software is
      furnished to do so, subject to the following conditions:
      The above copyright notice and this permission notice shall be included in
      all copies or substantial portions of the Software.

      THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
      IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
      FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
      AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
      LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
      OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
      THE SOFTWARE.">

      <title>Travel Experts</title>

      <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

      <!-- Plugin CSS -->
      <link rel="stylesheet" href="css/animate.min.css" type="text/css">

      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/creative.css" type="text/css">
      <link rel="stylesheet" href="css/customStyle.css" type="text/css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background-color:#f05f40">
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

    <section id="bookings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Bookings</h2>
                    <hr class="primary">
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
    						Hello <strong><?php echo $customerFullName; ?></strong>,
    						<br>
    						This is the overview for your Travel Experts Package <strong><?php echo "$".$packagePrice ?></strong> (CA)
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
    								<div class="col-xs-4">Overview</div>
    								<div class="col-xs-3"> </div>
    								<div class="col-xs-5 text-right">Amount</div>
    							</div>
    						</div>
    						<div class="items">
    							<div class="row item">
    								<div class="col-xs-4 desc">
    									<?php echo $package[0]->PkgName; ?>
    								</div>
    								<div class="col-xs-3 qty">
    									<input type="text" id="packageNumber" placeholder="Enter Number of Travelers" />
    								</div>
    								<div class="col-xs-5 amount text-right">
    									<span id="packagePriceTotal">0.00</span>
    								</div>
    							</div>
    							<div class="row item">
    								<div class="col-xs-4 desc">
                      Booking Fee
    								</div>
    								<div class="col-xs-3 qty">

    								</div>
    								<div class="col-xs-5 amount text-right">
    									<span id="packageCommissionPrice"></span>
    								</div>
    							</div>
    						</div>
    						<div class="total text-right">
    							<p class="extra-notes">
    								<strong>Special Instructions</strong>
    							<textarea name="name" id="specialRequests" rows="4" cols="40" placeholder="Enter any additional information."></textarea>
    							</p>
    							<div class="field">
    								Subtotal <span id="subtotal" >$0.00</span>
    							</div>
    							<div class="field">
    								GST <span id="tax">$0.00</span>
    							</div>
    							<div class="field grand-total">
    								Total <span id="grandTotal" style="color:green !important;" >$0.00</span>
    							</div>
    						</div>
                <!--Booking/cancellings Buttons-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="Bookings"></label>
                    <div class="col-lg-12 text-center">
                      <form method="post" id="packageForm">
                        <input type="hidden" id="grandTotalHidden" name="grandTotal" />
                        <input type="hidden" id="specialRequestsHidden" name="specialRequests" />

                      <button type="submit" id="Bookings" class="btn btn-primary">Book</button>
                    </form>
                    <br>
                      <a href="packages.php"  class="btn btn-primary">Cancel</a>
                    </div>
                </div>

    						<div class="print">
    							<a href="#">
    								<i class="fa fa-print"></i>
    								Print this overview
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

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
    $("#packageNumber").keydown(function (e) {
     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 || (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
        (e.keyCode >= 35 && e.keyCode <= 40)) {
              return;
     }
     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
         e.preventDefault();
     }
 });
 $("#packageNumber").keyup(function (e) {
   setPackageTotal($(this).val());
 });

 function setPackageTotal(travelers){
   var agencyCommission = <?php echo $packageCommission; ?>;
   var packagePrice = travelers * <?php echo $package[0]->PkgBasePrice; ?>;
   var subtotal = packagePrice + agencyCommission;
   var grandTotal = numberWithCommas(subtotal * (1.05));
   $("#packagePriceTotal").text("$"+numberWithCommas(packagePrice));
   $("#packageCommissionPrice").text("$"+numberWithCommas(agencyCommission));
   $("#subtotal").text("$"+numberWithCommas(subtotal));
   $("#tax").text("$"+numberWithCommas(subtotal * (0.05)));
  $("#grandTotal").text("$"+grandTotal);

  $("#grandTotalHidden").val(grandTotal);
  $("#specialRequestsHidden").val($("#specialRequests").val());


 }
 //Adds commas to numbers
 function numberWithCommas(x) {
   x = x.toFixed(2);
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

    </script>

  </body>
</html>
