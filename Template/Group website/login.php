<?php
  include ("../../Server/backbone/modules/login.inc.php");
  include ("../../Server/backbone/global.php");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = new LoginHandle ($_REQUEST);
    $login->processLogin();
    print "Hello";
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

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Login</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
    </section>

      <form class="form-horizontal" action="login.php" method="post">
        <fieldset>

          <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput"></label>
                <div class="col-md-4">
                  <input name="CustEmail" type="email" placeholder="Email"
                         required="required" class="form-control input-md">
                </div>
            </div>
        <!-- Password input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput"></label>
              <div class="col-md-4">
                <input name="CustPassword" type="password" placeholder="Password"
                       required="required" class="form-control input-md">
              </div>
          </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Login"></label>
        <div class="col-md-4">
          <button id="Login" name="Login" class="btn btn-primary">Login</button>
          <a href="registration.php"> or click here to register </a>
        </div>
    </div>
      </fieldset>
    </form>


  </body>
</html>
