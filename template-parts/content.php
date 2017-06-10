<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brian-weber
 */

?>

<?php
	$child_pages = new WP_Query( array(
		'post_type'      => 'page', // set the post type to page
		'posts_per_page' => 10, // number of posts (pages) to show
		'post_parent'    => 10, // enter the post ID of the parent page
		'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
	));
	
	if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
		$slug =  $post->post_name;
		$classList;
		switch ($slug) {
			case 'landing-page':
				$classList = "full-height landing-page-content text-center";
				break;
			case 'work':
				$classList = "white-bg";
				break;
			case 'about':
				$classList = "white-bg about"; // orange-divide
				break;
			case 'contact':
				$classList = "white-bg";
				break;
			case 'footer':
				$classList = "footer";
				break;
			default:
				$classList = 'white-bg';
		}
		echo '<div class="columns section ' . $classList . '">';
		get_template_part( 'template-parts/content',  $slug);
		echo '</div>';
	endwhile; endif;  
	wp_reset_postdata();
?>
