<?php
	//echo 'OrderPageBuilder: '.$_SERVER["PHP_SELF"];

	include_once 'ResponseBuilder.php';
	class OrderResponseBuilder extends ResponseBuilder{
		public function build($request){
			if(!isset($request->body->data)){
				if(!isset($request->body->number_id)){
					return $this->createResponse('false',E_NO_ORDER,'NO ORDER');
				}
		  }
			$numberId=isset($request->body->number_id) ? $request->body->number_id : -1;
			$isNewOrder= ($numberId <= 0) ? true : false;
			//begin to add order
			$orderDAO=new OrderDAO();
			$numberDAO=new NumberDAO();
			$productDAO=new ProductDAO();
			//set connect to disable autoclose on DAO
			$orderDAO->connect();
			/* set autocommit to off */
			$orderDAO->queryNotAutoClose("BEGIN");
			$orderDAO->queryNotAutoClose("START TRANSACTION");
			//if new order have to get numberId
			if($isNewOrder){
			  $numberId=$numberDAO->createNumberId();
			  if($numberId<1){
			    return createResponse(false,E_NO_NUMBER_ID,'Can not get NumberId');
			  }
				//NEW ORDER PROCESSING
				$isTransactionPassed=true;
				foreach($request->body->data as $order){
					$product=$productDAO->getProduct($order->product_id,true);
					$order->status=$product['default_status'];
					$order->price=$product['price'];
		      if(!$orderDAO->createOrder($order,$request->user_name,$numberId)){
							$isTransactionPassed=false;
							break;
					}
		    }
				if (!$isTransactionPassed || !$orderDAO->queryNotAutoClose("COMMIT")) {
					//return status for numberId
					$numberAdapter->removeNumberId($numberId);
					return $this->rollBack($orderDAO,'create order failed.');
		  	}
			}else{
				$isTransactionPassed=true;
				$newOrderInEditOrder=0;
				$editedOrder=0;
				$deleteResult=$orderDAO->removeOrderNotIn($request->body->data,$numberId,$request->user_name);
				if($deleteResult === -1){
					return $this->rollBack($orderDAO,'delete old order failed.');
				}
				foreach( $request->body->data as $order){
					if(!isset($order->id)){//new
						$product=$productDAO->getProduct($order->product_id,true);
						$order->status=$product['default_status'];
						$order->price=$product['price'];
						if(!$orderDAO->createOrder($order,$request->user_name,$numberId)){
							 $isTransactionPassed=false;
							 break;
						 }
						 $newOrderInEditOrder++;
		      }else{
						if(!$orderDAO->updateOrder($order,$request->user_name)){
							 $isTransactionPassed=false;
							 break;
						 }
						 $editedOrder++;
					}
		    }
				if (!$isTransactionPassed || !$orderDAO->queryNotAutoClose("COMMIT")) {
					return $this->rollBack($orderDAO,'create order failed.');
		  	}
				if(($editedOrder + $newOrderInEditOrder) === 0){
	      	$numberDAO->removeNumberId($numberId);
					$numberId=0;
	    	}
			}
			/* close connection */
			$orderDAO->close();
			return $this->createResponse("true",SUCCEED,$numberId);
		}
		public function rollBack($orderAdapter,$message){
			// Rollback transaction\n
			$orderAdapter->queryNotAutoClose("ROLLBACK");
			/* close connection */
			$orderAdapter->close();
			return createResponse("false",E_MYSQL_QUERY_FAIL,$message);
		}
	}
?>
