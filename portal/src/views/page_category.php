<?php if(isset($_GET['error'])) echo '<script>alert(\''.$_GET['error'].'\');</script>'; ?>
<div class="main_content">
	<div id="left_container" class="left_container">
		<table id="category_table">
			<?php include 'php/controllers/category_container_controller.php' ?>
		</table>
	</div>
	<div id="dragbar"></div>
	<div class="right_container">
		<form  action="php/controllers/category_container_controller.php" method="POST" enctype="multipart/form-data">
			<div class="full-col">
		    <!--label for="name">Ma san pham</label-->
		    <input type="hidden" id="id" name="id" placeholder="Ma san pham" readonly>

		    <label for="name">Ten san pham</label>
		    <input type="text" id="name" name="name" placeholder="Ten san pham" required>

				<label for="imageToUpload">Hinh anh</label>
				<div class="choose-image info-container">
					<img class="image-avatar" id="image_display" src="./images/ic_no_image.png">
			    <input type="file" id="imageToUpload" name="imageToUpload" placeholder="Anh" onchange="loadFileToImage(event)" accept=".jpg, .jpeg, .png, .gif"/>
					<input type="hidden" id="image_to_upload" name="image_to_upload" value=""/>
				</div>
				<label>Trang thai</label>
				<div class="info-container">
					<label style="display:inline-block" for="available">Hien:
						<label class="switch">
							<input type="checkbox" id="available" name="available" value="1">
							<span class="slider round"></span>
						</label>
					</label>
				</div>

		</div>
		<input type="submit" value="Them" width="100%" id="btn-add" class="green btn" onclick="document.getElementById('mode').value='addCategory';">
		<input type="submit" value="Sua" width="100%" id="btn-edit" class="blue btn" onclick="document.getElementById('mode').value='editCategory';">
		<input type="hidden" name="action" value="addCategory" width="100%" id="mode">
  	</form>
	</div>
</div>
