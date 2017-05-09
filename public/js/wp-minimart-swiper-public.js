(function( $ ) {
		'use strict';

	 $(function(){
		 
		$('.swiper-slide-active img').one("load", function(){
		 	console.log("loaded");
		 	imageHeighter();
		}).each(function(){
			if(this.complete){ 
				$(this).load(); 
			}
		});
		

	 	$('.gallery-thumb-link').click(function(event) {
	 		event.preventDefault();
	 		var slideNumber = $(this).attr('id').match(/\d+$/)[0];
	 		mySwiper.slideTo(slideNumber, 200, true);
   	});


	 });

	 function imageHeighter() {
	 		var baseHeight = $('.swiper-slide-active img').height();

			$('.swiper-slide img').each(function() {
				$(this).css('height', baseHeight);
				$(this).css('width', 'auto');
				$(this).css('margin', '0 auto');
			});
	 }

})( jQuery );
