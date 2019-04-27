<?php
define('DAO_DIR','../libs/php/dao/');
define('JWT_DIR','../libs/php/jwt/');
define('LIB_DIR','../libs/php/');
define('CONTROLLER_DIR','src/controllers/');
define('MODEL_DIR','src/models/');

include_once constant("DAO_DIR").'DAO.php';
include_once constant("DAO_DIR").'BaseDAO.php';
include_once constant("DAO_DIR").'NumberDAO.php';

include_once constant("DAO_DIR").'OrderDAO.php';
/*
$numberDAOAdapter=new NumberDAO();
echo $numberDAOAdapter->removeNumberId(103);*/
$order=array(
'table_id'=>1,
'product_id'=>1,
'count'=>1,
'comments'=>'',
'status'=>0,
'price'=>100000
);
$adapter=new OrderDAO();
echo $adapter->createOrder($order,'admin',103);

?>
