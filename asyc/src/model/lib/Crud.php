<?php 

require_once 'DB.php';

class Crud {
  /* @var BD `_bd` represents an access interface to the database */ 
  private static $_db = null;

  public static function create($table, $row) : void {  
    self::$_db->insert($table, $row);
  }

  public static function read($table, $columns, $conditions) : void {
    self::$_db->select($table, $columns, $condition);
  }

  public static function update($table, $updated, $conditions) : void {
    self::$_db->update($table, $updated, $conditions);    
  }

  public static function delete($table, $conditions) : void {
    self::$_db->delete($table, $conditions);
  }

  public static function getConnection() : void {
    if (self::$_db === null) { self::$_db = DB::getInstance(); }
  }
}