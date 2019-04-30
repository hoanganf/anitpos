var imageHost='../upload/';
function reloadFormChangeDetector(){
  $form=$('#product_form');
  $btnEdit=$('#btn_edit');
  $btnAdd=$('#btn_add');
  $btnEdit.prop("disabled", true);
  $btnAdd.prop("disabled", true);
  $form.removeFormChangeDetector();
  $form.addFormChangeDetector().on('onChange',function(){
    $btnEdit.prop("disabled", false);
    $btnAdd.prop("disabled", false);
  }).on('onNoChange',function(){
    $btnEdit.prop("disabled", true);
    $btnAdd.prop("disabled", true);
  });
}

function loadProducts(cateID) {
  var link="../api/product.php";
  if(parseInt(cateID)>0){
    link+="?categoryId="+cateID;
  }
  $.getJSON(link, function(response){
    if(response.status === true){
      var $tableBody= $('#product_table tbody');
      $tableBody.empty();
      //title
      $tableBody.append('<tr><th>Ma</th><th>Anh</th><th>['+response.products.length+']Ten</th><th>Tao ngay</th><th>Sua ngay</th></tr>');
      $.each(response.products, function(i, product){
        console.log(product);

        var $row = $('<tr/>');
        $row.data('id',product.id).data('name',product.name).data('category-id',product.category_id).data('unit-id',product.unit_id)
            .data('price',product.price).data('description',product.description).data('available',product.available).data('image',product.image)
            .data('status',product.default_status).data('add-count',product.add_count);
        $row.append('<td class="text-align--center font-size--normal">'+product.id+'</td>')
            .append('<td class="text-align--center"><img width="64px" height="64px" src="'+imageHost+((product.image.length>0) ? product.image : 'files/pos/ic_no_image.png')+'"></td>')
            .append('<td class="display--flex flex-wrap--nowrap width--full flex-direction--row;"><div><strong class="color--blue">'+product.name+'</strong>'+
              ((product.description.length>0) ? ('<br/><font size="1em">'+product.description+'</font>') : '')+'</div></td>')
            .append('<td><div class="rounded background-color--blue padding">'+product.creator+'<br/>'+product.created_date+'</div></td>')
            .append('<td><div class="rounded background-color--blue padding">'+product.updater+'<br/>'+product.last_updated_date+'</div></td>');
        $tableBody.append($row);
      });
      //if ok set pressed on menu
      $(".scroll-menu > *").each(function(){
        $this=$(this);
        if($this.data('id') == cateID) $this.addClass('active');
        else $this.removeClass('active');
      });
    }else{
      if(response.code == 306) location.href='../login?from=../portal?pageId=product';
      else showAlertDialog('That bai',response.message,false,false);
    }
    /*
    var scrollMenu = $(".scroll-menu");
    var rowCount=menu.childNodes.length;
    var i;
    //clear
    for(i=0;i<rowCount;i++){
      if(menu.childNodes[i].getAttribute("data-id")==cateID){
        menu.childNodes[i].className='active';
      }else{
        menu.childNodes[i].className='';
      }

    }*/
  });

}
// create event
//product click
$('#product_table tbody').on('click','tr:has(td)',function(){
  var $this=$(this);
  $('input[name=id]').val($this.data('id'));
  $('input[name=name]').val($this.data('name'));
  $('textarea[name=description]').val($this.data('description'));
  $('select[name=category_id]').val($this.data('category-id'));
  $('select[name=unit_id]').val($this.data('unit-id'));
  var image=$this.data('image');
  if(image!=null && image.length>0){
    $('img[name=image_displayer]').attr('src',imageHost+image);
    $('input[name=image]').val(image);
    $('input[name=image_uploader]').val('');
  }
  reloadFormChangeDetector();
  /*$.getJSON("../api/product.php?productId="+$(this).data('id'), function(response){
    console.log(response);
    if(response.status === true){

    }else{
      if(response.code == 306) location.href='../login?from=../portal';
      else showAlertDialog('That bai',response.message,false,false);
    }
    $.each(result, function(i, field){
      $("div").append(field + " ");
    });
  });*/
});
$('img[name=image_displayer]').on('click',function() {
  $('input[name=image_uploader]').trigger('click');
});
reloadFormChangeDetector();
