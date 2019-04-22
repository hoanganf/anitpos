<?php
// print result
	define('DAO_DIR','../libs/php/dao/');
	define('CONTROLLER_DIR','src/controllers/');
	define('MODEL_DIR','src/models/');
	define('VIEW_DIR','src/views/');

	include_once constant("DAO_DIR").'DAO.php';
	include_once constant("DAO_DIR").'BaseDAO.php';
	include_once constant("DAO_DIR").'AreaDAO.php';
	include_once constant("DAO_DIR").'OrderDAO.php';
	include_once constant("DAO_DIR").'TableDAO.php';
	include_once constant("DAO_DIR").'CategoryDAO.php';
	include_once constant("DAO_DIR").'ProductDAO.php';
	include_once constant("DAO_DIR").'ProductCommentDAO.php';

	include_once constant("MODEL_DIR").'PageResource.php';
	include_once constant("MODEL_DIR").'PageBuilder.php';
	include_once constant("MODEL_DIR").'CashierPageBuilder.php';
	include_once constant("MODEL_DIR").'OrderPageBuilder.php';

	include_once constant("CONTROLLER_DIR").'PageGetter.php';

	$pageId='cashier';
	if(isset($_GET['pageId'])){
		$pageId=$_GET['pageId'];
	}
	$pageBuilder=new PageGetter();
	$pageBuilder->get($pageId);
?>
