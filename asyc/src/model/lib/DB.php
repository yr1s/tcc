<?php

class DB {
  /* @var mixed DB|null _instance describes an instance from BD class */
  private static $_instance = null;
  private $_host = '127.0.0.1',
  $_port = '3306',
  $_user = 'root',
  $_password = '',
  $_db = 'super_asyc',
  $_charset = 'utf8mb4',
  $_result = '',
  $_connection;

	public function insert($table, $data) : void { 
    if (empty($data)) { return; }

    $fields = implode('` , `' , array_keys($data));
    $values = array_keys($values);
    $toInsert = '';

    $tmpCount = $values;
    foreach($values as $value) {
      $toInsert .= '?';          
      unset($tempCount[0]);
      if (count($tempCount)) {
          $toInsert .= ', ';
      }
    }

    $sql = "INSERT INTO {$table} ({$fields}) VALUES({$toInsert})";
    $this->query($sql, $values);
	}

	public function select($table, $columns, $where = 0) : array {
    $toSelect = ($columns === '*') || ($columns === 'count') ? $columns : implode(', ', $columns);

    if ($where) {
      $baseStatement = $this->where("select", $table, $where, $toSelect);
      $this->query($baseStatement['sql'], $baseStatement['values']);
    } else {
      $this->query("SELECT {$toSelect} FROM {$table}");
    }

    return $this->_result;
	}

	public function update($table, $data, $where) : void {
    $toUpdate = "";
    $updatedValues = [];

    foreach($data as $updating) {
      $field = $updating['field'];
      $updatedValues[] = $updating['newValue'];
      $toUpdate .= "{$field} = ?";

      array_shift($data);
      if (count($data)) {
        $toUpdate .= ", ";
      }
    }

    if ($where) {
      $baseStatement = $this->where("update", $table, $where, $toUpdate);
      $this->query($baseStatement['sql'], array_merge($updatedValues, $baseStatement['values']));
    } else {
      $this->query("UPDATE {$table} SET {$toUpdate}");
    }
  }

	public function delete($table, $where) : void {
    if ($where) {
      $baseStatement = $this->where("delete", $table, $where);
      $this->query($baseStatement['sql'], $baseStatement['values']);
    } else {
      $this->query("DELETE FROM {$table}");
    }
  }

  /* Modifies a query which uses where condition */
  private function where($queryType, $table, $where, $action = null) : array {
    $sql = match($queryType) {
      "select" => "SELECT {$action} FROM {$table} WHERE", 
      "update" => "UPDATE {$table} SET {$action} WHERE",
      "delete" => "DELETE FROM {$table} WHERE"
    };

    $comparisons = $where['comparisons'];
    $logicalOperators = $where['logicalOperators'];
    $values = [];

    foreach($comparisons as $expression) {
      $field = $expression['field'];
      $operator = $expression['operator'];
      $value = $expression['value'];

      $values[] = $value;
      $sql .= " {$field} {$operator} ?";

      if (count($logicalOperators)) {
        $sql .= " " . array_shift($logicalOperators);
      }
    }

    return ['sql' => $sql, 'values' => $values];
  }

  /* Prepares and execute a query */
  private function query($sql, $parameters = array()) : void {
    $statement = $this->_connection->prepare($sql);
    if (count($paremeters)) {
      $pos = 1;
      foreach($parameters as $parameter) {
        if (is_int($parameter)) {
          $statement->bindValue($pos, $parameter, PDO::PARAM_INT);    
        } else {
          $statement->bindValue($pos, $parameter, PDO::PARAM_STR);
        }
        $pos++;
      }
    }

    $this->status = $statement->execute();
    if (!$this->status) {
      throw new Exception("Consulta falhou");
    }

    $this->_result = $statement->fetch();
  }

	/* Returns an instance of the class itself */
  public static function getInstance() : DB {
    if (!isset(self::$_instance)) { self::$_instance = new DB(); }
    
    return self::$_instance;
   }

	/* @throws \PDOException if the connection fails */
	public function __construct() {
    $dsn = "mysql:host={$this->_host};dbname={$this->_db};port={$this->_port};charset={$this->_charset}";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];

		try {
      $this->_connection = new PDO($dsn, $this->_user, $this->_password, $options);
		} catch (\PDOException $exception) {
      throw new \PDOException("Nao foi possivel se conectar com banco ~ " . $exception->getMessage(), (int) $exception->getCode());
		}
	}
}
