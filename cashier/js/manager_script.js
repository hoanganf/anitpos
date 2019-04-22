
document.addEventListener("DOMContentLoaded", function(){
  setToDrag(document.getElementById('dragbar'),document.getElementById('left_container'));
  var div=document.getElementById('left_container');
  div.style.minWidth="0px";
  //click for file
  document.getElementById('image_display').onclick = function() {
      document.getElementById('imageToUpload').click();
  };
});
function removeNumberMask(){
  var div=document.getElementById("price");
  var submitPrice=div.value.replace(/,/g,'');
  if(!isNaN(submitPrice)){
    div.value=submitPrice;
    return true;
  }else{
    alert('Vui long nhap gia ca bang so');
    return false;
  }
}
function onCategoryClick(id,name,available,image){
  document.getElementById("id").value=id;
  document.getElementById("name").value=name;
  document.getElementById("available").checked=(available==1? true:false);
  if(image!=null && image.length>0){
    document.getElementById("image_display").src="images/"+image;
    document.getElementById("image_to_upload").value=image;
    document.getElementById("imageToUpload").value='';
  }
}
function onProductClick(id,name,cateId,unitId,price,description,available,image,defaultStatus,addCount){
  document.getElementById("id").value=id;
  document.getElementById("name").value=name;
  document.getElementById("price").value=formatCurrency(price);
  document.getElementById("description").value=description;
  document.getElementById("available").checked=(available==1? true:false);
  if(image!=null && image.length>0){
    document.getElementById("image_display").src="images/"+image;
    document.getElementById("image_to_upload").value=image;
    document.getElementById("imageToUpload").value='';
  }
  document.getElementById("default_status").checked=defaultStatus==1 ? true:false;
  document.getElementById("add_count").value=addCount;
  document.getElementById("category").value=cateId;
  document.getElementById("unit").value=unitId;
}
function loadProducts(cateID) {
  var link="php/product_container_controller.php?action=loadProducts";
  if(cateID!=null){
    link+="&cate_id="+cateID;
    var menu = document.getElementById("category_list");
    var rowCount=menu.childNodes.length;
    var i;
    //clear
    for(i=0;i<rowCount;i++){
      if(menu.childNodes[i].getAttribute("data-id")==cateID){
        menu.childNodes[i].className='active';
      }else{
        menu.childNodes[i].className='';
      }

    }
  }
  ajaxLoadPage(link,function(xHttp){
    document.getElementById("product_table").innerHTML = xHttp.responseText;
  });
}
