<?php
	//echo 'CashierPageBuilder: '.$_SERVER["PHP_SELF"];
	class CashierPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			$adapter=new AreaDAO();
			$resource->areas=$adapter->getAreas(true);
			include constant('VIEW_DIR').'page_cashier.php';
		}
	}
?>
