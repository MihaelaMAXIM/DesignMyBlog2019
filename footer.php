	<div class="footer">
		<div class="container">
			<ul>
				<li><a href="termsandconditions.html">Terms and conditions</a></li>
				<li><a href="privacy.html">Privacy</a></li>
			</ul>

	<div class="follow">
		<p>Follow</p>
			<a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
			<a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
			<a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
	</div>
		
		</div>
	</div>
		
	<?php wp_footer(); ?>
	
	<script>
	jQuery(function($) {
		$(document).on('click', '.hamburger', function() {
			if (! $('.menu-menu-1-container').hasClass('active')) {
				$('.menu-menu-1-container').addClass('active');
			} else {
				$('.menu-menu-1-container').removeClass('active');
			}
		});
	});
	</script>
	
	</body>
	
</html>