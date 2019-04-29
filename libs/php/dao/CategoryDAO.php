<?php
class CategoryDAO extends BaseDAO{
  function __construct(){
     parent::__construct("category");
  }
  function getCategories($local=false,$type='P'){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'');
    }else{
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  function getAllWithoutAvailable($local=false){
    $result=null;
    if($local){
      $result = $this->getAll();
    }else{
      $result = $this->getAllWhere('type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
