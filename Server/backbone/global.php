<?php
include("modules/packages.inc.php");

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

  $db_users = new DB('users');
  print_r($db_users);

  $query = "SELECT * FROM `users`";
  $db_users->get($query);

  $query = "UPDATE `users` SET `password`='dsjkfjkdsjfsd' WHERE `id`='2'";
  if($db_users->set($query)){
    echo 'Update Successful';
  }else{
    echo 'Update Failed';
  }
 ?>
