var orderedListTableCurIndex=-1;
function submitOrder(isCheckout=false,numberId=-1){
  var table = document.getElementById("ordered_list_table");
  var rows=table.rows;
  var rowCount=rows.length;
  var action="order";//new setting
  if(rowCount<2){
    alert("Vui long chon mon!");
    return;
  }
  var selectedTable=document.getElementById("select_tables");
  var tableId=selectedTable.options[selectedTable.selectedIndex].value;
  var i;
  var orders = new Array();
  for(i=1;i<rowCount;i++){
    var row=rows[i];
    var commentTmp="";
    var commandTmp="";
    var idTmp="";
    console.log(row.cells[0].childNodes.length);
    var j;
    for(j=0;j<row.cells[0].childNodes.length;j++){
      console.log(row.cells[0].childNodes[j].innerHTML);
    }
    if(row.cells[0].childNodes.length>1){
      commentTmp=row.cells[0].childNodes[1].innerHTML;
    }
    var order={
      id : idTmp,
      command: commandTmp,
      waiter_id:"admin",//TODO
      chef_id:"",
      table_id:tableId,
      product_id:row.getAttribute("data-pId"),
      count:row.getAttribute("data-count"),
      comments:commentTmp,
      price:row.getAttribute("data-price"),
      status:row.getAttribute("data-status")
    }
    orders.push(order);

  }

  var dbParam, xmlhttp;
  dbParam = JSON.stringify(orders);
  console.log("php/order_container_controller.php?action="+action+"&value=" + dbParam);
  ajaxLoadPage("php/order_container_controller.php?action="+action+"&value=" + dbParam,function(xHttp){
    console.log(xHttp.responseText);
    var response=JSON.parse(xHttp.responseText);
    if(response.status=="ok"){
      if(isCheckout){
        location.href="index.php?pageId=checkOut&numberId="+response.message;
      }else{
        removeAllOrder();
      }
    }
  });
}

