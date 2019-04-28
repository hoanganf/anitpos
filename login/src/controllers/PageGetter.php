<?php
	class PageGetter extends Login{
		public function buildHtml(){
			//var_dump($_COOKIE);
			$request=new Data();
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if(isset($_POST['user_name'])) {
					$request->user_name=$_POST['user_name'];
				}
				if(isset($_POST['password'])) {
					$request->password=$_POST['password'];
				}
				setcookie('pos_access_token', '', time() - 3600, '/');
			}else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
				if(isset($_COOKIE['pos_access_token'])){
					$request->access_token=$_COOKIE['pos_access_token'];
				}else{
					include constant("VIEW_DIR").'login.php';
					return;
				}
			}
			$loginResult=json_decode($this->login($request));
			if($loginResult->status){
				if(isset($_POST['remember'])) {
					setcookie('pos_access_token', $loginResult->access_token, time()+60*60*24, '/');
				}
				header('Location: '.$this->getRedirectLocation());
			}else{
				$errorMessage=$loginResult->message;
				include constant("VIEW_DIR").'login.php';
			}
		}
		private function getRedirectLocation(){
			if(isset($_GET['from'])){
				return $_GET['from'];
			} else {
				return '../cashier';
			}
		}
	}
?>
