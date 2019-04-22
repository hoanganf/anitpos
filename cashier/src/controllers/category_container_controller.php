<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/anit_pos/php_lib/common_dao.php');
  $action='loadCategories';
  if(isset($_GET['action'])){
		$action=$_GET['action'];
	}
  if(isset($_POST['action'])){
		$action=$_POST['action'];
	}
	if($action=='loadCategories'){
    $categories=getCategories(true);
    ?>
    <tr>
      <th>Ma</th>
      <th>Ten[<?php echo count($categories); ?>]</th>
      <th>An/hien</th>
    </tr>
    <?php
		 foreach( $categories as $category){
       ?>
      <tr onclick="onCategoryClick(<?php echo $category['id']; ?>,'<?php echo $category['name']; ?>',<?php echo $category['available']; ?>,'<?php echo $category['image']; ?>')">
        <td style="text-align:center"><?php echo $category['id'];?></td>
        <td style="display: flex;flex-wrap: nowrap;width: 100%;flex-direction: row;"><img  style="margin-right:5px;min-width:64px;" width="64px" height="64px" src="./images/<?php echo !empty($category['image']) ? $category['image'] : "ic_no_image.png";  ?>">
          <strong style="color: #2196F3;white-space:nowrap;"><?php echo $category['name'];?></strong>
        </td>
        <td style="text-align:center"><img width="18px" height="18px" src="./images/<?php echo $category['available']==0 ? "ic_not_check.png":"ic_check.png";?>"></td>
      </tr>
		<?php }

  }else if($action=='addCategory'){
    $available=isset($_POST['available']) ? $_POST['available'] : 0;
    $addStatus=addCategory(array('name'=>$_POST['name'],'image'=>'','available'=>$available) );
    if($addStatus>0){
      //add SUCCESS to add Image
      $imageToUpload=null;
      $isCopy=false;
      if(isset($_FILES["imageToUpload"]) && !empty($_FILES["imageToUpload"]["name"])){
        $imageToUpload=$_FILES['imageToUpload'];
      }else if(isset($_POST['image_to_upload']) && !empty($_POST['image_to_upload'])){
        $isCopy=true;
        $dir="../images/".$_POST['image_to_upload'];
        $imageToUpload=array('name'=>$_POST['image_to_upload'],'tmp_name'=>$dir,'size'=>filesize($dir));

      }
      if(!empty($imageToUpload)){
        $categoryImage="category_".$addStatus.".".strtolower(pathinfo($imageToUpload["name"],PATHINFO_EXTENSION));
        $doResult=json_decode(AUtil::putFile($imageToUpload,"../images/".$categoryImage,$isCopy));
        if($doResult->status!="ok"){
          header("location:../../index.php?pageId=category&error="+$doResult->message);
          exit;
        }else{
          //upload ok then add image
          editCategoryImage($addStatus,$categoryImage);
        }
      }

    }else{
      //can not add
     header("location:../../index.php?pageId=category&error=Khong the them mon");
     exit;
    }
    //OK
    header("location:../../index.php?pageId=category");
    exit;
  }else if($action=='editCategory'){
    $available=isset($_POST['available']) ? $_POST['available'] : 0;
    $oldImage=isset($_POST['image_to_upload']) ? $_POST['image_to_upload'] : '';

    $imageToUpload=null;
    $categoryImage='';
    echo $oldImage;
    if(isset($_FILES["imageToUpload"]) && !empty($_FILES["imageToUpload"]["name"])){
      $imageToUpload=$_FILES['imageToUpload'];
      $categoryImage="category_".$_POST['id'].".".strtolower(pathinfo($imageToUpload["name"],PATHINFO_EXTENSION));
      $doResult=json_decode(AUtil::putFile($imageToUpload,"../images/".$categoryImage,false));
      if($doResult->status!="ok"){
        header("location:../../index.php?pageId=category&error=".$doResult->message);
        exit;
      }
    }else{
      $categoryImage=$oldImage;
    }

    $updateStatus=editCategory(array('id'=>$_POST['id'],'name'=>$_POST['name'],'image'=>$categoryImage,'available'=>$available) );
    if($updateStatus<1){
      //edit fail
       header("location:../../index.php?pageId=category&error=Khong the sua mon".$updateStatus);
       exit;
    }
    //OK
     header("location:../../index.php?pageId=category");
     exit;
  }
?>
