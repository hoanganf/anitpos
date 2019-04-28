<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST/GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

define('DAO_DIR','../libs/php/dao/');
define('JWT_DIR','../libs/php/jwt/');
define('LIB_DIR','../libs/php/');
define('CONTROLLER_DIR','src/controllers/');
define('MODEL_DIR','src/models/');

include_once constant("JWT_DIR").'BeforeValidException.php';
include_once constant("JWT_DIR").'ExpiredException.php';
include_once constant("JWT_DIR").'SignatureInvalidException.php';
include_once constant("JWT_DIR").'JWT.php';
include_once constant("LIB_DIR").'Login.php';

include_once constant("DAO_DIR").'DAO.php';
include_once constant("DAO_DIR").'BaseDAO.php';
include_once constant("DAO_DIR").'UserDAO.php';
include_once constant("DAO_DIR").'Data.php';

include_once constant("CONTROLLER_DIR").'ResponseGetter.php';
include_once constant("LIB_DIR").'error_handling.php';

set_error_handler("errorToJson");

$headers=getallheaders();

$request=new Data();

if(isset($headers['access_token'])){
  $request->access_token=$headers['access_token'];
}
/* TODO for login
$data=json_decode(file_get_contents("php://input"));
if(isset($data->user_name)){
  $request->user_name=$data->user_name;
}
if(isset($data->password)){
  $request->password=$data->password;
}*/
?>
