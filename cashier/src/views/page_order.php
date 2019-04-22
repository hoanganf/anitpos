<!DOCTYPE html>
<html>
<?php
  include 'header.php'; ?>
<body>
<?php include 'title.php'; ?>
<div class="dragbar-container">
	<div class="dragbar-container__left">
		<div class="white-space--nowrap">
			<label class="color--gray">Khu vuc: </label>
			<select id="select_area">
        <?php
        foreach( $resource->areas as $area){?>
    			<option value="<?php echo $area['id'];?>" <?php if(is_numeric($resource->areId) && $resource->areId === $area['id']) echo "selected"; ?>><?php echo $area['name'];?></option>
    		<?php } ?>
			</select>
			<label class="color--gray">Ban: </label>
			<select id="select_table">
        <?php include 'view_order_tables_option.php';?>
			</select>
			<a class="rounded hover--green padding float--right margin--left" onclick="submitOrder(true,'new');return false;">Thanh toan</a>
			<a class="rounded hover--blue padding float--right" onclick="submitOrder(false,'new');return false;">Goi mon</a>
		</div>
		<table id="ordered_list_table">
			<tr>
				<th>[0] mon</th>
				<th class="white-space--nowrap" colspan="4">Tong tien[0]</th>
			</tr>
		</table>
	</div>
	<div class="dragbar-container__dragbar"></div>
	<div class="dragbar-container__right">
		<div id="category_menu" class="scroll-menu padding--bottom--15">
    <?php foreach( $resource->categories as $category){ ?>
        <a class="hover--gray <?php if($resource->cateId === $category['id']) echo 'active'; ?>" data-id="<?php echo $category['id']; ?>" href="#" onclick="loadOrderProducts(this);return false;"><?php echo $category['name']; ?></a>
    <?php  } ?>
    </div>
		<div class="dragbar-container__right__bottom">
			<div id="order_center_list" class="grid-container">
        <?php include 'view_order_products_div.php'; ?>
      </div>
			<div id="order_bottom_list" class="grid-container">
        <?php include 'view_order_product_comments_div.php'; ?>
      </div>
		</div>
	</div>
</div>
</body>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="js/order_script.js"></script>
</html>
