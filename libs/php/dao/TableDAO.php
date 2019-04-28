<?php
class TableDAO extends BaseDAO{
  function __construct(){
     parent::__construct("`table`");
  }
  function getTablesByAreaId($areaId,$local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1 AND area_id='.$areaId);
    }else{
      $result = $this->getAllWhere('available=1 AND area_id='.$areaId.' AND res_id='.DAO::$RES_ID,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  function getTable($tableId,$local=false){
    $result=null;
    if($local){
      $result = $this->getOnceWhere('available=1 AND id='.$tableId);
    }else{
      $result = $this->getOnceWhere('available=1 AND id='.$tableId.' AND res_id='.DAO::$RES_ID,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
