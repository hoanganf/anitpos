<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
button:hover {
    opacity: 0.8;
}
.container {
    padding: 16px;
}
#message{
  color:red;
  text-align: center;
}
</style>
</head>
<body>
<?php
  include("../../php_lib/common_dao.php");
	session_start();
//food id of list item
  $user_name = (isset($_GET['username'])) ? $_GET['username'] : -1;
  $password=(isset($_GET['password'])) ? $_GET['password'] : -1;
  $message="";
  if(isset($user_name)&&isset($password)){
  $result=loginKitchen($user_name,$password);
    if($result['login_status']==true){
      $_SESSION['user']=array('username'=>$result['user_name'],'name'=>$result['name'],'password'=>$result['password']);
       header('location:../index.php');
       exit;
    }else{
      $message=$result['message'];
    }
  }
   ?>
<h2>AnIT POS</h2>

<form action='login.php'>

  <div class='container'>
    <label for='username'><b>Username</b></label>
    <input type='text' placeholder='Enter Username' name='username' required>

    <label for='password'><b>Password</b></label>
    <input type='password' placeholder='Enter Password' name='password' required>

    <label>
      <input type='checkbox' checked='checked' name='remember'> Remember me
    </label>
    <button type='submit'>Login</button>
    <div id='message'><?php echo $message?></div>
  </div>
</form>
</body>
</html>
