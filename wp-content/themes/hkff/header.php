<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
$headers = get_field('header');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <style type="text/css" media="screen">
        @import url(<?php bloginfo('stylesheet_url'); ?>);
    </style>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives(array('type' => 'monthly', 'format' => 'link')); ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if($headers): ?>
<header id="site-header" class="header-footer-group <?= $has_dark_banner ? 'has-dark-banner' : '' ?>">
    <div class="container">
        <div class="language-switcher">
            <div class="content">
                <?php pll_the_languages() ?>
            </div>
        </div>
        <div class="nav-bar">
            <ul>
            <?php foreach ($headers as $key => $header): ?>
                <li>
                    <?php if ($key !== 'headertitleimage'): ?>
                        <a class="word" href="<?= esc_url($header['url']); ?>">
                            <?php
                            // Split the title into characters
                            $characters = str_split($header['title']);
                            foreach ($characters as $char):
                            ?>
                                <span class="char"><?= esc_html($char); ?></span>
                            <?php endforeach; ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($key === 'headertitleimage' && isset($header['url'])): ?>
                        <img src="<?= esc_url($header['url']); ?>" 
                            alt="<?= esc_attr($header['alt']); ?>" 
                            width="<?= esc_attr($header['width']); ?>" 
                            height="<?= esc_attr($header['height']); ?>" 
                            class="image" />
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            </ul>
        </div>
    </div>
</header>
<?php endif; ?>
<div id="page-content" class="page-content line-slide-out">