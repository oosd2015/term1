<?php
/*************************************************************************** 
Title:       PHP Agencies & Agents and Contact View Class
Author:      Royal Bissell, Deyanira Cerdas Calvo (Pair Programming)
Date:        2015-11-18 
Description: This file contains the classes to hold agent and agency data,
             and print agent and agency contact info.
*****************************************************************************/ 

/*****************************************************************************
Author: Royal
This class contains the properties methods for agency data
Designed so the properties match the database (and input fields names)
*****************************************************************************/
class Agency {
  private $AgencyId;
  private $AgncyAddress;
  private $AgncyCity;
  private $AgncyProv;
  private $AgncyPostal;
  private $AgncyCountry;
  private $AgncyPhone;
  private $AgncyFax;

  public function __construct($AgencyObj) {
    $this->AgencyId     = $AgencyObj->AgencyId;
    $this->AgncyAddress = $AgencyObj->AgncyAddress;
    $this->AgncyCity    = $AgencyObj->AgncyCity;
    $this->AgncyProv    = $AgencyObj->AgncyProv;
    $this->AgncyPostal  = $AgencyObj->AgncyPostal;
    $this->AgncyCountry = $AgencyObj->AgncyCountry;
    $this->AgncyPhone   = $AgencyObj->AgncyPhone;
    $this->AgncyFax     = $AgencyObj->AgncyFax;
  }

  public function getAgencyId() {
    return $this->AgencyId;
  }

  public function setAgencyId($agentId) {
    $this->AgencyId = $agentId;
  }

  public function getAgncyAddress() {
    return $this->AgncyAddress;
  }

  public function setAgncyAddress($agencyAddress) {
    $this->AgncyAddress = $agencyAddress;
  }

  public function getAgncyCity() {
    return $this->AgncyCity;
  }

  public function setAgncyCity($agencyCity) {
    $this->AgncyCity = $agencyCity;
  }

  public function getAgncyProv() {
    return $this->AgncyProv;
  }

  public function setAgncyProv($AgencyProv) {
    $this->AgncyProv = $AgencyProv;
  }

  public function getAgncyPostal() {
    return $this->AgncyPostal;

  }
  public function setAgncyPostal($AgencyPostal) {
    $this->AgncyPostal = $AgencyPostal;
  }

  public function getAgncyCountry() {
    return $this->AgncyCountry;
  }

  public function setAgncyCountry($agencyCountry) {
    $this->AgncyCountry = $agencyCountry;
  }

  public function getAgncyPhone() {
    return $this->AgncyPhone;
  }

  public function setAgncyPhone($agencyPhone) {
    $this->AgncyPhone = $agencyPhone;
  }

  public function getAgncyFax() {
    return $this->AgncyFax;
  }

  public function setAgncyFax($agencyFax) {
    $this->AgncyFax = $agencyFax;
  }
}

/*****************************************************************************
Author: Royal
This class contains the properties and methods for an agents data
*****************************************************************************/
class Agent {
    private $AgentId;
    private $AgtFirstName;
    private $AgtMiddleInitial;
    private $AgtLastName;
    private $AgtBusPhone;
    private $AgtEmail;
    private $AgtPosition;
    private $AgencyId;

    public function __construct($agentObj) {

      $this->AgentId          = $agentObj->AgentId;
      $this->AgtFirstName     = $agentObj->AgtFirstName;
      $this->AgtMiddleInitial = $agentObj->AgtMiddleInitial;
      $this->AgtLastName      = $agentObj->AgtLastName;
      $this->AgtBusPhone      = $agentObj->AgtBusPhone;
      $this->AgtEmail         = $agentObj->AgtEmail;
      $this->AgtPosition      = $agentObj->AgtPosition;
      $this->AgencyId         = $agentObj->AgencyId;
    }

    public function getAgentId() {
        return $this->AgentId;
    }

    public function setAgentId($agentId) {
        $this->AgentId = $agentId;
    }

