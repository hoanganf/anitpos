<?php
class BaseDAO extends DAO{
  private $tableName;
  function __construct($tableName) {
    $this->tableName = $tableName;
  }
  public function getTableName(){
    return $this->tableName;
  }
  public function getAll(){
    return $this->getListQuery('SELECT * FROM '.$this->tableName);
  }
  public function getAllWhere($query){
    return $this->getListQuery('SELECT * FROM '.$this->tableName.' WHERE '.$query);
  }
  public function getQuery($query){
    return $this->getListQuery($query);
  }
}
?>
