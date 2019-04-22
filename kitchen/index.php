<?php
	session_start();
	if(!isset($_SESSION['user'])){
		 header("location:php/login.php");
		 exit;
	}else{

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kitchen</title>
		<link rel="shortcut icon" href="images/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/kitchen_style.css">
		<script type="text/javascript" src="../jweb.lib/jWebSocket.js"></script>
		<script type="text/javascript" src="js/js_code.js"></script>
		<script type="text/javascript" src="js/jwsPlugin.js"></script>
		<script type="text/javascript">

		function ajaxLoadPage(ajax_link){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("main_content").innerHTML = this.responseText;
				}
			};
		  xhttp.open("GET", ajax_link, true);
		  xhttp.send();
		}
		var sort_by_time=2;
		var sort_by_product=1;
		var sort_type;
		function toggleSort() {
			var ajax_link = "";
			if(sort_type == sort_by_product){
				ajax_link = "php/content_time_sort.php";
				sort_type = sort_by_time;
				document.getElementById("sort").innerHTML="Sort by Product";
			}else{
				ajax_link = "php/content_product_sort.php";
				sort_type = sort_by_product;
				document.getElementById("sort").innerHTML="Sort by Time";
			}
			ajaxLoadPage(ajax_link);

		}
		document.addEventListener('DOMContentLoaded', function(){

			wsUsername = "<?php echo $_SESSION['user']['username']?>";
			wsPassword= "<?php echo $_SESSION['user']['password']?>";
			console.log(wsUsername+"|"+wsPassword);
			var link = "";
			if(sort_type==sort_by_product){
					link = "php/content_product_sort.php";
					document.getElementById("sort").innerHTML="Sort by Time";
			}else{
				link = "php/content_time_sort.php";
				sort_type = sort_by_time;
				document.getElementById("sort").innerHTML="Sort by Product";
			}
			ajaxLoadPage(link);
		});
		function onFinishProduct(user_id,product_id, message){
			websocketClient.onFinishProduct(user_id,product_id, message);
			ajaxLoadPage("php/content_product_sort.php?product_id="+product_id);
		}
		function onFinishOrder(user_id,order_id, message){
			websocketClient.onFinishOrder(user_id,order_id,message);
			ajaxLoadPage("php/content_time_sort.php?order_id="+order_id);
		}
		</script>
	</head>
	<body onload="initPage();" onUnload="exitPage();">
		<div class="title_bar">
				<a id="status" href="php/logout.php" ></a>
			Copyright © AnIT
			<div id="sort" onClick="toggleSort()"/>
		</div>
		<span id="main_content"></span>
	</body>

</html>
<?php } ?>
