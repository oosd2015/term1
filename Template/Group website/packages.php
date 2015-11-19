<?php
/****************************************************************************
Title:       Main Functions of Packages
Author:      Dylan Harty and Heidi Cantalejo (pairProgramming)
Date:        2015-11-09
Description: This file contains classes related to packages to get information
              from the database.
*****************************************************************************/

include("../../Server/backbone/global.php");
include("../../Server/backbone/modules/packages.inc.php");

unset($_SESSION['packageId']);

//define new package instance
$packageInstance = new packages();
$allPackages = $packageInstance->getPackages('newest'); //value of the arrays sorted asc. or desc.
$htmlOutput = $packageInstance->htmlFormatter($allPackages);
?>
<!-----------------------------------------------------------------------------
License:     The MIT License (MIT) Copyright (c) 2011-2015 Twitter, Inc.
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
    <title>Packages</title>
    <!-- CSS ------------------------------------------------------------------>
    <!-- Default Bootstrap and Template -->
      <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="css/customStyle.css" type="text/css">
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

      <header id="packages-header">
        <div class="header-content">
          <div class="header-content-inner">
            <h1>Travel Experts Packages</h1>
              <hr/>
              <p> Choose your own adventure!</p>
          </div>
        </div>
      </header>

      <section class="bg-primary">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
            </div>
          </div>
        </div>
      </section>

    <section>
      <div class="row"> <!-- php packages here -->
          <?php echo $htmlOutput['thumbnails']; ?>
      </div> <!-- php packages end here -->
      <div class="row">
        <?php echo $htmlOutput['hidden']; ?>
        </div>
   </section>

   <footer>
     <?php
       include ("footer.php");
     ?>
   </footer>

<?php echo $htmlOutput['modals']; ?>
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
    <!-- Autogenerated script added to page -->
<?php echo $htmlOutput['script']; ?>
  </body>
</html>
