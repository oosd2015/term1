<?php
  /*****************************************************************************
   Class to handle customer data
  *****************************************************************************/
  class Customer {

    /*
    WARNING: If any properties are added to this class, inputs into the
    QueryStr will break.
    Function getVariables() needs to be updated to only get the existing properties
    */
    private $CustomerId;
    private $CustFirstName;
    private $CustLastName;
    private $CustAddress;
    private $CustCity;
    private $CustProv;
    private $CustPostal;
    private $CustCountry;
    private $CustHomePhone;
    private $CustBusPhone;
    private $CustEmail;
    private $AgentId;
    private $CustPassword;

    public function __construct($CustReq) {
      if( !is_array($CustReq) ) {
        die("Customer passed is not an array");
      }

      /*
      We allow all variables to possibly be blank so we need to allow for this;
      required checking is done at another point.
      */
      if ( isset($CustReq["CustomerId"]) ) {
          $this->CustomerId = $CustReq["CustomerId"];
      } else {
          $this->CustomerId = "";
      }
      if ( isset($CustReq["CustFirstName"]) ) {
          $this->CustFirstName = $CustReq["CustFirstName"];
      } else {
          $this->CustFirstName = "";
      }
      if ( isset($CustReq["CustLastName"]) ) {
          $this->CustLastName = $CustReq["CustLastName"];
      } else {
          $this->CustLastName = "";
      }
      if ( isset($CustReq["CustAddress"]) ) {
          $this->CustAddress = $CustReq["CustAddress"];
      } else {
          $this->CustAddress = "";
      }
      if ( isset($CustReq["CustCity"]) ) {
          $this->CustCity = $CustReq["CustCity"];
      } else {
          $this->CustCity = "";
      }
      if ( isset($CustReq["CustProv"]) ) {
          $this->CustProv = $CustReq["CustProv"];
      } else {
          $this->CustProv = "";
      }
      if ( isset($CustReq["CustPostal"]) ) {
          $this->CustPostal = $CustReq["CustPostal"];
      } else {
          $this->CustPostal = "";
      }
      if ( isset($CustReq["CustCountry"]) ) {
          $this->CustCountry = $CustReq["CustCountry"];
      } else {
          $this->CustCountry = "";
      }
      if ( isset($CustReq["CustHomePhone"]) ) {
          $this->CustHomePhone = $CustReq["CustHomePhone"];
      } else {
          $this->CustHomePhone = "";
      }
      if ( isset($CustReq["CustBusPhone"]) ) {
          $this->CustBusPhone = $CustReq["CustBusPhone"];
      } else {
          $this->CustBusPhone = "";
      }
      if ( isset($CustReq["CustEmail"]) ) {
          $this->CustEmail = $CustReq["CustEmail"];
      } else {
          $this->CustEmail = "";
      }
      if ( isset($CustReq["AgentId"]) ) {
          $this->AgentId = $CustReq["AgentId"];
      } else {
          $this->AgentId = "";
      }
      if (isset($CustReq["CustPassword"]) ) {
          $this->CustPassword = $CustReq["CustPassword"];
      } else {
          $this->CustPassword = "";
      }
    }

    public function getCustomerId() {
      return $this->CustomerId;
    }

    public function setCustomerId($customerId) {
      $this->CustomerId = $customerId;
    }

    public function getCustFirstName() {
      return $this->CustFirstName;
    }

    public function setCustFirstName($custFirstName) {
      $this->CustFirstName = $custFirstName;
    }

    public function getCustLastName() {
      return $this->CustLastName;
    }

    public function setCustLastName($custLastName) {
      $this->CustLastName = $custLastName;
    }

    public function getCustAddress() {
      return $this->CustAddress;
    }

    public function setCustAddress($custAddress) {
      $this->CustAddress = $custAddress;
    }

    public function getCustCity() {
      return $this->CustCity;
    }

    public function setCustCity($custCity) {
      $this->CustCity = $custCity;
    }

    public function getCustProv() {
      return $this->CustProv;
    }

    public function setCustProv($custProv) {
      $this->CustProv = $custProv;
    }

    public function getCustPostal() {
      return $this->CustPostal;
    }

    public function setCustPostal($custPostal) {
      $this->CustPostal = $custPostal;
    }

    public function getCustCountry() {
      return $this->CustCountry;
    }

    public function stCustCountry($custCountry) {
      $this->CustCountry = $custCountry;
    }

    public function getCustHomePhone() {
      return $this->CustHomePhone;
    }

    public function setCustHomePhone($custHomePhone) {
      $this->CustHomePhone = $custHomePhone;
    }

    public function getCustBusPhone() {
      return $this->CustBusPhone;
    }

    public function setCustBusPhone($custBusPhone) {
      $this->CustBusPhone = $custBusPhone;
    }

    public function getCustEmail() {
      return $this->CustEmail;
    }

    public function setCustEmail($custEmail) {
      $this->CustEmail = $custEmail;
    }

    public function getAgentId() {
      return $this->AgentId;
    }

    public function setAgentId($agentId) {
      $this->AgentId = $agentId;
    }

    public function getCustPassword() {
      return $this->CustPassword;
    }

    public function setCustPassword($custPassword) {
      $this->CustPassword = $custPassword;
    }

    /*
    this is probably not the best way to get the properties for an SQL statment
    If the properties of this class are ever changed it will break
    */
    public function getVariables() {
      return get_object_vars($this);
    }

  }

 ?>
