<?php

///////////////////////////////////////////////////////////////////////////////

    class Agency {
      private $myAgents = array();
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

      public function getAgenciesContactInfo() {
        $htmlString = "Phone: " . $this->AgncyPhone . "<br/>" .
                      "Fax: " . $this->AgncyFax . "<br/>" .
                      $this->AgncyAddress . ", " . $this->AgncyCity . ", " . $this->AgncyProv . "<br/>" .
                      $this->AgncyPostal . ", " . $this->AgncyCountry . "<br/>";
        return $htmlString;
      }
    }

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

        public function __toString() {
            return "Agent: " .$this->AgentId          .", "
                             .$this->AgtFirstName     .", "
                             .$this->AgtMiddleInitial .", "
                             .$this->AgtLastName      .", "
                             .$this->AgtBusPhone      .", "
                             .$this->AgtEmail         .", "
                             .$this->AgtPosition      .", "
                             .$this->AgencyId;
        }

        public function getAgentContactInfo() {
            $htmlString = $this->getAgtFirstName() . " " . $this->getAgtMiddleInitial() . " " . $this->getAgtLastName() . "<br/>" .
                          $this->getAgtPosition() . "<br/>" .
                          $this->getAgtBusPhone() . "<br/>" .
                          $this->getAgtEmail() . "<br/>";
            return $htmlString;
        }
      }

      class AgenciesView {

        public function getAgenciesHtml() {
          $html = '<div class="row"><div class="col-lg-12 text-center">';
          $dB = new DB('travelexperts');
          $query = "SELECT * FROM `agencies`";
          $agencies = $dB->get($query);
          for ($i = 0; $i < count($agencies); $i++) {
            $agency = new Agency($agencies[$i]);
            $html .= '<div class="gallery-box"><div class="col-lg-12 text-center">
                        <h2 class="section-heading">' . $agency->getAgncyCity() . ' Office</h2>
                        <div>'
                          . 'Phone: ' . $agency->getAgncyPhone() . '<br/>'
                          . 'Fax: ' . $agency->getAgncyFax() . '<br/>'
                          . $agency->getAgncyAddress() . ', ' . $agency->getAgncyCity() . ', ' . $agency->getAgncyProv() . '<br/>'
                          . $agency->getAgncyPostal() . ', ' . $agency->getAgncyCountry() . '<br/>
                        </div>
                      </div></div>
                      <div class="container"><div class="row">
                      <div class="gallery-box"><div class="col-lg-12 text-center"><h3>Agents</h3>
                      </div></div>';
            $html .= $this->getAgentsHtml($agency);
          }
          $html .= '</div></div></div></div>';
          return $html;
        }

        public function getAgentsHtml($agency) {
          $html = '';
          $myAgencyId = $agency->getAgencyId();
          $dB = new DB('travelexperts');
          $query = "SELECT * FROM `agents` WHERE `AgencyId`='$myAgencyId'";
          $agents = $dB->get($query);
          for ($k = 0; $k < count($agents); $k++) {
            $agent = new Agent($agents[$k]);
            $html .= '<div align="center"><div class="col-md-4 agents" >';
            $html .=  $agent->getAgtFirstName() . ' ' . $agent->getAgtMiddleInitial() . ' ' . $agent->getAgtLastName() . '<br/>' .
                      $agent->getAgtPosition() . '<br/>' .
                      $agent->getAgtBusPhone() . '<br/>' .
                      $agent->getAgtEmail() . '</div></div>';
          }
          return $html;
        }
      }
 ?>
