(function($){
  $.fn.clonePosition = function(element, options) {
    var options = $.extend({
      cloneWidth: true,
      cloneHeight: true,
      offsetLeft: 0,
      offsetTop: 0,
      containerName: 'Content'
    }, (options || {}));

    var containerOffsets = $("#" + options.containerName).offset();
    var offsets = $(element).offset();

    $(this).css({
      position: 'absolute',
      top:  (offsets.top  + options.offsetTop) - (containerOffsets.top)  + 'px',
      left: (offsets.left + options.offsetLeft) - (containerOffsets.left) + 'px'
    });

    if (options.cloneWidth) {
    	paddingTop = $(element).css('padding-top');
		paddingLeft = $(element).css('padding-left');
		paddingRight = $(element).css('padding-right');
		paddingBottom = $(element).css('padding-bottom');
		$(this).css({
			'padding-top': paddingTop,
			'padding-right': paddingRight,
			'padding-bottom': paddingBottom,
			'padding-left': paddingLeft
			});
    	$(this).width($(element).width());
    }
    if (options.cloneHeight) $(this).height($(element).height());

    return this;
  }
})(jQuery);