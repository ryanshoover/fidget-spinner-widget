jQuery( function($) {
	$('.widget-spinner .spinner').click( function() {
		var $spinner = $(this),
			count = parseInt( $spinner.css('animation-iteration-count') );

		$spinner.removeClass('spinning');
		$spinner.outerWidth();
		$spinner.addClass('spinning');
	})
})();
