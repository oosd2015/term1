<?php
  include ("../../Server/backbone/modules/login.inc.php");
  include ("../../Server/backbone/global.php");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = new LoginHandle ($_REQUEST);
    $login->processLogin();
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

    <section id="Receipt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Receipt</h2>
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
    						Hello <strong>CUSTOMER NAME</strong>,
    						<br>
    						This is the receipt for your Travel Experts Package <strong>$AMOUNT.00</strong> (CA)
    					</div>

    					<div class="payment-info">
    						<div class="row">
    							<div class="col-sm-6">
    								<span>Receipt</span>
    								<strong># RECEIPT</strong>
    							</div>
    							<div class="col-sm-6 text-right">
    								<span>Payment Date</span>
    								<strong>DATE</strong>
    							</div>
    						</div>
    					</div>

    					<div class="payment-details">
    						<div class="row">
    							<div class="col-sm-6">
    								<span>Customer</span>
    								<strong>
    									CUSTOMER NAME
    								</strong>
    								<p>
    									STREET ADDRESS <br>
    									CITY <br>
    									POSTAL CODE <br>
    									COUNTRY <br>
    									<a href="#">
    										CUSTOMER EMAIL
    									</a>
    								</p>
    							</div>
    							<div class="col-sm-6 text-right">
    								<span>Payment To</span>
    								<strong>
    									Travel Experts
    								</strong>
    								<p>
    									AGENCY STREET ADDRESS <br>
    									AGENCY CITY <br>
    									AGENCY POSTAL CODE <br>
    									AGENCY COUNTRY <br>
    									<a href="#">
    										AGENT EMAIL
    									</a>
    								</p>
    							</div>
    						</div>
    					</div>

    					<div class="line-items">
    						<div class="headers clearfix">
    							<div class="row">
    								<div class="col-xs-4">Description</div>
    								<div class="col-xs-3">Quantity</div>
    								<div class="col-xs-5 text-right">Amount</div>
    							</div>
    						</div>
    						<div class="items">
    							<div class="row item">
    								<div class="col-xs-4 desc">
    									PACKAGE NAME
    								</div>
    								<div class="col-xs-3 qty">
    									NUMBER OF PACKAGES PURCHASED
    								</div>
    								<div class="col-xs-5 amount text-right">
    									PACKAGE PRICE
    								</div>
    							</div>
    							<div class="row item">
    								<div class="col-xs-4 desc">
    									PACKAGE NAME
    								</div>
    								<div class="col-xs-3 qty">
                      NUMBER OF PACKAGES PURCHASED
    								</div>
    								<div class="col-xs-5 amount text-right">
    									PACKAGE PRICE
    								</div>
    							</div>
    							<div class="row item">
    								<div class="col-xs-4 desc">
    									PACKAGE NAME
    								</div>
    								<div class="col-xs-3 qty">
    									NUMBER OF PACKAGES PURCHASED
    								</div>
    								<div class="col-xs-5 amount text-right">
    									PACKAGE PRICE
    								</div>
    							</div>
    						</div>
    						<div class="total text-right">
    							<p class="extra-notes">
    								<strong>Special Instructions</strong>
    								CUSTOMER ENTERS HIS SPECIAL INSTRUCTIONS HERE.
    							</p>
    							<div class="field">
    								Subtotal <span>SUBTOTAL PRICE</span>
    							</div>
    							<div class="field">
    								GST <span>TAX AMOUNT</span>
    							</div>
    							<div class="field">
    								Discount <span>PERCENT%</span>
    							</div>
    							<div class="field grand-total">
    								Total <span>GRAND TOTAL</span>
    							</div>
    						</div>

                <div class="thanks">
                  <p><strong>Thank you</strong>
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

  </body>
</html>
