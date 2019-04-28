<?php
	class ResponseGetter extends Login{
		public function get($request){
			//TODO put login jwt here
			//$accessPermission=login()
			$request->user_name='admin';
      switch ($request->pageId) {
        case 'order':
					$responseBuilder=new OrderResponseBuilder();
					break;
        default:
          $responseBuilder=new OrderResponseBuilder();

      }
      echo $responseBuilder->build($request);
		}
	}
?>
