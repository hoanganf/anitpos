
function loadOrderGroupByTableInArea(areaId){
  $('#order_body').load('view.php?action=loadOrderGroups_tr&areaId='+areaId);
}
function editOrder(event,numberId){
  $(location).attr('href','index.php?pageId=editOrder&numberId='+numberId);
  event.stopPropagation();
}
function deleteOrder(event,numberId){
  $.get("php/cashier_container_controller.php?action=deleteOrder&numberId="+numberId,
  function(responseTxt, statusTxt, xhr){
    if(statusTxt == "success"){
      console.log(responseTxt);
      var response=JSON.parse(responseTxt);
      if(response.status=="ok"){
        $(event.target).parent().parent().remove();
        return;
      }
    }
    alert("Error: " + xhr.status + ": " + xhr.statusText);
  });
  event.stopPropagation();
}
function onNotifiClose(element){
    var $parentElement = $(element).parent();
    $parentElement.addClass("opacity--hide");
    setTimeout(function(){
      $parentElement.remove();
    }, 200);
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
$numberIdInput.on('keyup',function(){
  console.log($numberIdInput.val());
  if($numberIdInput.val() === '0') $numberIdInput.val('');
});
