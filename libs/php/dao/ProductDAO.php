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
      $result = $this->getAllQuery('SELECT p.* FROM res_product rp LEFT JOIN product p ON rp.product_id=p.id WHERE p.available=1 AND rp.res_id='.DAO::$RES_ID.' AND category_id='.$category,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  function getProduct($productId,$local=false){
    $result=null;
    if($local){
      $result = $this->getOnceWhere('available=1 AND id='.$productId);
    }else{
      $result = $this->getOnceQuery('SELECT p.* FROM res_product rp LEFT JOIN product p ON rp.product_id=p.id WHERE p.available=1 AND rp.res_id='.DAO::$RES_ID.' AND id='.$productId,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
  //get all accept available=0
  function getProductWithoutAvailable($productId,$local=false){
    $result=null;
    if($local){
      $result = $this->getOnceWhere('id='.$productId);
    }else{
      $result = $this->getOnceWhere('id='.$productId,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }

  function getAllWithoutAvailableByCategoryId($cateId,$local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('category_id='.$cateId);
    }else{
      $result = $this->getAllWhere('category_id='.$cateId,DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }

  function getAllWithoutAvailable($local=false){
    $result=null;
    if($local){
      $result = $this->getAll();
    }else{
      $result = $this->getAll(DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }
}
?>
