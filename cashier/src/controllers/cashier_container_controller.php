<?php
include_once ('../../lib/dao/AreaDAO.php');
$areaId=-1;
$numberId=-1;
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
if(isset($_GET['areaId'])){
	$areaId=$_GET['areaId'];
}
if(isset($_GET['numberId'])){
	$numberId=$_GET['numberId'];
}
if($action=='loadOrderGroups'){
	$orders =getGroupOrderListByArea($areaId);
	 foreach( $orders as $order){
		?>
    <tr onclick="onOrderTableItemClick(<?php echo $order['number_id'];  ?>,event)">
      <td class="left_align"style="width: 100%;"><strong style="color: #2196F3;"><?php echo "[".$order['number_id']."] ".$order['table_name']?></strong></td>
      <td style="text-align:center"><span style="border-radius: 5px;background-color:#65c778;color:white;padding:5px"><?php echo $order['count_sum'];?></span></td>
      <td style="white-space: nowrap;text-align: right;"><span style="border-radius: 5px;background-color:#FFD300;color:white;padding:5px"><?php echo number_format($order['price_sum']);?></span</td>
      <td onclick="editOrder(event,<?php echo $order['number_id'].",".$order['table_id']; ?>);return false;"><img width="24px" height="24px" src="./images/ic_edit.png" alt="Them"></td>
      <td onclick="deleteOrder(event,<?php echo $order['number_id']; ?>);return false;"><img width="24px" height="24px" src="./images/ic_close.png" alt="Xoa"></td>
    </tr>
<?php }
}else if($action=='loadOrders'){
  if(!isset($_GET['numberId'])){
    header("location:index.php?pageId=cashier&error=".getResponse(E_NO_NUMBER_ID));
    return;
  }
	$orders=getOrderDetailListByNumberId($numberId);
  if(count($orders)<1){
    header("location:index.php?pageId=cashier&error=".getResponse(E_NO_ORDER));
    exit;
  }
  ?>
  <tr>
    <th>[<?php echo count($orders); ?>] mon</th>
    <th style="white-space: nowrap;">Tong tien [<?php echo number_format(array_sum(array_column($orders,'price')))." VND"; ?>]</th>
  </tr>
  <?php
	 foreach( $orders as $order){
		?>
    <tr>
      <td style="width:100%;" class="left_align"><strong style="color: #2196F3;"><?php echo $order['product_name'] ?></strong><?php if(isset($order['comments'])) echo "<br/>".$order['comments']?></td>
      <td style="white-space: nowrap;text-align: right;"><span style="border-radius: 5px;background-color:#FFD300;color:white;padding:2px;"><?php echo number_format($order['price']);?></span></td>
    </tr>
	<?php }
}else if($action=='loadAreas'){
	$areas =getAreas();
	foreach( $areas as $area){
    echo '<a data-id="'.$area['id'].'" href="#" onclick="loadOrderGroups('.$area['id'].');return false;">'.$area['name'].'</a>';
 }
}else if($action=='deleteOrder'){
  echo deleteOrderByNumberId($numberId);
}
?>
