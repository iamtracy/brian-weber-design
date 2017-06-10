<?php /* Template Name: work */ ?>

<?php
    $query = new WP_Query( array( 'post_type' => 'work', 'posts_per_page' => -1 ) );
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
    
    // The Loop
    echo '<div id="work" class="row work-row">';
    echo '<h1 class="lp-work text-center page-title"><span class="brand-color-gold bracket">[</span>' . get_the_title() . '<span class="brand-color-gold bracket">]</span></h1>';
    
    
        

    while ( $query->have_posts() ) {
        $query->the_post();
        $title =  get_the_title();
        $linkArray = get_post_custom( get_the_ID() )["video-link"];
        $contentWithPgTags = wpautop(get_the_content());
        
        $imgArray = array();
        if( kdmfi_has_featured_image( 'modal-image', $post->ID ) ) {
            $img1 = kdmfi_get_featured_image_src( 'modal-image', 'full', $post->ID );
            $imgArray[] = $img1;
        }
        if( kdmfi_has_featured_image( 'modal-image2', $post->ID ) ) {
            $img2 = kdmfi_get_featured_image_src( 'modal-image2', 'full', $post->ID );
            $imgArray[] = $img2;
        }
        if( kdmfi_has_featured_image( 'modal-image3', $post->ID ) ) {
            $img3 = kdmfi_get_featured_image_src( 'modal-image3', 'full', $post->ID );
            $imgArray[] = $img3;
        }
        if( kdmfi_has_featured_image( 'modal-image4', $post->ID ) ) {
            $img4 = kdmfi_get_featured_image_src( 'modal-image4', 'full', $post->ID );
            $imgArray[] = $img4;
        }

        echo '<div class="small-12 medium-6 large-4 columns">';
        echo '<a data-open="workModal' . $query->current_post . '">';
        echo '<div class="card">';
        echo '<img class="lazy-loaded" data-src="'. get_the_post_thumbnail_url() . '" data-lazy-type="image" data-srcset srcset="'. get_the_post_thumbnail_url() . '" src="">';
        echo '<div class="card-section">';
        echo '<h4>' . $title . '</h4>';
        echo $contentWithPgTags;
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</a>';

        echo '<div class="reveal large" id="workModal' . $query->current_post . '" data-reveal data-v-offset="125">';
                echo '<div class="reveal-content">';
                    echo '<div class="orbit" role="region" aria-label="My Work" data-orbit>';
                        echo '<ul class="orbit-container" width="">';
                        foreach($imgArray as $index=>$img) {
                            echo '<li class="' . ($index == 0 ? 'is-active ' : '') . 'orbit-slide">';
                                echo '<img class="lazy-loaded" data-lazy-type="image" data-src="'. $img . '" src="' . $img . '" alt="">';
                            echo '</li>';       
                        }
                        echo '</ul>';
                        if(count($imgArray) > 1) {
                            echo '<nav class="orbit-bullets">';
                            foreach($imgArray as $index=>$img) {
                                echo '<button ' . ($index == 0 ? 'class="is-active"' : '') . ' data-slide="' . $index . '"><span class="show-for-sr">Click for next image.</span><span class="show-for-sr">Current Slide</span></button>';  
                            }
                            echo '</nav>';
                        }
                    echo '</div>';
                echo '<button class="orbit-previous travers-modal" data-tab-index="' . (($query->current_post) == 0 ? ($query->post_count - 1) : ($query->current_post - 1)) . '"><span class="show-for-sr">Previous Slide</span>◀︎</button>';
                echo '<div class="reveal-detail">';
                echo '<div class="reveal-logo">';
                echo '<img class="lazy-loaded" data-lazy-type="image" data-src="'. $image[0] . '" src="' . $image[0] . '" />';
                echo '</div>';
                echo '<h4>' . $title . '</h4>';
                echo '<div class="reveal-excerpt-cont">';
                echo '<p class="reveal-excerpt">' . get_the_excerpt() . '</p>';
                echo '<div class="reveal-project-items row align-center-middle">';
                echo $contentWithPgTags;
                echo '</div>';
                echo '</div>';
                
                if($linkArray) {
                    echo '<div class="button-video-container">';
                    foreach($linkArray as $link) {
                        echo '<a class="button video" data-open="nestedModal' . $query->current_post . '" data-src="' . $link . '">Watch Video</a>';
                        echo '<div class="reveal small" id="nestedModal' . $query->current_post . '" data-reveal data-v-offset="125" data-reset-on-close="true">';
                            echo '<div class="responsive-embed widescreen">';
                            echo '<iframe class="embed" id="nestedModal' . $query->current_post . 'Vid" src frameborder="0" allowfullscreen></iframe>';
                            echo '<div id="loader"><div id="box"></div><div id="hill"></div></div>';
                            echo '</div>';
                            echo '<button class="close-button" data-close aria-label="Close reveal" type="button">';
                                echo '<a class="back-to-card" data-open="workModal' . $query->current_post . '">&#8630;</a>';
                                echo '<span aria-hidden="true">&times;</span>';
                            echo '</button>';
                        echo '</div>'; 
                    }
                    echo '</div>';
                }
                echo '</div>';
                echo '<button class="orbit-next travers-modal" data-tab-index="' . (($query->current_post + 1) == ($query->post_count) ? 0 : ($query->current_post + 1))  . '"><span class="show-for-sr">Next Slide</span>▶︎</button>';
                echo '<button class="close-button" data-close aria-label="Close reveal" type="button">';
                    echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';
?>