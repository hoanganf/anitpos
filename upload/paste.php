<?php
//$headers=getallheaders();
//print_r($_FILES);
define('LIB_DIR','../libs/php/');
define('JWT_DIR','../libs/php/jwt/');
define('DAO_DIR','../libs/php/dao/');

require_once 'error_handling.php';
require_once 'util.php';

include_once constant("DAO_DIR").'DAO.php';
include_once constant("DAO_DIR").'BaseDAO.php';
include_once constant("DAO_DIR").'UserDAO.php';
include_once constant("DAO_DIR").'Data.php';
include_once constant("JWT_DIR").'BeforeValidException.php';
include_once constant("JWT_DIR").'ExpiredException.php';
include_once constant("JWT_DIR").'SignatureInvalidException.php';
include_once constant("JWT_DIR").'JWT.php';
include_once constant("LIB_DIR").'Login.php';
$request=new Data();
$login=new Login();
if(isset($_COOKIE['pos_access_token'])){
  $request->access_token=$_COOKIE['pos_access_token'];
  $loginResult=json_decode($login->login($request));
  if(!$loginResult->status){
    echo toJson('false',E_NO_LOGIN,'AccessDenied.');
  }else{
    FileUploadUtil::paste($_FILES["fileToUpload"],'files/'.$_POST['folder'].'/');
  }
}else{
  echo toJson('false',E_NO_LOGIN,'AccessDenied.');
}
?>
