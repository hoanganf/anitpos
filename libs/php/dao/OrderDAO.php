<?php
class OrderDAO extends BaseDAO{
  function __construct(){
     parent::__construct("`order`");
  }
  //getOrderListByArea
  function getOrderListGroupByTableInArea($area_id=-1){
    $sql=null;
    if($area_id>0) $sql="SELECT	o.*,t.name as table_name,sum(o.count) as count_sum,sum(o.price) as price_sum FROM `order` o INNER JOIN `table` t ON t.id = o.table_id WHERE t.area_id=$area_id GROUP BY o.number_id ORDER BY o.order_time DESC";
    else $sql="SELECT	o.*,t.name as table_name,sum(o.count) as count_sum,sum(o.price) as price_sum FROM orders o INNER JOIN tables t ON t.id = o.table_id GROUP BY o.number_id ORDER BY o.order_time DESC;";

    return $this->getQuery($sql);
  }
}
?>
