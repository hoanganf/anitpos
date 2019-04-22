<?php
	class ViewGetter{
    private $viewBuilder;
    private $pageResource;
		public function get(){
      $areaId=-1;
      $numberId=-1;
			$categoryId=-1;
			$action=null;
      if(isset($_GET['action'])){
      	$action=$_GET['action'];
      }
      if(isset($_GET['areaId'])){
      	$areaId=$_GET['areaId'];
      }
      if(isset($_GET['numberId'])){
      	$numberId=$_GET['numberId'];
      }
			if(isset($_GET['categoryId'])){
      	$categoryId=$_GET['categoryId'];
      }
			$viewBuilder=new ViewBuilder();
			$viewBuilder->buildViewHtml($action,$areaId,$categoryId,$numberId);
		}
	}
?>
