<?php
include("globalExtensions.php");
phpinfo();
  class DB {
		public function __construct($selector="users") {
      switch ($selector) {
          case "users":
                $this->user = DATABASE_USERS_USERNAME;
    			      $this->password = DATABASE_USERS_PASSWORD;
    			      $this->database = DATABASE_USERS;
              break;
          case "notes":
                $this->user = $user;
                $this->password = $password;
                $this->database = $database;
              break;
          default:
              //No Connection
      }
      $this->host = DATABASE_HOST;
		}
		public function connect() {
			return new mysqli($this->host, $this->user, $this->password, $this->database);
		}
		public function select($query) {
			$db = $this->connect();
			$result = $db->query($query);
      $results;
      if(!$result){
        return array("error"=>DATABASE_QUERY_ERROR);
      }else{
        while ($row = $result->fetch_object()) {
  				$results[] = $row;
  			}
        $result->free();
  			return $results;
      }
		}
    public function query($query) {
      $db = $this->connect();
      $result = $db->query($query);
      if(!$result){
        return false;
      }else{
        return true;
      }
    }
  }
  $db_users = new DB('users');
  print_r($db_users);

  $query = "SELECT * FROM `users`";
  $db_users->select($query);

  $query = "UPDATE `users` SET `password`='".."' WHERE `id`='2'";
  if($db_users->query($query)){
    echo 'Update Successful';
  }else{
    echo 'Update Failed';
  }





 ?>
