function getOrder(isCheckOutAfterSubmit=false){
  var $rows=$tableBody.children();
  var rowCount=$rows.length;
  var $numberId=$('#number_id');

  if(rowCount<2 && $numberId.length<1){
    showAlertDialog("Goi mon","Xin vui long chon mon",false,true);
    return;
  }
  var orders = {};
  if($numberId.length>0){
    orders.number_id=$numberId.val();
  }
  orders.data=[];
  $tableBody.find('tr:has(td)').each(function(){
    var $row=$(this);
    var commentTmp='';
    if($row.children().eq(1).children().length>1){
      commentTmp=$row.children().eq(1).children().eq(1).text();
    }
    var order={
      table_id:$row.data('table-id'),
      product_id:$row.data('pid'),
      count:$row.data('count'),
      comments:commentTmp
    }
    if($row.data('order-id') !== undefined){
      order.id=$row.data('order-id');
    }
    orders.data.push(order);
  });

  var dbParam, xmlhttp;
  dbParam = JSON.stringify(orders);
  console.log(dbParam);
  $.ajax({
       url: "../api/order.php",
       type : "POST",
       contentType : 'application/json',
       data : dbParam,
       success : function(response) {
         if(response.status === true){
           console.log(response);
           /*var numberId=parseInt(response.message);
           if(numberId > 0 ){
             if(isCheckOutAfterSubmit){
               location.href='index.php?pageId=checkOut&numberId='+response.message;
             }else{
               location.href='index.php?pageId=order';
             }
           }else if(numberId === 0){//no number ID (edit mode)
             location.href='index.php?pageId=cashier';
           }*/
         }else{
           if(response.code == 306) location.href='../login/';
           else showAlertDialog('That bai',response.message,false,false);
         }
       },
       error: function(xhr, resp, text){
           console.log(xhr);
           console.log(resp);
           console.log(text);
       }
   });
  /*ajaxLoadPage("php/order_container_controller.php?action="+action+"&value=" + dbParam,function(xHttp){
    console.log(xHttp.responseText);
    var response=JSON.parse(xHttp.responseText);
    if(response.status=="ok"){
      if(isCheckout){
        location.href="index.php?pageId=checkOut&numberId="+response.message;
      }else{
        removeAllOrder();
      }
    }
  });*/
}
function submitAndCheckOutOrder(){
  getOrder(true);
}
function submitOrder(){
  getOrder(false);
}
function removeAllOrder(){
  $tableBody.find('tr:has(td)').each(function(){
    $(this).remove();
  });
  $tableBody.data('currentPressedIndex',undefined);
  sumPriceAndDisplay();
}
function onOrderProductClick(id,name,count,price,comment){
  var $trs=$tableBody.children();
  var insertIndex=$trs.length-1;
  var $selectedTable=$('#select_table');
  //find same product
  for(var i=insertIndex;i>0;i--){
    var pId=$trs.eq(i).data('pid');
    //console.log("find "+i+" of "+insertIndex);
    if(pId==id){
      console.log("BANG NHAU");
      insertIndex=i;
      break;
    }
  }
  var $row = $('<tr/>');
  var htmlComment=(comment!=null && comment!='') ? "<div>"+comment+"</div>" : '';
  $row.data('table-id',$selectedTable.val()).data('pid',id).data('name',name).data('count',count).data('price',price);
  $row.append('<td><strong class="rounded background-color--gray padding">'+$selectedTable.find("option:selected").text()+'</strong></td>')
      .append('<td class="width--full"><strong class="color--blue">'+name+'</strong>'+htmlComment+'</td>')
      .append('<td class="text-align--right white-space--nowrap"><span class="rounded background-color--yellow padding">'+formatCurrency(price)+'</span></td>')
      .append('<td class="text-align--center"><img onclick="onAddRow(this)" width="24px" height="24px" src="./images/ic_add.png" alt="Them"></td>')
      .append('<td class="text-align--center"><img onclick="onDeleteRow(this)" width="24px" height="24px" src="./images/ic_close.png" alt="Xoa"></td>');
  console.log('insert= '+insertIndex);
  //add row to table
  $row.insertAfter($trs.eq(insertIndex));
  //set focus
  $row.trigger('click');
  //price
  sumPriceAndDisplay();
}
function onAddRow(target){
  $row=$(target).parent().parent();
  console.log($row.html());
  var $td1=$row.children().eq(1);
  var comment=$td1.children().length > 1 ? $td1.children().eq(1).text() : '';
  onOrderProductClick($row.data('pid'),
                      $row.data('name'),
                      $row.data('count'),
                      $row.data('price'),
                      comment);
  sumPriceAndDisplay();
  event.stopPropagation();
}
function onDeleteRow(target){
  $row=$(target).parent().parent();
  var rowIndex=$row.index();
  $row.remove();
  $trs=$tableBody.children();
  var currentPressedIndex=parseInt($tableBody.data('currentPressedIndex'));
  if(currentPressedIndex !== 'NaN'){
    if(currentPressedIndex >= $trs.length-1){
      $trs.eq($trs.length-1).trigger('click');
    }else if(rowIndex < currentPressedIndex){
      if(currentPressedIndex==1){
        $trs.eq(1).trigger('click');
      }else{
        $trs.eq(currentPressedIndex-1).trigger('click');
      }
    }else if(rowIndex == currentPressedIndex){
      $trs.eq(currentPressedIndex).trigger('click');
    }
  }
  sumPriceAndDisplay();
  event.stopPropagation();
}
function sumPriceAndDisplay(){
  var priceSum=0;
  var orderedProductCount=0;
  $tableBody.find('tr:has(td)').each(function(){
    priceSum+=Number($(this).data('price'));
    orderedProductCount++;
  });
  $tableTitle=$tableBody.children().eq(0);
  $tableTitle.children().eq(1).html('['+orderedProductCount+'] mon');
  $tableTitle.children().eq(2).html('Tong tien ['+formatCurrency(priceSum)+' VND]');
}
function onOrderProductCommentClick(name){
  var currentPressedIndex=parseInt($tableBody.data('currentPressedIndex'));
  if(currentPressedIndex !== 'NaN'){
    console.log("addComment at "+currentPressedIndex);
    var $trs=$tableBody.children();
    //because index 0 is <th> tag
    if(currentPressedIndex > 0 && currentPressedIndex<$trs.length){
      var $tr=$trs.eq(currentPressedIndex);
      var $td=$tr.children().eq(1);
      var $tdChilds=$td.children();
      console.log($tdChilds.text());
      if($tdChilds.length>1){
        var comment=$tdChilds.eq(1);
        comment.html(comment.text()+', ' +name);
      }else{
        $td.append('<div>'+name+'</div>');
      }
    }
  }
}

