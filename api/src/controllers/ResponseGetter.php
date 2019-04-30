<?php
	class ResponseGetter extends Login{
		public function get($request){
			//TODO put login jwt here
			//$accessPermission=login()
			$loginResult=null;
			if(isset($_COOKIE['pos_access_token'])){
				$request->access_token=$_COOKIE['pos_access_token'];
				$loginResult=json_decode($this->login($request));
				if(!$loginResult->status){
					echo ResponseBuilder::createResponse("false",E_NO_LOGIN,'AccessDenied.');
					return;
				}
			}else{
				echo ResponseBuilder::createResponse("false",E_NO_LOGIN,'AccessDenied.');
				return;
			}
			$request->user_name=$loginResult->user_name;
      switch ($request->pageId) {
        case 'order':
					$responseBuilder=new OrderResponseBuilder();
					break;
				case 'product':
					$responseBuilder=new ProductResponseBuilder();
					break;
        default:
          $responseBuilder=new OrderResponseBuilder();

      }
      echo $responseBuilder->build($request);
		}
	}
?>
