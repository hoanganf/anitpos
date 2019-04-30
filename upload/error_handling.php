<?php
define('RESPONSE_MESSAGE','{"status":%s,"code":%s,"message":"%s"}');
define('SUCCEED',200);
define('E_NO_LOGIN',306);
define('E_FILE_NOT_IMAGE',1001);
define('E_FILE_TOO_LARGE',1002);
define('E_FILE_ALREADY_EXITS',1003);
define('E_FILE_NOT_ALLOW',1004);
define('E_NI',1005);
function toLog($code,$err_message='',$errfile='', $errline='', $errcontext=''){
  $message = date("Y-m-d H:i:s - ");
  $message .= "Error: [".$code."], "."$err_message in $errfile on line $errline, ";
  $message .= "Variables:".print_r($errcontext,true)."\r\n";
  error_log($message, 3, "error_log.log");
}
function errorToJson($code,$err_message='',$errfile='', $errline='', $errcontext=''){
  toLog($code,$err_message,$errfile, $errline, $errcontext);
  switch ($code) {
    case 200:
      $status=true;
      break;
    default:
      $status=false;
      break;
  }
  die(toJson($status,$code,$err_message));
}
function toJson($status,$code,$message){
  return sprintf(RESPONSE_MESSAGE,$status,$code,$message);
}

set_error_handler("errorToJson");
?>