function loadOrderProducts(element) {
  var selectedCateId=$(element).data("id");
  var link="view.php?action=loadProducts_div&categoryId="+selectedCateId;
//  console.log(link);
  $("#order_center_list").load(link,function(xHttp){
    $("#category_menu").children().each(function() {
      $this=$(this);
      if($this.data('id') === selectedCateId){
        $this.addClass('active');
      }else{
        $this.removeClass('active');
      }
    });
  });
}
function loadProductComments(pId){
  var link="view.php?action=loadProductComments_div&productId="+pId;
    $("#order_bottom_list").load(link);
}
function removePressedTableRow(){
  $tableBody.find('.pressed--forcus').removeClass('pressed--forcus')
}
//reload table list when change area
$('#select_area').on('change', function(event){
  $('#select_table').load('view.php?action=loadTables_option&areaId='+$(event.target).val());
});
//table set click add addEventListener
$tableBody=$("#ordered_list_table tbody");
$tableBody.on('click','tr:has(td)',function(event){
  var $this=$(this);
  var thisIndex=$this.index();
  var $rows=$tableBody.children();
  removePressedTableRow();
  $this.addClass('pressed--forcus');
  $tableBody.data('currentPressedIndex',thisIndex);
  console.log("click "+(thisIndex)+"of "+($rows.length)+" with pID="+$(this).data('pid'));
  loadProductComments($(this).data('pid'))
});
