<?php
class BaseDAO extends DAO{
  private $tableName;
  function __construct($tableName) {
    $this->tableName = $tableName;
  }
  public function getTableName(){
    return $this->tableName;
  }
  public function getAll($database){
    return $this->getListQuery('SELECT * FROM '.$this->tableName,$database);
  }
  public function getOnceWhere($query,$database=null){
    return $this->getRowQuery('SELECT * FROM '.$this->tableName.' WHERE '.$query,$database);
  }
  public function getAllWhere($query,$database=null){
    return $this->getListQuery('SELECT * FROM '.$this->tableName.' WHERE '.$query,$database);
  }
  public function getAllQuery($query,$database=null){
    return $this->getListQuery($query,$database);
  }
  public function getOnceQuery($query,$database=null){
    return $this->getRowQuery($query,$database);
  }
}
?>
