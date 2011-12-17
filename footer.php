		</div>

		<footer id="mainfooter">
			<p>Copyright Paulina Hejazi / Stylist & Designer / Site by <a href="http://www.paulobarcelos.com">Paulo Barcelos</a> & <a href="http://www.tjaneski.com">Magdalena Czarneci</a></p>
		</footer>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<?php if (is_home()) { ?>
	<script src="<?php bloginfo('stylesheet_directory');?>/js/postthumb.js"></script>
	<?php } ?>	
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'http://www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
<?php wp_footer(); ?>
</body>
</html>
