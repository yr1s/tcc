<?php 

require_once (dirname(__FILE__)."/DB.php");

class Crud {
  /* @var BD `_bd` represents an access interface to the database */ 
  private static $_db = null;

  public static function create($table, $row) : bool {  
    return self::$_db->insert($table, $row);
  }

  public static function read($table, $columns, $conditions) : array {
    return self::$_db->select($table, $columns, $conditions);
  }

  public static function update($table, $updated, $conditions) : bool {
    return self::$_db->update($table, $updated, $conditions);  
  }

  public static function delete($table, $conditions) : bool {
    return self::$_db->delete($table, $conditions);
  }

  public static function getConnection() : void {
    if (self::$_db === null) { self::$_db = DB::getInstance(); }
  }
}