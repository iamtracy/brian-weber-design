<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brian-weber
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="nav nav-menu">
		<?php
			$desc = str_replace('+', '<span class="brand-color-gold">+</span>' , get_bloginfo('description'));
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'large' );
			echo '<div class="site-logo">';
			echo '<img src="' . $image[0] . '" />';
			echo '<div class="site-info">';
			echo '<h4>' . get_bloginfo('name') . '</h4>';
			echo '<h6><span class="brand-color-gold bracket">[</span>' . $desc . '<span class="brand-color-gold bracket">]</span></h6>';
			echo '</div>';
			echo '</div>';
			wp_footer(); 
			?>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

</div>
<!--end off-canvas-content-->
</div> 
<!--end off-canvas-wrapper-->
</div>
<!--end columns-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js">
</script>
</body>
</html>
