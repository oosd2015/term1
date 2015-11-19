<?php
/*************************************************************************** 
Title:       Login Class
Author:      Royal Bissell, Deyanira Cerdas Calvo (Pair Programming)
Date:        2015-11-18 
Description: This file contains the class to handle customer login.
             Validates login success and hashes password.
*****************************************************************************/ 
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
          return false;
      }

      //retrieve the customer that matches the email and password
      $query = "SELECT * FROM `customers` WHERE `CustEmail` = '$this->email' AND  `CustPassword` = '$this->password'";
      $dB = new DB('travelexperts');
      $result = $dB->getAssoc($query);

      //make sure the login works
      if ( !($this->validateLogin($result)) ) {
        //login not successful
        return false;
      } else {
        //log the user in
        $result = $result[0];
        $myUser = new Customer($result);
        $_SESSION["user"] = $myUser;
        /*
        redirect the user to the booking page if they made it here from the a
        package selection
        */
        if(isset($_SESSION["packageId"]) && !empty($_SESSION["packageId"])){
        header("location: bookings.php");
        }else{
          header("location: packages.php");
        }
        return true;
      }
    }
  }
 ?>
