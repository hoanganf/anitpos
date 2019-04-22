function onSoftKeyboardNumber(value){
    var div = document.getElementById("moneyInput");
    if(value==='C'){
      div.value='';
    }else if(value==='<='){
      if(div.value.length>0){
        div.value=div.value.substring(0,div.value.length-1);
        div.value=formatCurrency(div.value.replace(/,/g,''));
      }
    }else{
      div.value+=value;
      div.value=formatCurrency(div.value.replace(/,/g,''));
    }
}

document.addEventListener("DOMContentLoaded", function(){
  setToDrag(document.getElementById('dragbar'),document.getElementById('left_container'));
  document.getElementById("moneyInput").oninput = function() {
    var div=document.getElementById('moneyInput');
    div.value=formatCurrency(div.value.replace(/,/g,''));
  };
});
