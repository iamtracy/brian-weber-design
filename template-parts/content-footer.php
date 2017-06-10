<?php /* Template Name: footer */ ?>

<?php
    $social = get_post_custom( get_the_ID() )["social-media-link"][0];
    echo '<div class="row" style="width:100%;">';
    echo '<div class="columns small-12 medium-1 text-center">';
        echo '<a href="' . $social . '" target="_blank">';
            echo the_post_thumbnail('full');
        echo '</a>';
    echo '</div>';
    echo '<div class="columns small-12 medium-10 text-center">';
        echo '<h1 class="footer-title">' . str_replace('&amp;', '<span class="brand-color-gold">&</span>' , get_the_content()) . '</h1>';
    echo '</div>';
    echo '<div class="columns small-12 medium-1 text-center">';
        echo kdmfi_the_featured_image('featured-image', 'full');
    echo '</div>';
    echo '</div>';
?>