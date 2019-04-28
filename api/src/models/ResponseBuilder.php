<?php
	abstract class ResponseBuilder {
		public static $RESPONSE_MESSAGE='{"status":%s,"code":%s,"message":"%s"}';
		abstract public function build($request);
		public static function createResponse($status,$code,$message){
			return sprintf(self::$RESPONSE_MESSAGE,$status,$code,$message);
		}
	}
?>
