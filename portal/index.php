<?php
// print result
	define('DAO_DIR','../libs/php/dao/');
	define('LIB_DIR','../libs/php/');
	define('CONTROLLER_DIR','src/controllers/');
	define('MODEL_DIR','src/models/');
	define('VIEW_DIR','src/views/');

	include_once constant("LIB_DIR").'jwt/BeforeValidException.php';
	include_once constant("LIB_DIR").'jwt/ExpiredException.php';
	include_once constant("LIB_DIR").'jwt/SignatureInvalidException.php';
	include_once constant("LIB_DIR").'jwt/JWT.php';
	include_once constant("LIB_DIR").'Login.php';
	include_once constant("LIB_DIR").'error_handling.php';

	include_once constant("DAO_DIR").'DAO.php';
	include_once constant("DAO_DIR").'BaseDAO.php';
	include_once constant("DAO_DIR").'AreaDAO.php';
	include_once constant("DAO_DIR").'OrderDAO.php';
	include_once constant("DAO_DIR").'TableDAO.php';
	include_once constant("DAO_DIR").'CategoryDAO.php';
	include_once constant("DAO_DIR").'ProductDAO.php';
	include_once constant("DAO_DIR").'ProductCommentDAO.php';
	include_once constant("DAO_DIR").'UnitDAO.php';

	include_once constant("MODEL_DIR").'PageResource.php';
	include_once constant("MODEL_DIR").'PageBuilder.php';
	include_once constant("MODEL_DIR").'CashierPageBuilder.php';
	include_once constant("MODEL_DIR").'OrderPageBuilder.php';
	include_once constant("MODEL_DIR").'CheckOutPageBuilder.php';
	include_once constant("MODEL_DIR").'ProductPageBuilder.php';
	include_once constant("MODEL_DIR").'CategoryPageBuilder.php';
	include_once constant("MODEL_DIR").'UnitPageBuilder.php';

	include_once constant("CONTROLLER_DIR").'PageGetter.php';

	set_error_handler("errorRedirect");

	$pageId='cashier';
	if(isset($_GET['pageId'])){
		$pageId=$_GET['pageId'];
	}
	$pageBuilder=new PageGetter();
	$pageBuilder->get($pageId);
?>
