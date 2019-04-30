<?php
  //echo 'PageGetter: '.$_SERVER["PHP_SELF"].'<br/>';
	class PageGetter extends Login{
		public function get($pageId){
			$loginResult=null;
			if(isset($_COOKIE['pos_access_token'])){
				$request=new PageResource();
				$request->access_token=$_COOKIE['pos_access_token'];
				$loginResult=json_decode($this->login($request));
				if(!$loginResult->status){
					$this->redirect('../login/?from='.$_SERVER['REQUEST_URI']);
					return;
				}
			}else{
				$this->redirect('../login/?from='.$_SERVER['REQUEST_URI']);
				return;
			}
      $pageResource=new PageResource();
			$pageResource->requester=$loginResult->user_name;
      //TODO get restaurant name from database
      $pageResource->pageTitle='Restaurant';
      switch ($pageId) {
        case 'order':
					$pageBuilder=new OrderPageBuilder();
					$pageResource->isOrder=TRUE;
					break;
				case 'editOrder':
					$pageBuilder=new OrderPageBuilder();
					if(isset($_GET['numberId'])){
		      	$pageResource->numberId=$_GET['numberId'];
			      $pageResource->isOrder=TRUE;
						break;
		      }else{
						trigger_error("Xay ra su co xin vui long lien he quan ly",E_NO_NUMBER_ID);
					}
        case 'cashier':
          $pageBuilder=new CashierPageBuilder();
					$pageResource->isCashier=TRUE;
					break;
				case 'checkOut':
					$pageBuilder=new CheckOutPageBuilder();
					if(isset($_GET['numberId']) && is_numeric($_GET['numberId'])){
						$pageResource->numberId=$_GET['numberId'];
						$pageResource->isCashier=TRUE;
						break;
					}else{
						trigger_error("Xay ra su co xin vui long lien he quan ly",E_NO_NUMBER_ID);
					}
					break;
				case 'product':
					$pageBuilder=new ProductPageBuilder();
					$pageResource->isProduct=TRUE;
					break;
				case 'category':
					$pageBuilder=new CategoryPageBuilder();
					$pageResource->isCategory=TRUE;
					break;
				case 'unit':
					$pageBuilder=new UnitPageBuilder();
					$pageResource->isUnit=TRUE;
					break;
        default:
          $pageBuilder=new CashierPageBuilder();
					//TODO have to set value to another page
					$pageResource->isCashier=TRUE;
      }
      $pageBuilder->buildHtml($pageResource);
		}
    public static function includeDir($dir) {
    	$files=array();
    	$items = glob($dir . '/*');
      for ($i = 0; $i < count($items); $i++) {
          if (is_dir($items[$i])) {
    				$add = glob($items[$i] . '/*');
    				$items = array_merge($items, $add);
          }else if(pathinfo($items[$i])['extension'] === 'php'){
            echo 'include: '.$items[$i].'<br/>';
    				include_once $items[$i];
            echo 'include: '.$items[$i].' finish<br/>';
    			}
      }
    	return $files;
    }
		public function redirect($url){
			header('Location: '.$url);
		}
	}
?>
