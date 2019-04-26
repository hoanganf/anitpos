<?php foreach( $resource->orders as $order){
?>
 <tr onclick="onOrderTableItemClick(<?php echo $order['number_id'];  ?>,event)">
   <td class="text-align--left width--full"><strong style="color: #2196F3;"><?php echo "[".$order['number_id']."] ".$order['table_name']?></strong></td>
   <td class="text-align--center"><span class="rounded background-color--green padding"><?php echo $order['count_sum'];?></span></td>
   <td class="white-space--nowrap text-align--right"><span class="rounded background-color--yellow padding"><?php echo number_format($order['price_sum']);?></span</td>
   <td onclick="editOrder(event,<?php echo $order['number_id'];?>);return false;"><img width="24px" height="24px" src="./images/ic_edit.png" alt="Them"></td>
   <td onclick="deleteOrder(event,<?php echo $order['number_id']; ?>);return false;"><img width="24px" height="24px" src="./images/ic_close.png" alt="Xoa"></td>
 </tr>
<?php }
?>
