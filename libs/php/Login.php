<?php
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
class Login{
  private $key='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
BoJGw6Yq3e3+ZasROykv8jLrk=';
  function logIn($data=array()){
    // if jwt is not empty
    if(isset($data->access_token)){
       // if decode succeed, show user details
      try {
        // decode jwt
        //$user=array();
        $decoded = JWT::decode($data->access_token, $this->key, array('HS256'));
        // set user property values here
        //$user->user_name=$decoded->user_name;
        //$user->password=$decoded->password;
        return json_encode(array(
           "status" => true,
           "message" => "Successful login.",
           "user_name" =>$decoded->user_name,
           "access_token" => $data->access_token
        ));
      }catch (Exception $exception){
        if ($exception instanceof ExpiredException) {
          return $this->createLoginToken($data);
        } else {
          return json_encode(array(
             "status" => false,
             "message" => $exception->getMessage()
          ));
        }
      }
    }//if not have jwt then login and create
    return $this->createLoginToken($data);
  }
  private function createLoginToken($data){
    if(!empty($data->user_name) && !empty($data->password)){
      $adapter=new UserDAO();
      $user=$adapter->login($data->user_name,$data->password);
      if(isset($user)){
        $token = array(
           'exp'=>time()+60*60*24,
           'user_name' => $user['user_name'],
           'password' => $user['password'],
           'role' => $user['role']
         );
         $access_token = JWT::encode($token, $this->key);
         return json_encode(
                array(
                    "status"=>true,
                    "message" => "Successful login.",
                    "user_name" => $data->user_name,
                    "access_token" => $access_token
                   )
                );
      }
    }
    return json_encode(array(
        "status" => false,
        "message" => "UserName or password is not invalid."
      ));
  }
}
?>
