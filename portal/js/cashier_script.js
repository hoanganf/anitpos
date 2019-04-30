
function loadOrderGroupByTableInArea(areaId){
  $('#order_body').load('view.php?action=loadOrderGroups_tr&areaId='+areaId);
}
function editOrder(event,numberId){
  $(location).attr('href','index.php?pageId=editOrder&numberId='+numberId);
  event.stopPropagation();
}
function deleteOrder(event,numberId){
  var $modalDialog=$(".modal-dialog");
  console.log(JSON.stringify({number_id:numberId,data:[]}));
  $modalDialog.find('.modal-dialog__ok').on('click',function(){
    $modalDialog.find('.modal-dialog__ok').off('click');
    closeAlertDialog();
    $.ajax({
         url: "../api/order.php",
         type : "POST",
         contentType : 'application/json',
         data : JSON.stringify({number_id:numberId,data:[]}),
         success : function(response) {
           console.log(response.message+"|"+response.status);
           if(response.status === true && parseInt(response.message) === 0){
             $(event.target).parent().parent().remove();
           }else{
             showAlertDialog('That bai',response.message,false,false);
           }
         },
         error: function(xhr, resp, text){
             console.log(xhr);
             console.log(resp);
             console.log(text);
         }
     });
  });
  showAlertDialog('Xac nhan thuc hien','Ban co muon xoa khong, lich su se duoc luu lai tren may chu',true,true);
  event.stopPropagation();
}

function onSoftKeyboardNumber(value){
  if($numberIdInput.val().length === 0 && value === 0) return;
  $numberIdInput.val($numberIdInput.val()+value);
}

function onOrderTableItemClick(value,event){
  var div = document.getElementById("numberIdInput");
  div.value=value;
}
//page run setting
//not allow 0 in the first input
$numberIdInput=$("#numberIdInput");
$numberIdInput.on('input',function(){
  console.log($numberIdInput.val());
  if($numberIdInput.val() === '0') $numberIdInput.val('');
});
