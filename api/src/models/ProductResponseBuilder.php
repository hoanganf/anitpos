<?php
	//echo 'OrderPageBuilder: '.$_SERVER["PHP_SELF"];
	class ProductResponseBuilder extends ResponseBuilder{
		public function build($request){
			$adapter=new ProductDAO();
			if(isset($_GET['categoryId']) && is_numeric($_GET['categoryId'])){
				$products=$adapter->getAllWithoutAvailableByCategoryId($_GET['categoryId']);
				if(!empty($products)) return json_encode(array('status'=>true,'code'=>SUCCEED,'products'=>$products),true);
				else return $this->createResponse('false',E_NO_PRODUCT,'NO PRODUCT');
			}else if(isset($_GET['productId']) && is_numeric($_GET['productId'])){
				$product=$adapter->getProductWithoutAvailable($_GET['productId']);
				if($product!==null) return json_encode(array('status'=>true,'code'=>SUCCEED,'product'=>$product),true);
				else return $this->createResponse('false',E_NO_PRODUCT,'NO PRODUCT');
			}else{
				$products=$adapter->getAllWithoutAvailable();
				if(!empty($products)) return json_encode(array('status'=>true,'code'=>SUCCEED,'products'=>$products),true);
				else return $this->createResponse('false',E_NO_PRODUCT,'NO PRODUCT');
			}


		}
	}
?>
