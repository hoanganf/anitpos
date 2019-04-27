<?php
	abstract class ResponseBuilder {
		public static $RESPONSE_MESSAGE='{"status":%s,"message":"%s"}';
		abstract public function build($request);
		protected function createResponse($status,$message){
			return sprintf(self::$RESPONSE_MESSAGE,$status,$message);
		}
	}
?>
