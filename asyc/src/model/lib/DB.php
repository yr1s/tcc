<?php

class DB {
  /* @var mixed DB|null _instance describes an instance from BD class */
  private static $_instance = null;
  private $_host = '127.0.0.1',
  $_port = '3306',
  $_user = 'root',
  $_password = '',
  $_db = 'teste_asyc',
  $_charset = 'utf8mb4',
  $_result,
  $_status,
  $_connection;

  public function getStatus() : bool {
    return $this->_status;
  }

  public function getResult() {
    return $this->_result;
  }

	public function insert($table, $data) : bool { 
    if (empty($data)) { return false; }

    $fields = implode(', ' , array_keys($data));
    $values = array_values($data);
    $toInsert = '';

    $tmpCount = $values;
    foreach($values as $value) {
      $toInsert .= '?';          
      unset($tmpCount[0]);
      $tmpCount = array_values($tmpCount); // reindexing array
      if (count($tmpCount)) {
          $toInsert .= ', ';
      }
    }

    $sql = "INSERT INTO {$table} ({$fields}) VALUES({$toInsert})";
    $this->query($sql, $values);

    return $this->getStatus();
	}

	public function select($table, $columns, $where = 0) : array {
    $toSelect = ($columns === '*') || ($columns === 'count') ? $columns : implode(', ', $columns);

    if ($where) {
      $baseStatement = $this->where("select", $table, $where, $toSelect);
      $this->query($baseStatement['sql'], $baseStatement['values']);
    } else {
      $this->query("SELECT {$toSelect} FROM {$table}");
    }

    return $this->getResult();
	}

	public function update($table, $data, $where) : bool {
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

    return $this->getStatus();
  }

  public function reindexIDAutoIncrement($table, $id, $value) : void {
    $value = $value === "MAX" ? $this->select($table, "MAX($id)") : $value;
    $this->query("ALTER TABLE $table AUTO_INCREMENT = ?", [$value]);
  }

	public function delete($table, $where, $id, $reindexStartingPosition) : bool {
    if ($where) {
      $baseStatement = $this->where("delete", $table, $where);
      $this->query($baseStatement['sql'], $baseStatement['values']);
    } else {
      $this->query("DELETE FROM {$table}");
    }
    $this->reindexIDAutoIncrement($table, $id, $reindexStartingPosition);

    return $this->getStatus();
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
    if (count($parameters)) {
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

    $this->_status = $statement->execute();
    if (!$this->_status) {
      throw new Exception("****Consulta falhou****");
    }

    $this->_result = $statement->fetchAll();
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
      throw new \PDOException("****Nao foi possivel se conectar com banco**** " . $exception->getMessage(), (int) $exception->getCode());
		}
  }
}
