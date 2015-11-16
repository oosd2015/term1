<?php
  /*****************************************************************************
  Generic class with properties and methods to handle all form submits
  *****************************************************************************/
  class FormHandle {

    public $msg;
    protected $myRequest;

    public function __construct($formRequest)
    {
      $this->myRequest = $formRequest;
    }
  }

 ?>
