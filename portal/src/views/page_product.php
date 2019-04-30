<!DOCTYPE html>
<html>
<?php
  include 'header.php'; ?>
<body>
<?php include 'title.php'; ?>
	<div class="dragbar-container">
		<div class="dragbar-container__left">
  		<div class="scroll-menu">
        <!-- for all -->
        <a class="hover--gray active" data-id="-1" href="#" onclick="loadProducts(-1);return false;">Tat ca</a>
      <?php
			foreach( $resource->categories as $category){ ?>
				<a class="hover--gray" data-id="<?php echo $category['id']; ?>" href="#" onclick="loadProducts(<?php echo $category['id'] ?>);return false;"><?php echo $category['name']; ?></a>
    <?php }?>
      </div>
  		<table id="product_table">
        <tr>
          <th>Ma</th>
          <th>Anh</th>
          <th>Ten[<?php echo count($resource->products); ?>]</th>
          <th>Gia (VND)</th>
          <th>Tinh trang</th>
          <th>Che bien</th>
          <th>SL/Goi mon</th>
          <th>Tao ngay</th>
					<th>Sua ngay</th>
        </tr>
        <?php
	      foreach($resource->products as $product){ ?>
        <tr data-id="<?php echo $product['id']; ?>" data-name="<?php echo $product['name']; ?>" data-category-id="<?php echo $product['category_id']; ?>" data-unit-id="<?php echo $product['unit_id']; ?>"
          data-price="<?php echo $product['price']; ?>" data-description="<?php echo $product['description']; ?>" data-available="<?php echo $product['available']?>"
          data-image="<?php echo $product['image']; ?>" data-status="<?php echo $product['default_status']; ?>" data-add-count="<?php echo $product['add_count']; ?>">
          <td class="text-align--center font-size--normal"><?php echo $product['id'];?></td>
          <td class="text-align--center"><img width="64px" height="64px" src="../upload/<?php echo !empty($product['image']) ? $product['image'] : "files/pos/ic_no_image.png";  ?>"/></td>
          <td class="display--flex flex-wrap--nowrap width--full flex-direction--row">
            <div><strong class="color--blue"><?php echo $product['name'];?></strong><?php
            if(isset($product['description']) && strlen($product['description'])>0){ ?>
              <br/><font size="1em"><?php echo $product['description']; ?></font>
            <?php } ?>
            </div>
          </td>
          <td class="white-space--nowrap text-align--right"><span class="rounded background-color--yellow padding"><?php echo number_format($product['price']);?></span></td>
          <td class="text-align--center"><span class="circle background-color--<?php echo $product['available']==0 ? 'red':'green';?>"/></td>
          <td class="text-align--center"><span class="circle background-color--<?php echo $product['default_status']==0 ? 'red':'green';?>"></td>
          <td class="text-align--center"><?php echo $product['add_count'];?></td>
          <td>
						<div class="rounded background-color--blue padding"><?php echo $category['creator'];?><br/><?php echo $category['created_date']; ?></div>
	        </td>
					<td>
						<div class="rounded background-color--blue padding"><?php echo $category['updater'];?><br/><?php echo $category['last_updated_date']; ?></div>
	        </td>
        </tr>
		<?php } ?>
  		</table>
  	</div>
		<div class="dragbar-container__dragbar"></div>
  	<div class="dragbar-container__right">
      <?php
      if(!empty($resource->errorMessage)){ ?>
      <div class="alert background-color--red rounded">
         <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
         <strong>Loi!</strong> <?php echo $resource->errorMessage; ?>
      </div>
      <?php } else if(!empty($resource->message)){ ?>
      <div class="alert background-color--green rounded">
         <span class="alert__closebtn" onclick="onNotifiClose(this)">&times;</span>
         <?php echo $resource->message;?>
      </div>
      <?php }?>
  		<form id="product_form" class="row-divide padding background-color--lightgray border--gray rounded" action="index.php?pageId=product" method="POST" enctype="multipart/form-data">
  			<div class="row-divide__col-50">
  	    <!--label for="name">Ma san pham</label-->
  	    <input type="hidden" name="id" placeholder="Ma san pham" readonly>

  	    <label for="name" class="display--block margin">Ten san pham</label>
  	    <input type="text" name="name" class="rounded border--gray" placeholder="Ten san pham" required>

  			<label for="price" class="display--block margin">Gia</label>
  			<input type="text" name="price" class="rounded border--gray" placeholder="Gia" required>
  			<label for="add_count" class="display--block margin">So luong</label>
  			<input type="number" class="rounded border--gray" name="add_count" placeholder="So luong" required>

  			<label for="description" class="display--block margin">Mo ta</label>
  	    <textarea name="description" class="rounded border--gray width--full resize--vertical" placeholder="Mo ta ve san pham"></textarea>

        </div>
    		<div class="row-divide__col-50 padding--left-20">
          <div class="row-divide">
            <div class="row-divide__col-50">
              <label for="category" class="display--block margin">Danh muc</label>
        			<select name="category_id" required>
              <?php foreach( $resource->categories as $category){ ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
              <?php } ?>
        			</select>
            </div>
            <div class="row-divide__col-50">
              <label for="unit" class="display--block margin">Don vi</label>
        			<select name="unit_id" required>
              <?php foreach( $resource->units as $unit){ ?>
                <option value="<?php echo $unit['id']; ?>"><?php echo $unit['name']; ?></option>
              <?php } ?>
        			</select>
            </div>
          </div>
          <div class="row-divide">
            <div class="row-divide__col-50">
              <label class="display--block margin white-space--nowrap" for="available">Con/Het</label>
              <label class="toggle-switch">
                <input type="checkbox" name="available" value="1">
                <span class="toggle-switch__slider"></span>
              </label>
            </div>
            <div class="row-divide__col-50">
              <label class="display--block margin white-space--nowrap" for="default_status">Che bien/Khong</label>
              <label class="toggle-switch" >
                <input type="checkbox" name="default_status" value="1">
                <span class="toggle-switch__slider"></span>
              </label>
            </div>
          </div>
          <div class="display--block margin">
            <label for="imageToUpload" class="display--inline-block" id="label_image">Hinh anh</label><div class="loader color--blue display--inline-block"></div>
          </div>
    			<div class="padding display--inline-block">
    				<img class="width--full height--auto border--gray rounded" name="image_displayer" src="../upload/files/pos/ic_no_image.png"/>
    		    <input type="file" name="image_uploader" placeholder="Anh" onChange="uploadImageChange(this)" accept=".jpg, .jpeg, .png, .gif"/>
    				<input type="hidden" name="image" value=""/>
    			</div>

    		</div>
        <div class="row-divide width--full margin--top sticky--bottom">
          <button id="btn_edit" name="action" value="edit" class="row-divide__col-50 hover--blue rounded padding">Sua</button>
          <button id="btn_add" name="action" value="add" class="row-divide__col-50 hover--green rounded padding">Them</button>
        </div>
    	</form>
  	</div>
  </div>
</body>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="../libs/js/jquery.formChangeDetector.js"></script>
<script type="text/javascript" src="js/product_script.js"></script>
</html>
