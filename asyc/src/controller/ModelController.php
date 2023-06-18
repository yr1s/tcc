<?php

class ModelController {
  private static string $_pathToModel = "../model/entities/";
  private static string $_extensionFile = ".php";
  private static string $_fullPath;

  public static function getFullPath() : string {
    return self::$_fullPath;
  }

  public static function searchModel(string $model) : string {
    self::$_fullPath = self::$_pathToModel . $model . self::$_extensionFile;

    return file_exists(self::$_fullPath) ? self::$_fullPath : "";
  }
  
  public static function getModel($model) {
    self::searchModel($model);
    if (empty(self::$_fullPath)) { 
      return; 
    }

    require_once (self::$_fullPath);
    return new $model();
  }
}