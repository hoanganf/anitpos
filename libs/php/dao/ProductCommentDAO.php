<?php
class ProductCommentDAO extends BaseDAO{
  function __construct(){
     parent::__construct("product_comment");
  }
  function getProductComments($productId,$local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('product_id='.$productId);
    }else{
      //TODO $result = $this->getQuery('SELECT * FROM '.$this->getTableName(),DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
