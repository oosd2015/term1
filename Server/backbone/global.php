<?php
include("globalExtensions.php");

  class DB {
		public function __construct($selector="travelexperts") {
      switch ($selector) {
          case "travelexperts":
                $this->user = DATABASE_TRAVELEXPERTS_USERNAME;
    			      $this->password = DATABASE_TRAVELEXPERTS_PASSWORD;
    			      $this->database = DATABASE_TRAVELEXPERTS;
              break;
          default:
              //No Connection
      }
      $this->host = DATABASE_HOST;
		}
		public function connect() {
			return new mysqli($this->host, $this->user, $this->password, $this->database);
		}
		public function get($query) {
			$db = $this->connect();
			$result = $db->query($query);
      $results;
      if(!$result){
        $db->close();
        return array("error"=>DATABASE_QUERY_ERROR);
      }else{
        while ($row = $result->fetch_object()) {
  				$results[] = $row;
  			}
        $result->free();
        $db->close();
  			return $results;
      }
		}
    public function set($query) {
      $db = $this->connect();
      $result = $db->query($query);
      if(!$result){
        $db->close();
        return false;
      }else{
        $db->close();
        return true;
      }
    }
    public function __destruct(){
        //CLEAN UP-> Everything should already be cleaned up...
    }
  }

/*
  $db = new DB('travelexperts');

  $query = "SELECT * FROM `customers` WHERE `CustomerId`='104'";
  $customers = $db->get($query);

  print_r($customers);

  var_dump($customers[0]->CustomerId);
  echo $customers[0]->CustomerId;
  */
 ?>
