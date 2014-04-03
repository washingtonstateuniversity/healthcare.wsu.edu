<?php get_template_part( 'spine' ); ?>

</div><!--/cover-->
</div><!--/jacket-->

<?php get_template_part('parts/contact'); ?> 

<?php

wp_footer();

$share_text = urlencode( get_the_title() . ' | Washington State University' );
$share_url = urlencode( get_home_url() );

?>
<script>
	jQuery(document ).ready(function() {
		var wsu_twitter_share_text = '<?php echo 'https://twitter.com/intent/tweet?text=' . $share_text . '&url=' . $share_url . '&via=wsupullman'; ?>';
		jQuery( '#wsu-share .by-twitter a' ).attr( 'href', wsu_twitter_share_text );
	});
</script>
<!-- Scripts that need to be loaded at the bottom -->
</body>
</html>