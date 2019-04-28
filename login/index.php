<?php
define('DAO_DIR','../libs/php/dao/');
define('JWT_DIR','../libs/php/jwt/');
define('LIB_DIR','../libs/php/');
define('CONTROLLER_DIR','src/controllers/');
define('VIEW_DIR','src/views/');

include_once constant("JWT_DIR").'BeforeValidException.php';
include_once constant("JWT_DIR").'ExpiredException.php';
include_once constant("JWT_DIR").'SignatureInvalidException.php';
include_once constant("JWT_DIR").'JWT.php';
include_once constant("LIB_DIR").'Login.php';

include_once constant("DAO_DIR").'DAO.php';
include_once constant("DAO_DIR").'BaseDAO.php';
include_once constant("DAO_DIR").'UserDAO.php';
include_once constant("DAO_DIR").'Data.php';

include_once constant("CONTROLLER_DIR").'PageGetter.php';
include_once constant("LIB_DIR").'error_handling.php';
set_error_handler("errorRedirect");
/*
$headers=getallheaders();
if(isset($headers['Cookie'])){
  $headerCookies = explode('; ', $headers['Cookie']);
   $cookies = array();
   foreach($headerCookies as $itm) {
       list($key, $val) = explode('=', $itm,2);
       $cookies[$key] = $val;
   }

   print_r($cookies);
}
*/
$pageBuilder=new PageGetter();
$pageBuilder->buildHtml();
?>
