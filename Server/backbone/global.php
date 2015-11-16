<?php
//Ensure Sessions start before everything!
session_start();

include("globalExtensions.php");
include("modules/messages.inc.php");

  class DB {

    public $msg;

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
			$mydb = new mysqli($this->host, $this->user, $this->password, $this->database);
      if(!$mydb) {
        $this->msg = new ErrorMsg("Could not connect to the database.");
        return false;
      }
      return $mydb;
		}
    public function get($query) {
			$db = $this->connect();
			$result = $db->query($query);
      $results;
      if(!$result){
        $this->msg = new ErrorMsg("Could not complete the query.");
        $db->close();
        return false;
      } else {
        /*
        before we start fetching objects from rows, we need to make sure we
        actually returned a row
        */
        if ($result->num_rows === 0) {
          $results = 0;
        } else {
          while ($row = $result->fetch_object()) {
    				$results[] = $row;
    			}
        }
        $result->free();
        $this->msg = new SuccessMsg("Query Complete.");
        $db->close();
        return $results;
      }
		}

    public function getAssoc($query) {
      $db = $this->connect();
      $result = $db->query($query);
      $results;
      if(!$result){
        $this->msg = new ErrorMsg("Could not complete the query.");
        $db->close();
        return false;
      } else {
        /*
        before we start fetching objects from rows, we need to make sure we
        actually returned a row
        */
        if ($result->num_rows === 0) {
          $results = 0;
        } else {
          while ($row = $result->fetch_assoc()) {
            $results[] = $row;
          }
        }
        $result->free();
        $this->msg = new SuccessMsg("Query Complete.");
        $db->close();
        return $results;
      }
    }

    public function getFields($query) {
      $db = $this->connect();
      $result = $db->query($query);
      $results;
      if(!$result){
        $this->msg = new ErrorMsg("Could not complete the query.");
        $db->close();
        return false;
      }elseif($result->num_rows === 0){
        $this->msg = new ErrorMsg("Could not complete the query.");
        $db->close();
        return false;
      }else{
        while ($field = $result->fetch_field()) {
          $results[] = $field->name;
        }
        $result->free();
        $this->msg = new SuccessMsg("Query Complete.");
        $db->close();
        return $results;
      }
    }

    public function set($query) {
      $db = $this->connect();
      $result = $db->query($query);
      if(!$result){
        $this->msg[] = new ErrorMsg("Could not complete the query.");
        $db->close();
        return false;
      }else{
        $db->close();
        $this->msg[] = new SuccessMsg("Query Complete.");
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
