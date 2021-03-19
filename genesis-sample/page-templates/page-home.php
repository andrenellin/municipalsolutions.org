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


<div id="bs_home_hero_slider" class="clearfix">
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

<!-- Add 3 sections -->

<!-- section 1 -->
<div class="one-third first">
    <?php if (have_rows('state_local_gov_group')): ?>
    <?php while (have_rows('state_local_gov_group')): the_row();
    $title = get_sub_field('title_1');
    $cta_text = get_sub_field('cta_text_1');
    $link = get_sub_field('cta_link_1'); ?>

    <div id="bs_home_section_1" class="bs-home_sections clearfix">
        <!-- Insert Title -->
        <div id="home-section1-wrapper" class="home-section-title-wrapper">
            <div class="home-page-section-title"><?php echo $title; ?></div>
        </div>
        <!-- Insert Slider -->
        <div class="bxslider-state_local">
            <?php if (have_rows('section_one_image_repeater')): ?>
            <?php while (have_rows('section_one_image_repeater')): the_row();
    // Get Variables section
    $image = get_sub_field('image'); ?>
            <!-- Insert Slider Assets -->
            <div class="section1-slider-content">
                <!-- Insert Image -->
                <img src="<?php echo esc_url($image); ?>" alt="state and local images" />
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- Insert CTA -->
        <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>

<!-- section 2 -->
<div class="one-third">
    <?php if (have_rows('international_development_group')): ?>
    <?php while (have_rows('international_development_group')): the_row();
    $title = get_sub_field('title_2');
    $image = get_sub_field('image_2');
    $cta_text = get_sub_field('explore_text_2');
    $link = get_sub_field('explore_link_2'); ?>

    <div id="bs_home_section_2" class="bs-home_sections clearfix">
        <!-- Insert Title -->
        <div id="home-section2-wrapper" class="home-section-title-wrapper">
            <div class="home-page-section-title"><?php echo $title; ?></div>
        </div>
        <!-- Insert Image -->
        <img id="home-section2-image" class="home-section-image" src="<?php echo $image; ?>" />
        <!-- Insert CTA -->
        <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>

<!-- section 3 -->
<div class="one-third">
    <?php if (have_rows('private_industry_group')): ?>
    <?php while (have_rows('private_industry_group')): the_row();
    $title = get_sub_field('title_3');
    $image = get_sub_field('image_3');
    $cta_text = get_sub_field('explore_text_3');
    $link = get_sub_field('explore_link_3'); ?>

    <div id="bs_home_section_3" class="bs-home_sections clearfix">
        <!-- Insert Title -->
        <div id="home-section3-wrapper" class="home-section-title-wrapper">
            <div class="home-page-section-title"><?php echo $title; ?></div>
        </div>
        <!-- Insert Image -->
        <img id="home-section3-image" class="home-section-image" src="<?php echo $image; ?>" />
        <!-- Insert CTA -->
        <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
    </div>

</div>
<?php endwhile; ?>
<?php endif; ?>
</div>





<?php
}
// Build the page
genesis();