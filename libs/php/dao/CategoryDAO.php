<?php
class CategoryDAO extends BaseDAO{
  function __construct(){
     parent::__construct("category");
  }
  function getCategories($type='P',$local=false){
    $result=null;
    if($local){
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'');
    }else{
      $result = $this->getAllWhere('available=1 AND type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }

  // for tool
  function getAllWithoutAvailable($type='P',$local=false){
    $result=null;
    if($local){
      $result = $this->getAll();
    }else{
      $result = $this->getAllWhere('type=\''.$type.'\'',DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }

  function getAllWithoutAvailableAndType($local=false){
    $result=null;
    if($local){
      $result = $this->getAll();
    }else{
      $result = $this->getAll(DAO::$SERVER_DATABASE_NAME);
    }
    return $result;
  }

  function create($category,$requester){
    $sql='INSERT INTO category (name, type, description,available, image, creator,updater) ';
    $sql.= 'VALUES (\''.$category['name'].'\', \''.$category['type'].'\', ';
    $sql.= '\''.$category['description'].'\','.$category['available'].',\'';
    $sql.= $category['image'].'\', ';
    $sql.= '\''.$requester.'\',\''.$requester.'\')';
    return $this->insert($sql,DAO::$SERVER_DATABASE_NAME);
  }
  function edit($category,$requester){
    $sql='UPDATE category SET ';
    $sql.= 'name=\''.$category['name'].'\', ';
    $sql.= 'type=\''.$category['type'].'\', ';
    $sql.= 'description=\''.$category['description'].'\', ';
    $sql.= 'available='.$category['available'].', ';
    $sql.= 'image=\''.$category['image'].'\', ';
    $sql.= 'updater=\''.$requester.'\',';
    $sql.= 'last_updated_date=now()';
    $sql.= ' WHERE id='.$category['id'];
    return $this->query($sql,DAO::$SERVER_DATABASE_NAME);
  }
}
?>
