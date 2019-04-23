<!DOCTYPE html>
<html>
<?php
  include 'header.php'; ?>
<body>
<?php include 'title.php'; ?>
	<div class="dragbar-container">
		<div class="dragbar-container__left">
			<div class="scroll-menu">
			<?php
				foreach( $resource->areas as $area){
			?>
		    <a class="hover--blue" data-id="<?php echo $area['id']; ?>" href="#" onclick="loadOrderGroupByTableInArea('<?php echo $area['id']; ?>');return false;"><?php echo $area['name']; ?></a>
			<?php
				}?>
			</div>
			<table id="ordered_list_table">
				<tr>
					<th>[Ma] Ban</th>
					<th class="white-space--nowrap">So mon</th>
					<th class="white-space--nowrap">Tong tien (VND)</th>
					<th class="text-align--center">Sua</th>
					<th class="text-align--center">Xoa</th>
				</tr>
				<tbody id="order_body" />
			</table>
		</div>
		<div class="dragbar-container__dragbar"></div>
		<div id="right_container" class="dragbar-container__right">
			<form action="index.php" method="get" class="dragbar-container__right__top">
			 <input id="numberIdInput" type="number" name="numberId" placeholder="Ma goi mon" required autofocus>
			 <input class="button--right-rounded hover--green" type="submit" value="OK">
			 <input type="hidden" name="pageId" value="checkOut"/>
		 	</form>
			<div class="soft-keyboard">
        <div onclick="onSoftKeyboardNumber(0)">1</div>
			  <div onclick="onSoftKeyboardNumber(1)">1</div>
			  <div onclick="onSoftKeyboardNumber(2)">2</div>
			  <div onclick="onSoftKeyboardNumber(3)">3</div>
			  <div onclick="onSoftKeyboardNumber(4)">4</div>
			  <div onclick="onSoftKeyboardNumber(5)">5</div>
			  <div onclick="onSoftKeyboardNumber(6)">6</div>
			  <div onclick="onSoftKeyboardNumber(7)">7</div>
			  <div onclick="onSoftKeyboardNumber(8)">8</div>
			  <div onclick="onSoftKeyboardNumber(9)">9</div>
			</div>
      <!-- TODO notifice for this-->
			<div class="dragbar-container__right__bottom">
				<div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        <div class="alert">
				   <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
				   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
        
		 	</div>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="js/cashier_script.js"></script>
</html>