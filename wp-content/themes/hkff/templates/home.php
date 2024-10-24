<?php
/**
 * Template Name: Home
 * Template Post Type: page.
 */
get_header();?>
<section class="home-page">
    <div class="hero-banner" id="hero-banner">
        <div class="container">
            <?php get_template_part('templates/sections/herobanner'); ?>
        </div>
    </div>
    <div class="highlighted" id="highlighted">
        <div class="container">
            <?php get_template_part('templates/sections/hightlighted'); ?>
        </div>
    </div>
    <div class="wha" id="wha">
        <div class="container">
            <?php get_template_part('templates/sections/wha'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>