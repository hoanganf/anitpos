<!DOCTYPE html>
<html>
<?php
  include 'header.php'; ?>
<body>
<?php include 'title.php'; ?>
	<div class="dragbar-container">
		<div class="dragbar-container__left">
			<table id="ordered_list_table">
				<tr>
					<th>Ban</th>
		      <th>[<?php echo count($resource->orders); ?>] mon</th>
		      <th class="white-space--nowrap" colspan="3">Tong tien [<?php echo number_format(array_sum(array_column($resource->orders,'price')))." VND"; ?>]</th>
	    	</tr>
	    <?php
			 foreach( $resource->orders as $order){?>
	      <tr class="margin">
					<td><strong class="rounded background-color--gray padding"><?php echo $order['table_name']; ?></strong></td>
	        <td class="width--full text-align--left padding"><strong class="color--blue"><?php echo $order['product_name'] ?></strong><div><?php echo $order['comments']; ?></div></td>
	        <td class="white-space--nowrap text-align--right"><span class="rounded background-color--yellow padding"><?php echo number_format($order['price']);?></span></td>
	      </tr>
			<?php } ?>
			</table>
		</div>
		<div class="dragbar-container__dragbar"></div>
		<div class="dragbar-container__right">
			<div class="dragbar-container__right__top">
			 <input id="moneyInput" type="text" name="money" placeholder="So tien" required autofocus>
			 <input class="button--right-rounded hover--green" type="submit" value="Nhap">
		 	</div>
			<div class="dragbar-container__right__bottom">
				<div class="soft-keyboard">
				  <div class="hover--green" onclick="onSoftKeyboardNumber(9)">9</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(8)">8</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(7)">7</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(6)">6</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(5)">5</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(4)">4</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(3)">3</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(2)">2</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber(1)">1</div>
				  <div class="hover--green" onclick="onSoftKeyboardNumber('0')">0</div>
				  <div class="hover--blue" onclick="onSoftKeyboardNumber('00')">00</div>
				  <div class="hover--blue" onclick="onSoftKeyboardNumber('000')">000</div>
					<div class="hover--blue" onclick="onSoftKeyboardNumber('0000')">0,000</div>
					<div class="hover--blue" onclick="onSoftKeyboardNumber('00000')">00,000</div>
					<div class="hover--blue" onclick="onSoftKeyboardNumber('000000')">000,000</div>
					<div class="hover--gray" onclick="onSoftKeyboardNumber('<=')"><=</div>
					<div class="hover--gray" onclick="onSoftKeyboardNumber('C')">Xoa</div>
					<div class="hover--gray" onclick="alert('Chuc nang chua xay dung')">Credit</div>
					<div class="hover--gray" onclick="alert('Chuc nang chua xay dung')">IC Card</div>
					<div class="hover--gray" onclick="alert('Chuc nang chua xay dung')">Ma khuyen mai</div>
				</div>
		 	</div>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="js/checkOut_script.js"></script>
</html>
