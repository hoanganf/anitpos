<?php
include_once 'importer.php';
include_once constant("DAO_DIR").'OrderDAO.php';
include_once constant("DAO_DIR").'NumberDAO.php';
include_once constant("DAO_DIR").'ProductDAO.php';
include_once constant("MODEL_DIR").'OrderResponseBuilder.php';
$responseGetter=new ResponseGetter();
$request->pageId='order';
$request->body=json_decode(file_get_contents("php://input"));
echo $responseGetter->get($request);
?>
