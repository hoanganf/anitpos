<?php
include_once 'importer.php';
include_once constant("DAO_DIR").'ProductDAO.php';
include_once constant("MODEL_DIR").'ProductResponseBuilder.php';
$responseGetter=new ResponseGetter();
$request->pageId='product';
echo $responseGetter->get($request);
?>
