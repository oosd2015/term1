<?php
    include("../global.php");

///////////////////////////////////////////////////////////////////////////////

    class Agencies {

        public $myAgencies;
        public  $myHtmlString;

        function __constructor () {
            $this->getAgencies();
        }

        function getAgencies () {
            $dB = new DB('travelexperts');
            $query = "SELECT * FROM `agencies`";
            $this->myAgencies = $dB->get($query);
        }

        function formatAgencies () {
            // foreach ($this->myAgencies as $agency) {
                print_r ($this->myAgencies);
                // print_r ($agency . "<br /><br />");
                // $this->myHtmlString = $this->$myHtmlOpen . $this->$myContent . $this->$myHtmlClose;
            // }
        }
    }

    $agencies = new Agencies ();
    print_r ($agencies->getAgencies ());
    print_r ($agencies);
    //var_dump($customers[0]->CustomerId);
    //echo $customers[0]->CustomerId;


 ?>
