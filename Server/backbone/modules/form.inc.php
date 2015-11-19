<?php
  /*************************************************************************** 
  Title:       Form Class
  Author:      Royal Bissell
  Date:        2015-11-18 
  Description: This file contains the class to handle form submissions.
               Specific form classes will extend from this class.
  *****************************************************************************/ 

  /*****************************************************************************
  Generic class with properties and methods to handle all form submits
  *****************************************************************************/
  class FormHandle {

    protected $myRequest;

    public function __construct($formRequest)
    {
      $this->myRequest = $formRequest;
    }
  }

 ?>
