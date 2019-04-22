<?php
foreach( $resource->tables as $table){ ?>
<option value="<?php echo $table['id'];?>"><?php echo $table['name'];?></option>
<?php } ?>
