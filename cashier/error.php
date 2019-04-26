<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/common_style.css">
  <style>

  .container {
    position: relative;
  }
  .center {
    position: absolute;
    left: 0;
    top: 50%;
    width: 100%;
  }
  p{
    padding: 10px;
    font-size: 18px;
    text-align: center;
    margin: 20px;
  }
  img {
    width: 100%;
    height: auto;
    z-index: -1;
  }
  </style>
</head>
<body>
  <div class="container">
    <img src="images/ic_logo_splash.png">
  </div>
  <div class="center">
    <p class="rounded background-color--yellow"><?php echo $err_message; ?></p>
  </div>
</body>
</html>
