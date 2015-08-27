$ = jQuery;
divScroll = $(".odometer-container").offset().top;

$(window).scroll(function(){
 lastLineScroll = $("body").scrollTop() + $(window).height();
  if (divScroll < lastLineScroll)  {
    var odometer = document.querySelectorAll('.odometer');
    for (var i = 0; i < odometer.length; i++) {
      var el = odometer[i];
   		var finish = $(el).data('end');
   		var od = new Odometer({
   			el: el,
   			value: $(odometer).text(),
   			format: '(,ddd)'
   			//format: '( ddd),ddd'
   			//format: '(,ddd).ddd'
   		});
   		od.update(finish);
   	}
  }
});

$(".odometer-container").parents().addClass('full-width');
	


