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
  // for tool
  function create($product,$requester){
    $sql='INSERT INTO product (name, category_id, unit_id, price, description,available, image, default_status, add_count,creator,updater) ';
    $sql.= 'VALUES (\''.$product['name'].'\', '.$product['category_id'].', '.$product['unit_id'].', ';
    $sql.= $product['price'].', \''.$product['description'].'\','.$product['available'].',\'';
    $sql.= $product['image'].'\', '.$product['default_status'].','.$product['add_count'].',\'';
    $sql.= $requester.'\',\''.$requester.'\')';
    return $this->insert($sql,DAO::$SERVER_DATABASE_NAME);
  }
  function edit($product,$requester){
    $sql='UPDATE product SET ';
    $sql.= 'name=\''.$product['name'].'\', ';
    $sql.= 'category_id='.$product['category_id'].', ';
    $sql.= 'unit_id='.$product['unit_id'].', ';
    $sql.= 'price='.$product['price'].', ';
    $sql.= 'description=\''.$product['description'].'\', ';
    $sql.= 'available='.$product['available'].', ';
    $sql.= 'image=\''.$product['image'].'\', ';
    $sql.= 'default_status='.$product['default_status'].',';
    $sql.= 'add_count='.$product['add_count'].',';
    $sql.= 'updater=\''.$requester.'\',';
    $sql.= 'last_updated_date=now()';
    $sql.= ' WHERE id='.$product['id'];
    return $this->query($sql,DAO::$SERVER_DATABASE_NAME);
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
