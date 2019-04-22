<?php
  //echo 'PageGetter: '.$_SERVER["PHP_SELF"].'<br/>';
	class PageGetter{
    private $pageBuilder;
    private $pageResource;
		public function get($pageId){
      $pageResource=new PageResource();
      //TODO get restaurant name from database
      $pageResource->pageTitle='Restaurant';
      switch ($pageId) {
        case 'order':
          $pageBuilder=new OrderPageBuilder();
		      $pageResource->isOrder=TRUE;
					break;
        case 'cashier':
          $pageBuilder=new CashierPageBuilder();
					$pageResource->isCashier=TRUE;
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
	}
?>
