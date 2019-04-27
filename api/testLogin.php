<?php
include_once 'importer.php';
$headers=getallheaders();
var_dump($headers);
$request=new Data();

if(isset($headers['access_token'])){
  $request->access_token=$headers['access_token'];
}
$data=json_decode(file_get_contents("php://input"));
if(isset($data->user_name)){
  $request->user_name=$data->user_name;
}
if(isset($data->password)){
  $request->password=$data->password;
}
$responseGetter=new Login();
echo $responseGetter->login($request);
?>
