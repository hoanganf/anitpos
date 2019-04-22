<?php
class AreaDAO extends BaseDAO{
  function __construct(){
     parent::__construct("area");
  }
  function getAreas($local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1');
    }else{
      $result = $this->getAllWhere('available=1 AND res_id='.DAO::$RES_ID,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  //get Area
  function getArea($id=1,$local=false){
    $dBAdapter=new DBAdapter();
    $result=null;
    if($local){
      $result = $this->getAllWhere('id='.$id.' AND available=1');
    }else{
      $result = $this->getAllWhere('id='.$id.' AND available=1 AND res_id='.DBAdapter::RES_ID,DAO::$SERVER_DATABASE_NAME);
    }
  	if($row = mysqli_fetch_array($result)){
  		return $row;
  	}else{
  	   return null;
    }
  }
}
?>
