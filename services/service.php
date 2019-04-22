<?php
require_once "php_lib/nusoap.php";
require_once "php_lib/common_dao.php";
error_reporting(0);
$name_space="service";
//********************************************** config ********************************************//
$server = new soap_server();
$server->soap_defencoding = 'UTF-8';
$server->decode_utf8 = false;//ns
$server->configureWSDL("Disaster Evacuation Support System ", "urn:service");
//******************************************** end config ******************************************//
//------------------- REGISTER DATA-----------------
  // array
  $server->wsdl->addComplexType('base_object_list',
  	'complexType',
  	'array',
  	'all',
  	'SOAP-ENC:Array',
  	array(),
  	array(
      array(
    		'id' => array('name' => 'id', 'type' => 'xsd:int'),
    		'name' => array('name' => 'name', 'type' => 'xsd:string')
       )
  	)
  );
  // table
  $server->wsdl->addComplexType('tables',
  	'complexType',
  	'array',
  	'all',
  	'SOAP-ENC:Array',
  	array(),
  	array(
      array(
    		'id' => array('name' => 'id', 'type' => 'xsd:int'),
        'area_id' => array('name' => 'area_id', 'type' => 'xsd:int'),
    		'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'description' => array('name' => 'description', 'type' => 'xsd:string')
       )
  	)
  );
//order_list
$server->wsdl->addComplexType('order_list',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'number_id' => array('name' => 'number_id', 'type' => 'xsd:int'),
      'table_id' => array('name' => 'table_id', 'type' => 'xsd:int'),
      'product_id' => array('name' => 'unit_id', 'type' => 'xsd:int'),
      'count' => array('name' => 'count', 'type' => 'xsd:int'),
      'comments' => array('name' => 'comments', 'type' => 'xsd:string'),
      'description' => array('name' => 'description', 'type' => 'xsd:string'),
      'order_time' => array('name' => 'order_time', 'type' => 'xsd:date'),
      'finish_time' => array('name' => 'finish_time', 'type' => 'xsd:date'),
      'status' => array('name' => 'status', 'type' => 'xsd:int'),
      'price' => array('name' => 'price', 'type' => 'xsd:int')
     )
  )
);
//products
$server->wsdl->addComplexType('products',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'category_id' => array('name' => 'category_id', 'type' => 'xsd:int'),
      'unit_id' => array('name' => 'unit_id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string'),
      'price' => array('name' => 'price', 'type' => 'xsd:int'),
      'description' => array('name' => 'description', 'type' => 'xsd:string'),
      'image' => array('name' => 'image', 'type' => 'xsd:string'),
      'default_status' => array('name' => 'default_status', 'type' => 'xsd:int'),
      'add_count' => array('name' => 'add_count', 'type' => 'xsd:int')
     )
  )
);
//productComments
$server->wsdl->addComplexType('product_comments',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'product_id' => array('name' => 'product_id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string')
     )
  )
);
//categories
$server->wsdl->addComplexType('categories',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string'),
      'image' => array('name' => 'image', 'type' => 'xsd:string')
     )
  )
);
//sales
$server->wsdl->addComplexType('sales',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string'),
      'description' => array('name' => 'description', 'type' => 'xsd:string'),
      'value' => array('name' => 'value', 'type' => 'xsd:int'),
      'apply_type' => array('name' => 'apply_type', 'type' => 'xsd:boolean')
     )
  )
);
//sale_applies
$server->wsdl->addComplexType('sale_applies',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'sale_id' => array('name' => 'sale_id', 'type' => 'xsd:int'),
      'product_id' => array('name' => 'product_id', 'type' => 'xsd:int'),
      'date_from' => array('name' => 'date_from', 'type' => 'xsd:date'),
      'date_to' => array('name' => 'date_to', 'type' => 'xsd:date'),
      'monday' => array('name' => 'monday', 'type' => 'xsd:boolean'),
      'tuesday' => array('name' => 'tuesday', 'type' => 'xsd:boolean'),
      'wednesday' => array('name' => 'wednesday', 'type' => 'xsd:boolean'),
      'thursday' => array('name' => 'thursday', 'type' => 'xsd:boolean'),
      'friday' => array('name' => 'friday', 'type' => 'xsd:boolean'),
      'saturday' => array('name' => 'saturday', 'type' => 'xsd:boolean'),
      'sunday' => array('name' => 'sunday', 'type' => 'xsd:boolean')
     )
  )
);
//ingredients
$server->wsdl->addComplexType('ingredients',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'category_id' => array('name' => 'category_id', 'type' => 'xsd:int'),
      'unit_id' => array('name' => 'unit_id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string'),
      'description' => array('name' => 'description', 'type' => 'xsd:string'),
      'image' => array('name' => 'image', 'type' => 'xsd:string'),
      'price' => array('name' => 'price', 'type' => 'xsd:int')
     )
  )
);
//stocks
$server->wsdl->addComplexType('stocks',
  'complexType',
  'array',
  'all',
  'SOAP-ENC:Array',
  array(),
  array(
    array(
      'id' => array('name' => 'id', 'type' => 'xsd:int'),
      'category_id' => array('name' => 'category_id', 'type' => 'xsd:int'),
      'unit_id' => array('name' => 'unit_id', 'type' => 'xsd:int'),
      'name' => array('name' => 'name', 'type' => 'xsd:string'),
      'description' => array('name' => 'description', 'type' => 'xsd:string'),
      'image' => array('name' => 'image', 'type' => 'xsd:string'),
      'count' => array('name' => 'count', 'type' => 'xsd:double')
     )
  )
);
//--------------------------------------- register function ----------------------------------------//
//------------------------------------ register getversion ------------------------------------//
$server->register("getVersion",
    array(),
    array(
  	  'id'=> 'xsd:int',
  		'name'=> 'xsd:string',
  		'address'=> 'xsd:string',
      'phone'=> 'xsd:string',
      'jweb_port'=> 'xsd:string',
      'area_ver'=> 'xsd:int',
      'table_ver'=> 'xsd:int',
      'category_ver'=> 'xsd:int',
      'product_ver'=> 'xsd:int',
      'product_unit_ver'=> 'xsd:int',
      'product_comment_ver'=> 'xsd:int',
      'product_construct_ver'=> 'xsd:int',
      'sale_ver'=> 'xsd:int',
      'sale_apply_ver'=> 'xsd:int',
      'ingredient_category_ver'=> 'xsd:int',
      'ingredient_unit_ver'=> 'xsd:int',
      'ingredient_ver'=> 'xsd:int'
  	),
    "urn:$name_space",
    "urn:$name_space#getVersion",
    "rpc",
    "encoded",
    "get Version");
  //--------------------- register Login --------------
