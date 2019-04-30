<?php
	//echo 'CashierPageBuilder: '.$_SERVER["PHP_SELF"];
	class ProductPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			$productAdapter=new ProductDAO();
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if($_POST['action'] === 'add'){
					$addProduct=array('name'=>$_POST['name'],'category_id'=>$_POST['category_id'],'unit_id'=>$_POST['unit_id'],'description'=>$_POST['description'],'image'=>$_POST['image']) ;
					$insertedID=$productAdapter->create($addProduct,$resource->requester);
					//TODO change the version of table
					if($insertedID>0) $resource->message='Them mon thanh cong voi ma la: '.$insertedID;
					else $resource->errorMessage='Them mon that bai';
				}else{
					//do edit here
					$updateStatus=false;
					if(isset($_POST['id']) && is_numeric($_POST['id'])){
						$editProduct=array('id'=>$_POST['id'],'name'=>$_POST['name'],'category_id'=>$_POST['category_id'],'unit_id'=>$_POST['unit_id'],'description'=>$_POST['description'],'image'=>$_POST['image']) ;
						$updateStatus=$productAdapter->edit($editProduct,$resource->requester);
						//TODO change the version of table
					}
					if($updateStatus) $resource->message='Sua mon thanh cong voi ma la: '.$_POST['id'];
					else $resource->errorMessage='Sua mon that bai';
				}
			}
			$adapter=new CategoryDAO();
			$resource->categories=$adapter->getCategories();
			$resource->products=$productAdapter->getAllWithoutAvailable();
			$adapter=new UnitDAO();
			$resource->units=$adapter->getUnits('P');
			include constant('VIEW_DIR').'page_product.php';
		}
	}
?>
