<?php
/*-------------------------------------------------------------------------------
Title:       Query String Class
Author:      Royal Bissell
Date:        2015-11-18 
Description: This file contains the class to create SQL query strings based.
------------------------------------------------------------------------------*/

  /*****************************************************************************
   A class to build SQL Query strings from Arrays
  *****************************************************************************/
  class QueryStr {

    private $myDataObj;
    private $myTable;
    private $myStmtType;

    /*
    Constructor takes an data Object, (ie Customer) the table name, and a
    statement type (ie. INSERT)
    */
    public function __construct($object, $tableName, $stmtType) {
        $this->myDataObj = $object;
        $this->myTable = $tableName;
        $this->myStmtType = $stmtType;
    }

    /*
    General function to start building a SQL query string
    Relies on a constuctor argument: $stmtType
    */
    public function setQueryStr() {
      //switch to check what type of String we will build
      switch ($this->myStmtType) {
        case "INSERT":
          $myQueryStr = $this->setInsertStr();
          return $myQueryStr;
        default:
          //if this ever happens, somethiong has gone wrong
          return false;
          break;
      } //End of switch
    }

    //function to create Insert specific SQL strings using explicit INTO and VALUES
    public function setInsertStr() {
      //get the array from the object
      $varArray = $this->myDataObj->getVariables();
      $fields = array_keys($varArray);
      $values = array_values($varArray);

      //add quotes to the current array's values
      foreach ($fields as $key=>$val) {
        $fields[$key] = "`" . $val . "`";
      }
      foreach ($values as $key=>$val) {
        if ( $val=== "") {
           $values[$key] = "NULL";
        } else {
            $values[$key] = "'" . $val . "'";
        }
      }

      //construct the insert String
      $insertStr =  "INSERT INTO `". $this->myTable .
                    "` (" . implode( ",", $fields) .
                    ") VALUES (" . implode( ",", $values) . ")";

      // print $insertStr;
      // ^^ leave this line commented;testing the string output, this is a good debug point
      return $insertStr;
    }
  }
 ?>
