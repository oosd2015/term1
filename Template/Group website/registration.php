<?php
  include ("../../Server/backbone/modules/registration.inc.php");
  include ("../../Server/backbone/global.php");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registration = new RegistrationHandle ($_REQUEST);
    $registration->processRegistration();
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

    <header id="registration-header">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Travel Experts Registration</h1>
                <hr>
                <p> The first step of your amazing journey!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>


    <section class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">The perfect holiday is waiting for you!</h2>
                    <hr class="light">
                    <p class="text-faded">Live your dream today!</p>
                    <a href="#" class="btn btn-default btn-xl">Contact us</a>
                </div>
            </div>
        </div>
    </section>

    <section id="registration">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Sign Up</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
    </section>

    <!--Change action later to redirect user-->
    <form class="form-horizontal" action="registration.php" method="post" onsubmit="return validate(this)">
    <fieldset>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput"></label>
        <div class="col-md-4">
          <input name="CustFirstName" type="text" placeholder="First Name *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustLastName" type="text" placeholder="Last Name *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustAddress" type="text" placeholder="Address *"
                 class="form-control input-md" required="required">
       </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustCity" type="text" placeholder="City *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustProv" type="text" placeholder="Province/State *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustPostal" type="text" placeholder="Postal Code/Zip Code *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustCountry" type="text" placeholder="Country"
                 class="form-control input-md">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustHomePhone" type="text" placeholder="Home Phone"
                 class="form-control input-md">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustBusPhone" type="text" placeholder="Business Phone *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
          <input name="CustEmail" type="email" placeholder="Email *"
                 class="form-control input-md" pattern="/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/"
                 required="required">
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="passwordinput"></label>
        <div class="col-md-4">
          <input name="CustPassword" type="password" placeholder="Password *"
                 class="form-control input-md" required="required">
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" type="submit" class="btn btn-primary">Sign Up</button>
       </div>
    </div>
    </fieldset>
  </form>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Are you ready to experience the time of your life?</h2>
                    <hr class="primary">
                    <p>Get in touch with us to create your dream destination.</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>403-555-5671</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:hello@travelexperts.com">hello@travelexperts.com</a></p>
                </div>
            </div>
        </div>
    </section>

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
