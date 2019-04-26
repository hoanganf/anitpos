<?php
	//echo 'OrderPageBuilder: '.$_SERVER["PHP_SELF"];
	class CheckOutPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			$adapter=new OrderDAO();
			$resource->orders=$adapter->getOrderDetailListByNumberId($resource->numberId);
			include constant('VIEW_DIR').'page_check_out.php';
		}
	}
?>
