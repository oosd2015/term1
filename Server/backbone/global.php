<?php
/****************************************************************************
Title:       Global Functions
Author:      Dylan Harty and Heidi Cantalejo (pairProgramming)
Date:        2015-11-09
Description: This file contains classes that will be used on all pages
              across the website.
*****************************************************************************/
//ensure sessions start before everything!
session_start();

include("globalExtensions.php");

  //class for database functions
  class DB {

		public function __construct($selector="travelexperts") {

      //select database for travelexperts
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
      //connect to database
			$mydb = new mysqli($this->host, $this->user, $this->password, $this->database);
      if(!$mydb) {
        return false;
      }
      return $mydb;
		}

    //use query string to get data from database
    public function get($query) {
			$db = $this->connect();
			$result = $db->query($query);
      $results;
      if(!$result){
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
        $db->close();
        return $results;
      }
		}

    //instead of object, bring back associative array
    public function getAssoc($query) {
      $db = $this->connect();
      $result = $db->query($query);
      $results;
      if(!$result){
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
        $db->close();
        return $results;
      }
    }

    //returns the fields from an SQL query
    public function getFields($query) {
      $db = $this->connect();
      $result = $db->query($query);
      $results;
      if(!$result){
        $db->close();
        return false;
      }elseif($result->num_rows === 0){
        $db->close();
        return false;
      }else{
        while ($field = $result->fetch_field()) {
          $results[] = $field->name;
        }
        $result->free();
        $db->close();
        return $results;
      }
    }

    //insert values into the database
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

  //global function loggedIn check if user is logged in
  function loggedIn() {
    if ( isset($_SESSION["user"]) && !empty($_SESSION["user"]) ) {
      return true;
    } else {
      return false;
    }
  }

 //Get a random string using the $string
  function randomString($length = 5) {
      $string = '01234HIJKLMNOPQR56789ABCDEFGSTUVWXYZ';
      $charactersLength = strlen($string);$randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $string[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
 ?>
