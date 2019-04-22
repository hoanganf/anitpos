<?php
class CategoryDAO extends BaseDAO{
  function __construct(){
     parent::__construct("category");
  }
  function getCategories($local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1');
    }else{
      $result = $this->getAllWhere('available=1 AND res_id='.DAO::$RES_ID,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
