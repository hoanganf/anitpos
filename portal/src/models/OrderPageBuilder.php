<?php
	//echo 'OrderPageBuilder: '.$_SERVER["PHP_SELF"];
	class OrderPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			if(is_numeric($resource->numberId)){
				$adapter=new OrderDAO();
				$resource->orders=$adapter->getOrderListByNumberId($resource->numberId);
			}else{
				$resource->orders=array();
			}
			$adapter=new AreaDAO();
			$resource->areas=$adapter->getAreas(true);
			if(!empty($resource->areas)){
				$adapter=new TableDAO();
				$resource->tables=$adapter->getTablesByAreaId($resource->areas[0]['id'],true);
			}else{
				$resource->tables=array();
			}
			$adapter=new CategoryDAO();
			$resource->categories=$adapter->getCategories('P',true);
			if(!empty($resource->categories)){
				$adapter=new ProductDAO();
				$resource->cateId=$resource->categories[0]['id'];
				$resource->products=$adapter->getProducts($resource->cateId,true);
			}else{
				$resource->products=array();
			}
			$resource->productComments=array();
			include constant('VIEW_DIR').'page_order.php';
		}
	}
?>
