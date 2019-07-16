jQuery(function($) {
	$('.btn_loadmore').click(function() {

		var button = $(this),
		data = {
			'action': 'btn_loadmore',
			'query': btn_loadmore_params.posts,
			'page': btn_loadmore_params.current_page
		};

		$.ajax({
			url: btn_loadmore_params.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function ( xhr ) {
				button.text('Load more');
			},
			success: function( data ) {
				console.log(data);
				if( data ) {
					button.text( 'Load more' ).prev().before(data);
					btn_loadmore_params.current_page++;

					if ( btn_loadmore_params.current_page == btn_loadmore_params.max_page )
							button.remove();
					var $items = $( data ); // data is the HTML of loaded posts
					$('.post-wrapper .container').append($items);
				} else {
					button.remove();
				}
			}
		});

	});

});