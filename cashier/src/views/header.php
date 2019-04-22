<head>
  <title><?php echo $resource->pageTitle;?></title>
  <link rel="shortcut icon" href="images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/common_style.css">
  <?php if($resource->isOrder){?>
  <link rel="stylesheet" type="text/css" href="css/order_style.css">
  <?php
  } ?>
</head>
