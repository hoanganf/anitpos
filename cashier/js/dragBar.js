(function($) {
  function DragBar(dragBar,leftContainer){
    this.dragBar=dragBar;
    this.leftContainer=leftContainer;
    this.dragFunction= (e) => {
        document.selection ? document.selection.empty() : window.getSelection().removeAllRanges();
        this.leftContainer.width(e.pageX - this.dragBar.outerWidth() / 2);
    }
  }
  DragBar.prototype = {
 		init: function(){
      $document=$(document);
      this.dragBar.on('touchstart', () => {
        $document.on('touchmove', this.dragFunction);
      });
      this.dragBar.on('mousedown', () => {
        $document.on('mousemove', this.dragFunction);
      });
      $document.on('touchstop', () => {
        $document.off('touchmove',this.dragFunction);
      });
      $document.on('mouseup', () => {
        $document.off('mousemove', this.dragFunction);
      });
 		}
  }
  $.fn.applyDrag = function(leftContainer){
    var dragBar=new DragBar(this,leftContainer);
    dragBar.init();
    return dragBar;
  }
})(jQuery);
