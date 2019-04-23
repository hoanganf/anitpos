<?php
	class ViewGetter{
    private $viewBuilder;
    private $pageResource;
		public function get(){
			$resource=new PageResource();
      if(isset($_GET['areaId'])){
      	$resource->areaId=$_GET['areaId'];
      }
      if(isset($_GET['numberId'])){
      	$resource->numberId=$_GET['numberId'];
      }
			if(isset($_GET['categoryId'])){
      	$resource->categoryId=$_GET['categoryId'];
      }
			if(isset($_GET['productId'])){
				$resource->productId=$_GET['productId'];
			}
			if(isset($_GET['action'])){
      	$action=$_GET['action'];
				$viewBuilder=new ViewBuilder();
				$viewBuilder->buildViewHtml($action,$resource);
      }

		}
	}
?>
