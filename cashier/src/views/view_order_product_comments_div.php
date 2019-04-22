<?php foreach( $resource->productComments as $productComment){
 ?>
 <div class="hover--green"  onclick="onOrderProductCommentClick('<?php echo $productComment['name']."'".$mode; ?>);" ><?php echo $productComment['name']; ?></div>
<?php }
