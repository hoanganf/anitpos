<?php
foreach($resource->products as $product){?>
 <div class="hover--blue" onclick="onOrderProductClick(<?php echo $product['id'].",'".$product['name']."',".$product['add_count'].",".$product['price'].",".$product['default_status']; ?>);" ><?php echo $product['name']; ?></div>
<?php }
