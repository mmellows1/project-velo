<?php
/*
Template Name: With Carousel
*/
get_header();
?>

<div id="main" class="container">
    <?php the_content(); ?>

    <!-- this carousel would be added to the block-carousel.php template under normal circumstances -->
    <div class="carousel">
        <div class="carousel__inner">
            <div class="slick-slider-container-main">
                <?php
                // Check if the repeater field has rows of data
                if (have_rows('carousel')) :
                    // Loop through the rows of data
                    while (have_rows('carousel')) : the_row();
                        // Get the image field value
                        $image = get_sub_field('carousel_image');
                ?>
                        <div class="carousel__item">
                            <div class="carousel__item-top">
                                <picture class="carousel__picture">
                                    <img class="carousel__image" loading="lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </picture>
                                <div class="carousel__content">
                                    <div class="inner">
                                        <div class="wysiwyg">
                                            <?php the_sub_field('content'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__item-bottom">
                                <?php 
                                $cta_text = get_sub_field('cta_text'); 
                                $cta_url = get_sub_field('cta_url'); 
                                ?>
                                <a class="carousel__cta" href="<?php echo esc_url($cta_url); ?>" target="_blank"><?php echo esc_html($cta_text); ?></a>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    // No rows found
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