$server->register("loginMobile",
	array("user_name" => "xsd:string", "password" => "xsd:string"),
	array("login_status"=>"xsd:boolean","user_name"=>"xsd:string","password"=>"xsd:string","message"=>"xsd:string"),
	"urn:$name_space",
    "urn:$name_space#loginMobile",
	"rpc",
	"encoded",
	"result");
  //--------------------- register getAreas --------------
$server->register("getAreas",
	array(),
	array('return' => 'tns:base_object_list'),
	"urn:$name_space",
  "urn:$name_space#getAreas",
	"rpc",
	"encoded",
	"result");
  //--------------------- register getTables --------------
$server->register("getTables",
  array(),
  array('return' => 'tns:tables'),
  "urn:$name_space",
  "urn:$name_space#getTables",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getOrderListByArea --------------
$server->register("getOrderListByArea",
array("area_id" => "xsd:int"),
  array('return' => 'tns:order_list'),
  "urn:$name_space",
  "urn:$name_space#getTableListByArea",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getOrderListByNumberId --------------
$server->register("getOrderListByNumberId",
array("number_id" => "xsd:int"),
  array('return' => 'tns:order_list'),
  "urn:$name_space",
  "urn:$name_space#getOrderListByNumberId",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getProducts --------------
$server->register("getProducts",
  array(),
  array('return' => 'tns:products'),
  "urn:$name_space",
  "urn:$name_space#getProducts",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getProductUnits --------------
$server->register("getProductUnits",
	array(),
	array('return' => 'tns:base_object_list'),
	"urn:$name_space",
  "urn:$name_space#getProductUnits",
	"rpc",
	"encoded",
	"result");
  //--------------------- register getProductComments --------------
$server->register("getProductComments",
  array(),
  array('return' => 'tns:product_comments'),
  "urn:$name_space",
  "urn:$name_space#getProductComments",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getCategories --------------
$server->register("getCategories",
  array(),
  array('return' => 'tns:categories'),
  "urn:$name_space",
  "urn:$name_space#getCategories",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getSales --------------
$server->register("getSales",
  array(),
  array('return' => 'tns:sales'),
  "urn:$name_space",
  "urn:$name_space#getSales",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getSaleApplies --------------
$server->register("getSaleApplies",
  array(),
  array('return' => 'tns:sale_applies'),
  "urn:$name_space",
  "urn:$name_space#getSaleApplies",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getIngredientCategories --------------
$server->register("getIngredientCategories",
  array(),
  array('return' => 'tns:categories'),
  "urn:$name_space",
  "urn:$name_space#getIngredientCategories",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getSaleApplies --------------
$server->register("getIngredients",
  array(),
  array('return' => 'tns:ingredients'),
  "urn:$name_space",
  "urn:$name_space#getIngredients",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getStocks --------------
$server->register("getStocks",
  array(),
  array('return' => 'tns:stocks'),
  "urn:$name_space",
  "urn:$name_space#getStocks",
  "rpc",
  "encoded",
  "result");
  //--------------------- register getSaleApplies --------------
$server->register("getIngredientUnits",
  array(),
  array('return' => 'tns:base_object_list'),
  "urn:$name_space",
  "urn:$name_space#getIngredientUnits",
  "rpc",
  "encoded",
  "result");
//********************************************************* end config *************************************//
$server->service($HTTP_RAW_POST_DATA);
?>
