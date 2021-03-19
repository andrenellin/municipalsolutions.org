<?php
/**
 * Template Name: Home
 *
 * @subpackage Genesis
 * @package WordPress
 */

//* Force full-width-content layout setting
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

//* Display Header
// add_action('genesis_header', 'genesis_header_markup_open', 5);
// add_action('genesis_header', 'genesis_do_header');
// add_action('genesis_header', 'genesis_header_markup_close', 15);

/** Replace the standard loop with our custom loop */
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'do_custom_loop', 5);

//INSERT Row 1

function do_custom_loop()
{
    ?>


<!-- Hero Image Slider -->


<div id="bs_home_hero_slider" class="bs-home_row clearfix">
    <div class="wrap">
        <div class="bxslider-services">
            <?php if (have_rows('hero_image_repeater')): ?>
            <?php while (have_rows('hero_image_repeater')): the_row();
    // Get Variables section
    $image = get_sub_field('image');
    $title = get_sub_field('title');
    $tagline = get_sub_field('tagline');
    $more_link_text = get_sub_field('more_link_text');
    $more_link = get_sub_field('more_link'); ?>
            <!-- Insert Slider Assets -->
            <div class="hero-slider-content">
                <!-- Insert Image -->
                <img src="<?php echo esc_url($image); ?>" alt="hero image" />
                <!-- Create div to contain data to overlay on image -->
                <div class="hero-slider-inlay">
                    <!-- Insert Title -->
                    <div class="heroslider-title"><?php echo $title ?></div>
                    <!-- Insert Tagline -->
                    <div class="heroslider-tagline"><?php echo $tagline; ?></div>
                    <!-- Insert Link -->
                    <a class="button heroslider-more"
                        href="<?php echo $more_link; ?>"><?php echo $more_link_text; ?></a>
                </div>
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>





<?php
}
// Build the page
genesis();