    public function getAgtFirstName() {
        return $this->AgtFirstName;
    }

    public function setAgtFirstName($agtFName) {
        $this->AgtFirstName = $agtFName;
    }

    public function getAgtLastName() {
        return $this->AgtLastName;
    }

    public function setAgtLastName($agtLName) {
        $this->AgtLastName = $agtLName;
    }

    public function getAgtMiddleInitial() {
        return $this->AgtMiddleInitial;
    }

    public function setAgtMiddleInitial($agtMidInitial) {
        $this->AgtMiddleInitial = $agtMidInitial;
    }

    public function getAgtBusPhone() {
        return $this->AgtBusPhone;
    }

    public function setAgtBusPhone($agtPhone) {
        $this->AgtBusPhone = $agtPhone;
    }

    public function getAgtEmail() {
        return $this->AgtEmail;
    }

    public function setAgtEmail($agtEmail) {
        $this->AgtEmail = $agtEmail;
    }

    public function getAgtPosition() {
        return $this->AgtPosition ;
    }

    public function setAgtPosition($agtPosition) {
        $this->AgtPosition = $agtPosition;
    }

    public function getAgencyId() {
        return $this->AgencyId;
    }

    public function setAgencyId($agencyId) {
        $this->AgencyId = $agencyId;
    }
  }

  /*****************************************************************************
  Author: Deya
  This class contains the methods to display agents and agencies contact info
  *****************************************************************************/
  class ContactView {

    public function getContactHtml() {
      return $this->getAgenciesHtml();
    }

    //function to return html for agencies and their agents in a bootstrap layout
    public function getAgenciesHtml() {
      $html = '<div class="row">';

      //call the db global class to perform queries
      $dB = new DB('travelexperts');
      $query = "SELECT * FROM `agencies`";
      $agencies = $dB->get($query);

      //start looping through agencies
      for ($i = 0; $i < count($agencies); $i++) {
        $agency = new Agency($agencies[$i]);
        $html .= '<div class="row"><div class="col-md-12 text-center">
                    <h2 class="section-heading" style="background-color:#f05f40; color:white; padding:.5em; margin:1em; border-radius:10px;">' . $agency->getAgncyCity() . ' Office</h2><strong>'
                      . 'Phone: ' . $agency->getAgncyPhone() . '<br/>'
                      . 'Fax: ' . $agency->getAgncyFax() . '<br/>'
                      . $agency->getAgncyAddress() . ', ' . $agency->getAgncyCity() . ', ' . $agency->getAgncyProv() . '<br/>'
                      . $agency->getAgncyPostal() . ', ' . $agency->getAgncyCountry() . '<br/></strong><hr/>';

        //get agents and pass in the current agency
        $html .= $this->getAgentsHtml($agency);
      }
      $html .= '</div></div></div>';
      return $html;
    }

    //function to return html for agents in a bootstrap layout
    public function getAgentsHtml($agency) {
      $html = '';

      //call the db global class to perform queries
      $myAgencyId = $agency->getAgencyId();
      $dB = new DB('travelexperts');
      $query = "SELECT * FROM `agents` WHERE `AgencyId`='$myAgencyId'";
      $agents = $dB->get($query);
      $html .= '<div class="row" style="text-align:center">';
      //start looping through agents
      for ($k = 0; $k < count($agents); $k++) {
        $agent = new Agent($agents[$k]);
        $html .= '<div class="col-md-4" style="padding:0.5em">';
        $html .=  '<strong>' . $agent->getAgtFirstName() . ' ' . $agent->getAgtMiddleInitial() . ' ' . $agent->getAgtLastName() . '</strong><br/>' .
                  $agent->getAgtPosition() . '<br/>' .
                  $agent->getAgtBusPhone() . '<br/>' .
                  $agent->getAgtEmail() . '<br/></div>';
      }
      $html .= '</div>';
      return $html;
    }
  }
?>
