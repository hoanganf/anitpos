<?php
	//echo 'OrderPageBuilder: '.$_SERVER["PHP_SELF"];
	class CheckOutPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			$adapter=new OrderDAO();
			$resource->orders=$adapter->getOrderDetailListByNumberId($resource->numberId);
			if(count($resource->orders)<1){
				trigger_error('Xay ra su co xin vui long lien he quan ly',E_NO_ORDER);
			}
			include constant('VIEW_DIR').'page_check_out.php';
		}
	}
?>
