<?php
define('E_NO_ORDER',300);
define('E_NO_NUMBER_ID',301);
define('E_TRANSACTION_FAILT',302);
define('E_MYSQL_CONNECTION_FAIL',303);
define('E_MYSQL_QUERY_FAIL',304);
define('E_DELETE_FAILT',305);
define('E_FILE',320);
define('E_NI',400);
function errorHandler($code,$err_message='',$errfile='', $errline='', $errcontext=''){
  $message = date("Y-m-d H:i:s - ");
  $message .= "Error: [".$code."], "."$err_message in $errfile on line $errline, ";
  $message .= "Variables:".print_r($errcontext,true)."\r\n";
  error_log($message, 3, "log/error_log.txt");
  switch ($code) {
    case 200:
      $status=STATUS_OK;
      break;
    case 300:
    case 301:
    case 302:
    case 305:
    default:
      break;
  }
  include 'error.php';
  die();
}
set_error_handler("errorHandler");
?>
