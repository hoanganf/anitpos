<?php
	class ViewBuilder{
		public function buildViewHtml($action,$areaId,$categoryId,$numberId){
			$resource=new PageResource();
			$viewBuilder=new ViewBuilder();
			switch ($action) {
        case 'loadOrderGroups_tr':
          $adapter=new OrderDAO();
					$resource->orders=$adapter->getOrderListGroupByTableInArea($areaId);
          if(!empty($resource)){
            include constant('VIEW_DIR').'view_cashier_order_groupby_table_tr.php';
            break;
          }
				case 'loadTables_option':
					if(is_numeric($areaId)){
						$adapter=new TableDAO();
						$resource->tables=$adapter->getTablesByAreaId($areaId,true);
						include constant('VIEW_DIR').'view_order_tables_option.php';
					}
					break;
				case 'loadProducts_div':
					if(is_numeric($categoryId)){
						$adapter=new ProductDAO();
						$resource->products=$adapter->getProducts($categoryId,true);
						include constant('VIEW_DIR').'view_order_products_div.php';
					}
					break;
        default:
          $this->buildErrorHtml();
      }
		}
    public function buildErrorHtml(){
      include constant('VIEW_DIR').'noData.php';
    }
	}
?>
