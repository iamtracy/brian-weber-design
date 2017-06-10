<?php /* Template Name: landing page */ ?>

<?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    echo '<div class="lp-fixed">';
    echo '<div class="row">';
    echo '<a href="#work" data-noclick="true">';
	echo '<div class="column small-12 lp-the-content"><img src="' . $thumb_url . '" /></div>';
    echo '</a>';
    echo '</div>';
    echo '</div>';
?>