<?php

include("form.inc.php");
include("customers.inc.php");

/*****************************************************************************
Class to handle user login and the login page
*****************************************************************************/
  class LoginHandle extends FormHandle {
    private $email;
    private $password;

    //Function to validate the login input
    public function validateInput() {
      foreach ( $this->myRequest as $name => $value ) {
        switch ($name) {
          case "CustEmail":
            $this->email = $this->myRequest["CustEmail"];
            break;
          case "CustPassword":
            if ( !empty($this->myRequest["CustPassword"]) ) {
              $this->password = md5 ( $this->myRequest["CustPassword"] );
            }
            break;
          default:
            //a form element of unknown origin
            break;
        }
      } //End of foreach() loop
      return true;
    }

    //Function to check the sql login query
    public function validateLogin($result) {
      if ( count($result) === 1) {
        //login is good!
        return true;
      } elseif ($result === 0) {
        //Error Msg: Invalid Username or Password.
        return false;
      } else {
        //serious error, potentially a hacker!
        return false;
      }
    }

    public function processLogin() {
      //First check that the input is ok before we start processing
      if ( !($this->validateInput()) ) {
          //user input doesn't meet the requirements
          print "Invalid Input";
          return false;
      }

      //retrieve the customer that matches the email and password
      $query = "SELECT * FROM `customers` WHERE `CustEmail` = '$this->email' AND  `CustPassword` = '$this->password'";
      $dB = new DB('travelexperts');
      $result = $dB->getAssoc($query);

      //make sure the login works
      if ( !($this->validateLogin($result)) ) {
        //login not successful
        print "Invalid Login";
        return false;
      } else {
        //log the user in
        $result = $result[0];
        $myUser = new Customer($result);
        $_SESSION["user"] = $myUser;
        print ($_SESSION["user"]->getCustFirstName() . " is logged in!");
        return true;
      }
    }

    //Function to check if a user is logged in; maybe move to global.php
    public function loggedIn() {
      if ( isset($_SESSION["user"]) && !empty($_SESSION["user"]) ) {
        return true;
      } else {
        return false;
      }
    }
  }
 ?>
