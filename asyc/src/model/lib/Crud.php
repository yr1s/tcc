<?php 

require_once (dirname(__FILE__)."/DB.php");

class Crud {
  /* @var BD `_bd` represents an access interface to the database */ 
  private static $_db = null;

  public static function create($table, $row) : boolean {  
    self::$_db->insert($table, $row);
    return self::$_db->getStatus();
  }

  public static function read($table, $columns, $conditions) : boolean {
    self::$_db->select($table, $columns, $condition);
    return self::$_db->getStatus();
  }

  public static function update($table, $updated, $conditions) : boolean {
    self::$_db->update($table, $updated, $conditions);  
    return self::$_db->getStatus();  
  }

  public static function delete($table, $conditions) : boolean {
    self::$_db->delete($table, $conditions);
    return self::$_db->getStatus();
  }

  public static function getConnection() : void {
    if (self::$_db === null) { self::$_db = DB::getInstance(); }
  }
}