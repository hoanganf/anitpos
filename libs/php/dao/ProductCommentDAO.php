<?php
class ProductCommentDAO extends BaseDAO{
  function __construct(){
     parent::__construct("product_comment");
  }
  function getProductComments($local=false){
    $result=null;
    if($local){
      $result = $this->getAll();
    }else{
      $result = $this->getQuery('SELECT * FROM '.$this->getTableName(),DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
