<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login_style.css">
</head>
<body>
<h2>AnIT POS</h2>

<form method="post">
  <div class='container'>
    <label for='user_name'><b>Username</b></label>
    <input type='text' placeholder='Enter Username' name='user_name' required>

    <label for='password'><b>Password</b></label>
    <input type='password' placeholder='Enter Password' name='password' required>

    <label>
      <input type='checkbox' checked='checked' name='remember'> Remember me
    </label>
    <button type='submit'>Login</button>
    <div id='message'><?php if(isset($errorMessage)) echo $errorMessage;?></div>
  </div>
</form>
</body>
</html>
