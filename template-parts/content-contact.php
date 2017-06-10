<?php /* Template Name: contact */ ?>

<?php
    echo '<div id="contact" class="row contact">';
    echo '<h1 class="lp-about text-center page-title"><span class="brand-color-gold bracket">[</span>' . get_the_title() . '<span class="brand-color-gold bracket">]</span></h1>';
    echo '<div class="column small-12">' . the_content() . '</div>';
    echo '</div>';
?>