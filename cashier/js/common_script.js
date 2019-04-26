function showAlertDialog(title,message,okButton=false,cancelButton=false){
  $modalDialog=$(".modal-dialog");
  $modalDialog.find('.modal-dialog__content__title').text(title);
  $modalDialog.find('.modal-dialog__content__message').text(message);
  if(!okButton){
    $modalDialog.find('.modal-dialog__cancel').css('display','none');
  }
  if(!cancelButton){
    $modalDialog.find('.modal-dialog__cancel').css('display','none');
  }
  $modalDialog.css('display','block');
}
function closeAlertDialog(t){
  $modalDialog=$(".modal-dialog");
  $modalDialog.css('display','none');
}
function showLoader(isShow=true){
  var loader=document.getElementById("loading_page");
  if(isShow){
    loader.style.display="block";
  }else{
    loader.style.display="none";
  }
}
function makeNumberMask(element){
  element.value=formatCurrency(element.value.replace(/,/g,''));
}
var loadFileToImage = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('image_display');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
/* @Deprecated*/
function ajaxLoadPage(ajax_link,functionX){
  var xhttp = null;
  if (window.XMLHttpRequest) {
      // code for modern browsers
      xhttp = new XMLHttpRequest();
  } else {
      // code for old IE browsers
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    //if(this.readyState==)
  //  if(this.readyState==1) showLoader(true);
  //  else if (this.readyState == 4) {
    if (this.readyState == 4) {
      if(this.status == 200 && functionX!=null) functionX(this);
    //  showLoader(false);
    }
  };
  xhttp.open("GET", ajax_link, true);
  xhttp.send();
}

function formatCurrency(total){
  return total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
/*DRAG*/
var dragBar=$('.dragbar-container__dragbar');
var dragBarContainerLeft=$('.dragbar-container__left');
if(dragBar && dragBarContainerLeft){
  dragBar.applyDrag($('.dragbar-container__left'));
}
/*
function setToDrag(barVar,leftContainerVar){
  console.log('here');
  bar=barVar;
  leftContainer=leftContainerVar;
  drag = (e) => {
    document.selection ? document.selection.empty() : window.getSelection().removeAllRanges();
    leftContainer.width(e.pageX - bar.outerWidth() / 2);
  }
  $document=$(document);
  bar.on('touchstart', () => {
    $document.on('touchmove', drag);
  });
  bar.on('mousedown', () => {
    $document.on('mousemove', drag);
  });
  $document.on('touchstop', () => {
    $document.off('touchmove', drag);
  });
  $document.on('mouseup', () => {
    $document.off('mousemove', drag);
  });
}
*/

/*DRAG*/
//set sticky bar scrool
/*var prevScrollpos = window.pageYOffset;
function setStickyBar(navbar){
window.onscroll = function() {
  if(navbar!=null){
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        navbar.style.top = "0";
      } else {
        navbar.style.top = -navbar.style.offsetHeight;
      }
      prevScrollpos = currentScrollPos;
    }
}*/
