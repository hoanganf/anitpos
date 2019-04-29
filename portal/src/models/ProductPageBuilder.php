<?php
	//echo 'CashierPageBuilder: '.$_SERVER["PHP_SELF"];
	class ProductPageBuilder implements PageBuilder{
		public function buildHtml($resource){
			$productAdapter=new ProductDAO();
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$default_status=isset($_POST['default_status']) ? $_POST['default_status'] : 0;
		    $available=isset($_POST['available']) ? $_POST['available'] : 0;
				$if($_POST['action'] === 'add'){

				}else{

				}
				//do edit here
		    //$addStatus=addProduct(array('name'=>$_POST['name'],'category_id'=>$_POST['category_id'],'unit_id'=>$_POST['unit_id'],'price'=>$_POST['price'],'description'=>$_POST['description'],'image'=>'','default_status'=>$default_status,'available'=>$available,'add_count'=>$_POST['add_count']) );
		    if($addStatus>0){
		      //add SUCCESS to add Image
		      $imageToUpload=null;
		      $isCopy=false;
		      if(isset($_FILES["imageToUpload"]) && !empty($_FILES["imageToUpload"]["name"])){
		        $imageToUpload=$_FILES['imageToUpload'];
		      }else if(isset($_POST['image_to_upload']) && !empty($_POST['image_to_upload'])){
		        $isCopy=true;
		        $dir="../images/".$_POST['image_to_upload'];
		        $imageToUpload=array('name'=>$_POST['image_to_upload'],'tmp_name'=>$dir,'size'=>filesize($dir));

		      }
		      if(!empty($imageToUpload)){
		        $productImage="product_".$addStatus.".".strtolower(pathinfo($imageToUpload["name"],PATHINFO_EXTENSION));
		        $doResult=json_decode(AUtil::putFile($imageToUpload,"../images/".$productImage,$isCopy));
		        if($doResult->status!="ok"){
		          header("location:../index.php?pageId=product&error="+$doResult->message);
		          exit;
		        }else{
		          //upload ok then add image
		          editProductImage($addStatus,$productImage);
		        }
		      }

		    }else{
		      //can not add
		     header("location:../index.php?pageId=product&error=Khong the them mon");
		     exit;
		    }
		    //OK
		    header("location:../index.php?pageId=product");
		    exit;
			}
			$adapter=new CategoryDAO();
			$resource->categories=$adapter->getCategories();
			$resource->products=$productAdapter->getAllWithoutAvailable();
			$adapter=new UnitDAO();
			$resource->units=$adapter->getUnits();
			include constant('VIEW_DIR').'page_product.php';
		}
	}
?>
