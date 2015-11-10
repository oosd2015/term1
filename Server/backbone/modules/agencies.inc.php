<?php
    include("../global.php");
    $dB = new DB('travelexperts');

    $query = "SELECT * FROM `agencies`";
    $agencies = $dB->get($query);



    print_r($agencies);

    //var_dump($customers[0]->CustomerId);
    //echo $customers[0]->CustomerId;


 ?>
