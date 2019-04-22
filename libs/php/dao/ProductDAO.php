<?php
class ProductDAO extends BaseDAO{
  function __construct(){
     parent::__construct("product");
  }
  function getProducts($cateId,$local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1 AND category_id='.$cateId);
    }else{
      $result = $this->getQuery('SELECT p.* FROM res_product rp LEFT JOIN product p ON rp.product_id=p.id WHERE p.available=1 AND rp.res_id='.DBAdapter::RES_ID.' AND category_id='.$category,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
