<?php
// print result
	define('DAO_DIR','../libs/php/dao/');
	define('CONTROLLER_DIR','src/controllers/');
	define('MODEL_DIR','src/models/');
	define('VIEW_DIR','src/views/');

	include_once constant("DAO_DIR").'DAO.php';
	include_once constant("DAO_DIR").'BaseDAO.php';
	include_once constant("DAO_DIR").'OrderDAO.php';
	include_once constant("DAO_DIR").'TableDAO.php';
	include_once constant("DAO_DIR").'ProductDAO.php';

	include_once constant("MODEL_DIR").'PageResource.php';
	include_once constant("MODEL_DIR").'ViewBuilder.php';
	include_once constant("CONTROLLER_DIR").'ViewGetter.php';

	$pageBuilder=new ViewGetter();
	$pageBuilder->get();
?>
