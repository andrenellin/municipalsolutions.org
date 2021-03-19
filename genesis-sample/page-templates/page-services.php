<?php
/**
 * Template Name: Services
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
<!-- INSERT CTA IMAGES -->
<!-- Get number of repeater rows -->
<?php if (have_rows('service_areas_repeater')): ?>
<?php while (have_rows('service_areas_repeater')): the_row();

    // Get number of rows

    // Get variables
    $row_index = get_row_index();
    $title = get_sub_field('title');
    $image = get_sub_field('image');
    $cta_text = get_sub_field('more');
    $link = get_sub_field('link'); ?>

<!-- If row = 1, class= one-third first -->
<?php if ($row_index === 1): ?>
<div class="one-third first">

    <div id="bs_home_section_<?php echo $row_index; ?>" class="bs-home_sections clearfix">
        <!-- Insert Title -->
        <div id="services-section<?php echo $row_index; ?>-wrapper" class="services-section-title-wrapper">
            <div class="home-page-section-title"><?php echo $title; ?></div>
        </div>
        <!-- Insert Image -->
        <img id="services-section<?php echo $row_index; ?>-image" class="services-section-image"
            src="<?php echo $image; ?>" />
        <!-- Insert CTA -->
        <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
    </div>
</div>
<?php else: // field_name returned false?>
<div class="one-third ">

    <div id="bs_home_section_<?php echo $row_index; ?>" class="bs-home_sections clearfix">
        <!-- Insert Title -->
        <div id="services-section<?php echo $row_index; ?>-wrapper" class="services-section-title-wrapper">
            <div class="home-page-section-title"><?php echo $title; ?></div>
        </div>
        <!-- Insert Image -->
        <img id="services-section<?php echo $row_index; ?>-image" class="services-section-image"
            src="<?php echo $image; ?>" />
        <!-- Insert CTA -->
        <div class="bs-flex bs-justify_center">
            <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<!-- INSERT DATA ROWS -->
<?php if (have_rows('services_rows_repeater')): ?>
<?php while (have_rows('services_rows_repeater')): the_row();
    // Get variables
    $title = get_sub_field('title');
    $cta_text = get_sub_field('cta_text');
    $link = get_sub_field('cta_link');
    $sub_title = get_sub_field('sub_title');
    $content = get_sub_field('body_1'); ?>
<div class="bs-row clearfix">
    <h3><?php echo $title; ?></h3>
    <div class="one-third first">
        <ul class="list-repeater">
            <?php if (have_rows('list_repeater')): ?>
            <?php while (have_rows('list_repeater')): the_row();
    $list_item = get_sub_field('list_item'); ?>
            <li class="list-repeater-item"><?php echo $list_item; ?></li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <div class="bs-flex bs-justify_center">
            <a class="button button-accent2" href="<?php echo $link; ?>"><?php echo $cta_text; ?></a>
        </div>
    </div>
    <div class="two-thirds">
        <p><?php echo $sub_title; ?></p>
        <div><?php echo $content; ?></div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php
}
// Build the page
genesis();