function removeAllOrder(){
  var table = document.getElementById("ordered_list_table");
  while(table.rows.length>1){
    table.deleteRow(1);
  };
  orderedListTableCurIndex=-1;
  setOrderListRowClick(true);
}
function onOrderProductClick(id,name,count,price,status,comment){
  var table = document.getElementById("ordered_list_table");
  var rows=table.rows;
  orderedListTableCurIndex=rows.length;
  var i;
  console.log(comment);
  //find same product
  for(i=orderedListTableCurIndex-1;i>0;i--){
    var pId=rows[i].getAttribute("data-pId");
    console.log("find "+i+" of "+orderedListTableCurIndex);
    if(pId==id){
      console.log("BANG NHAU");
      orderedListTableCurIndex=i+1;
      break;
    }
  }

  var row = table.insertRow(orderedListTableCurIndex);
    console.log(" chen vao vi tri "+orderedListTableCurIndex+" of "+rows.length);
  row.setAttribute("data-pId", id);
  row.setAttribute("data-name", name);
  row.setAttribute("data-count", count);
  row.setAttribute("data-price", price);
  row.setAttribute("data-status", status);
  var cell1 = row.insertCell(0);
  var cellMoney = row.insertCell(1);
  var cell2 = row.insertCell(2);
  var cell3 = row.insertCell(3);
  var span=document.createElement("span");
  row.addEventListener("click", function(event){onOrderClick(event,row);});
  cell1.innerHTML = "<strong style='color: #2196F3;'>"+name+"</strong>";
  if(comment!=null && comment!=''){
    cell1.innerHTML=cell1.innerHTML+"<div>"+comment+"</div>";
  }
  cell1.style.width="100%";
  cellMoney.style.whiteSpace="nowrap";
  cellMoney.classList.add("right");
  $(span).addClass("rounded background-color--yellow padding");
  span.innerHTML=formatCurrency(price);
  cellMoney.appendChild(span);
  cell2.innerHTML = '<img width="24px" height="24px" src="./images/ic_add.png" alt="Them">';
  cell3.innerHTML = '<img width="24px" height="24px" src="./images/ic_close.png" alt="Xoa">';
  cell2.style.textAlign="center";
  cell3.style.textAlign="center";
  cell3.addEventListener("click", function(event){onDeleteRow(event,row);});
  //add
  cell2.addEventListener("click", function(event){onAddRow(event,row);});
  setOrderListRowClick(true);
}
function onOrderClick(event,row){
  if(!event.defaultPrevented){
    orderedListTableCurIndex=row.rowIndex;
    setOrderListRowClick(false);
    console.log("click "+orderedListTableCurIndex+"of "+orderedListTableCurIndex);
  }
}
function onDeleteRow(event,row){//0:new,1:edit
  //delete
  var table = document.getElementById("ordered_list_table");
  var index= row.rowIndex;
  table.deleteRow(index);

  console.log("delete at "+index+"and current index: "+orderedListTableCurIndex+" of "+row.length);
  event.preventDefault();
  setOrderListRowClick(true);
}
function onAddRow(event,row){
  var cell1=row.cells[0];
  event.preventDefault();
  onOrderProductClick(row.getAttribute("data-pId"),row.getAttribute("data-name"),row.getAttribute("data-count"),row.getAttribute("data-price"),row.getAttribute("data-status"),cell1.childElementCount>1?cell1.children[1].innerHTML:'');
}
function setOrderListRowClick(checkPrice){
  var table = document.getElementById("ordered_list_table");
  var rows=table.rows;
  var rowCount=rows.length;
  var i;
  //clear
  if(checkPrice){
    var priceSum=0;
    for(i=1;i<rowCount;i++){
      var lRow=rows[i];
      lRow.style.backgroundImage='';
      if(lRow.style.display!="none"){
        priceSum+=Number(lRow.getAttribute("data-price"));
      }
    }
    rows[0].cells[0].innerHTML="["+(rowCount-1)+"] mon";
    rows[0].cells[1].innerHTML="Tong tien ["+formatCurrency(priceSum)+" VND]";
  }else{
    for(i=1;i<rowCount;i++){
      rows[i].style.backgroundImage='';
    }
  }
  console.log("set focus "+orderedListTableCurIndex+"of "+orderedListTableCurIndex);
  if (orderedListTableCurIndex < 0 || orderedListTableCurIndex >= rowCount) {
      var j=orderedListTableCurIndex-1;
      while(j>0){
        if(rows[j].style.display!="none") orderedListTableCurIndex=j;
        j--;
      }
  }
  if(orderedListTableCurIndex>0 && orderedListTableCurIndex<rowCount){
    rows[orderedListTableCurIndex].style.backgroundImage="url('./images/pressed_holo_dark.png')";
    var link="view.php?action=loadProductComments_div&productId="+rows[orderedListTableCurIndex].getAttribute("data-pId");
    console.log(link);
    $("#order_bottom_list").load(link);
  }
};
function onOrderProductCommentClick(name){
    console.log("addComment at "+orderedListTableCurIndex);
    var table = document.getElementById("ordered_list_table");
    var rows=table.rows;
  if(orderedListTableCurIndex > 0 && orderedListTableCurIndex<rows.length){
      var row=rows[orderedListTableCurIndex];
      var cell=row.cells[0];
      if(cell.childElementCount>1){
        var comment=cell.children[1];
        comment.innerHTML=comment.innerHTML+","+name;
      }else{
        var node = document.createElement("div");
        cell.appendChild(node);
        node.innerHTML="Ghi chu: "+name;
      }
  }

}

function loadOrderProducts(element) {
  var selectedCateId=$(element).data("id");
  var link="view.php?action=loadProducts_div&categoryId="+selectedCateId;
  console.log(link);
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
// TODO not use now
function loadOrderProductComments() {
   ajaxLoadPage("php/order_container_controller.php?action=loadOrderProductComments",function(xHttp){
     document.getElementById("order_bottom_list").innerHTML = xHttp.responseText;
   });
}
//reload table list when change area
$('#select_area').on('change', function(event){
  ajaxLoadPage('view.php?action=loadTables_option&areaId='+$(event.target).val(),function(xHttp){
    $('#select_table').html(xHttp.responseText);
  })
});
