<?php
class DAO{
  const CONFIG_FILE_PATH='config.xml';
  const LOCAL_HOST='localhost';
  const LOCAL_USER_NAME='root';
  const LOCAL_PASSWORD='';
  const LOCAL_DATABASE_NAME='anit_pos';

  const SERVER_HOST='localhost';
  const SERVER_USER_NAME='root';
  const SERVER_PASSWORD='';
  protected static $SERVER_DATABASE_NAME='anit_pos_server';

  protected static $RES_ID=1;
  private $connection=null;
  function __construct() {
  //  $xml=simplexml_load_file(self::CONFIG_FILE_PATH);
  }
  function connect(){
    if($this->connection==null){
      $args = func_get_args();
      $argCount = func_num_args();
      switch ($argCount) {
        case 4:
          //echo 'case 4 <br/>';
          if($args[0] && $args[1] && $args[2] && $args[3]){
          //  echo 'case 4-OK <br/>';
            $this->connection=mysqli_connect($args[0],$args[1],$args[2],$args[3]);
            break;
          }
        case 1:
          //echo 'case 1 <br/>';
          if($args[0]){
            echo $args[0];
            $this->connection=mysqli_connect(self::LOCAL_HOST,self::LOCAL_USER_NAME,self::LOCAL_PASSWORD,$args[0]);
            break;
          }
        default:
        //  echo 'case default <br/>';
          $this->connection=mysqli_connect(self::LOCAL_HOST,self::LOCAL_USER_NAME,self::LOCAL_PASSWORD,self::LOCAL_DATABASE_NAME);
      }
      // Check connection
      if (!$this->connection) {
          die("Connection failed: " . mysqli_connect_error());
      }
      //set UTF
      mysqli_query($this->connection,"SET NAMES 'utf8'");
    }
    //echo 'end';
    return $this->connection;
  }
  public function __call($functionName, $args){
    //echo $functionName;
    //var_dump($args);
    switch (count($args)) {
      case 5:
        $this->connect($args[1],$args[2],$args[3],$args[4]);
        break;
      case 2:
        $this->connect($args[1]);
        break;
      default:
        $this->connect();
    }
    if($args[0]){
    	$queryResult=mysqli_query($this->connection,$args[0]);
      if(!$queryResult){
        echo $args[0];
        echo("Query Error description: " . mysqli_error($this->connection));
      }
      switch ($functionName) {
        case 'query':
        case "delete":
        case "update":
        case "multiQuery":
            $this->close();
            return $queryResult;
        case "insert":
          $queryResult=mysqli_insert_id($this->connection);
          $this->close();
        default:
          //DO NOTHING;
      }
    }
  }

  public static function log($content){
    file_put_contents("log.xml", $content, FILE_APPEND | LOCK_EX);
  }

  public function close(){
  	mysqli_close($this->connection);
    $this->connection=null;
  }

  public function fetchArray($queryResult){
  	return mysqli_fetch_array($queryResult);
  }

  private function convertQueryResultToList($queryResult){
    $list=array();
    while($row = $this->fetchArray($queryResult)){
      //array_push($list,$this->convertArrayToData($row));
      array_push($list,$row);
  	}
    return $list;
  }
  /*private function convertArrayToData($array){
    $data=new Data();
    foreach($array as $key => $value) {
      $data->$key=$value;
    }
    return $data;
  }*/

  public function getListQuery($sql){
    $result=array();
    $queryResult=$this->query($sql);
    return $this->convertQueryResultToList($queryResult);
  }

  public function getRowQuery($sql){
    $queryResult=$this->query($sql);
    if($row = $this->fetchArray($queryResult)){
  		//return $this->convertArrayToData($row);
      return $row;
  	}else{
      return null;
    }
  }
}
?>
