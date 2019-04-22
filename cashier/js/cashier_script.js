
function loadOrderGroupByTableInArea(areaId){
  ajaxLoadPage("view.php?action=loadOrderGroups_tr&areaId="+areaId,function(xHttp){
    document.getElementById("order_body").innerHTML = xHttp.responseText;
  });
}
function editOrder(event,numberId,tableId){
  event.preventDefault();
  location.href="index.php?pageId=editOrder&numberId="+numberId+"&tableId="+tableId;
}
function deleteOrder(event,numberId){
  event.preventDefault();
  ajaxLoadPage("php/cashier_container_controller.php?action=deleteOrder&numberId="+numberId,function(xHttp){
      console.log(xHttp.responseText);
      var response=JSON.parse(xHttp.responseText);
      if(response.status=="ok"){
        var table = document.getElementById("ordered_list_table");
        var index= event.target.parentNode.parentNode.rowIndex;
        var row = table.deleteRow(index);
      }
  });
}
function onNotifiClose(element){
    var div = element.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.parentElement.removeChild(div); }, 300);
}
function onSoftKeyboardNumber(value){
    var div = document.getElementById("numberIdInput");
    div.value+=value;
}
function onOrderTableItemClick(value,event){
  if(!event.defaultPrevented){
    var div = document.getElementById("numberIdInput");
    div.value=value;
  }
}
