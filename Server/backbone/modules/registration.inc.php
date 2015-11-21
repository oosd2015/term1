<?php
/*-------------------------------------------------------------------------------
Title:       RegistrationHandle Class
Author:      Royal Bissell
Date:        2015-11-18 
Description: This file contains the class to handle customer registration.
             Validates login success and hashes password.
------------------------------------------------------------------------------*/

  include("form.inc.php");
  include("customers.inc.php");
  include("querystr.inc.php");

  /*****************************************************************************
  Class to handle forms that submit
  *****************************************************************************/
  class RegistrationHandle extends FormHandle {

    //Emails are used as usernames, so they must be unique.
    public function validateUnique() {
      $email = $this->myRequest["CustEmail"];
      $dB = new DB('travelexperts');
      $query = "SELECT CustEmail FROM `customers` WHERE CustEmail='" . $email . "'";
      $customer = $dB->get($query);

      //If we get a row in the result, then the email address has already been used.
      if ( !($customer===0) ) {
          //Custom Message
          return false;
      } else {
          return true;
      }

    }

    //Do php form field validation incase the user has JavaScript turned off.
    public function validateInput() {
      foreach ($this->myRequest as $name => $value) {
        switch ($name) {
          case "CustomerId":

            break;
          case "CustFirstName":

            break;
          case "CustLastName":

            break;
          case "CustAddress":

            break;
          case "CustCity":

            break;
          case "CustProv":

            break;
          case "CustPostal":

            break;
          case "CustCountry":

            break;
          case "CustHomePhone":

            break;
          case "CustBusPhone":

            break;
          case "CustEmail":

            break;
          case "AgentId":

            break;
          case "CustPassword":
            //need to make sure it is not empty first
            $this->myRequest[$name] = md5 ( $this->myRequest["CustPassword"] );
            break;
          default:
            //a form element of unknown origin
            break;
        }
      } //End of the foreach loop
      return true;
    }

    //method to acutally process the registration form
    public function processRegistration() {
      //Validate registration before anything else.
      if( !($this->validateInput()) ) {
          return false;
      } elseif ( !($this->validateUnique()) ) {
          return false;
      } else {
          //Ok we are good, now start making customer objects and SQL Queries
          $myCustomer = new Customer($this->myRequest);
          $myQuery = new QueryStr($myCustomer, "customers", "INSERT");
          $query = $myQuery->setQueryStr();
          //perform the actual query(Insert)
          $dB = new DB('travelexperts');
          $result = $dB->set($query);
          /*
          check if it worked; then return the results (more info than just
          true, in some cases)
          */
          if(!$result) {
            return false;
          } else {
            return $result;
          }
      }
    }

  } //End of the Class

 ?>
