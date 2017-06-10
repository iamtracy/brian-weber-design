<?php /* Template Name: about */ ?>

<?php
    echo '<div style="background: url(' . get_the_post_thumbnail_url() . '); background-size: cover; display: flex; flex-direction: column; justify-content: center; min-height: 84vh;">';
    echo '<div class="row">';
    echo '<h1 id="about" class="lp-about text-center page-title"><span class="brand-color-gold bracket">[</span>' . get_the_title() . '<span class="brand-color-gold bracket">]</span></h1>';
    echo '<div class="column small-12 about-container">';
    echo '<img class="profile-img" src="' . kdmfi_the_featured_image('featured-image-2', 'full') . '" />';
    echo '<div class="about-content">';
    echo wpautop(get_the_content());
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>