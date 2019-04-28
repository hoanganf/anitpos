<?php
class NumberDAO extends BaseDAO{
  function __construct(){
     parent::__construct("`number`");
  }
  function createNumberId(){// has connection mean transaction
    $numberId=-1;
    /*if(isset($this->connection)){
      $results=$this->queryNotAutoClose('SELECT * FROM number WHERE status=0 ORDER BY id ASC');
      if($row = $this->fetchArray($results)){
    		$numberId = $row['id'];
        $this->queryNotAutoClose('UPDATE number SET status=1 WHERE id='.$numberId);//set to status
    	} else {
        if($this->queryNotAutoClose("INSERT INTO number(status) values (1)") === TRUE){
          $numberId = $this->getLastInsertId();
        }
    	}
    }*/
    $result=$this->getOnceWhere('status=0 ORDER BY id ASC');
    if($result === null){
      $numberId=$this->insert('INSERT INTO number(status) values (1)');
    }else{
      $numberId=$result['id'];
      $this->update('UPDATE number SET status=1 WHERE id='.$numberId);
    }
    return $numberId;
  }
  function removeNumberId($numberId){// has connection mean transaction
    if($numberId<=0) return false;
    else{
      return $this->update('UPDATE number SET status=0 WHERE id='.$numberId);
    }
  }
}
?>
