<?php
class UnitDAO extends BaseDAO{
  function __construct(){
     parent::__construct("`unit`");
  }
  function getUnits($local=false,$type='P'){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'');
    }else{
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  function getAllWithoutAvailable($database=null,$type='P'){
    return $this->getAllWhere('type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
  }

}
?>
