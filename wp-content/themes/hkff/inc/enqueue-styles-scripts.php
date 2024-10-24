<?php
function addThemeScripts()
{
    wp_dequeue_style('global-styles');
    $uri  = get_stylesheet_directory_uri();
    $path = get_stylesheet_directory();

    // Define stylesheets with conditions
    $stylesheets = [
        'swiper-style' => [
            'uri'       => '/assets/css/swiper-bundle.min.css',
            'condition' => 'is_global',
        ],
        'general' => [
            'uri'       => '/style.css',
            'condition' => 'is_global',
        ],
        'header-footer' => [
            'uri'       => '/assets/css/header-footer.css',
            'condition' => 'is_global',
        ],
    ];

    // Define scripts with conditions
    $scripts = [
        'swiper-script' => [
            'uri'       => '/assets/js/swiper-bundle.min.js',
            'condition' => 'is_global'
        ],
        'header-footer-script' => [
            'uri'       => '/assets/js/header-footer.js',
            'condition' => 'is_global'
        ],
        // 'jquery-ui-script' => [
        //     'uri'       => '/assets/js/jquery-ui.min.js',
        //     'condition' => function () {
        //         return function_exists('is_account_page') && is_account_page() || is_page_template('templates/templates-lunch-learn.php');
        //     }
        // ],
        'split-lines-script' => [
            'uri'       => '/assets/js/jquery.splitlines.js',
            'condition' => function () {
                return is_page_template('templates/page-about-us.php');
            }
        ],
    ];

    // Enqueue styles
    enqueueAssets($stylesheets, 'style', $uri, $path);

    // Enqueue scripts
    enqueueAssets($scripts, 'script', $uri, $path);

    // Enqueue ajax script
    wp_localize_script('my-account-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('update_profile_picture_nonce')
    ));
    global $wp_scripts;
}
add_action('wp_enqueue_scripts', 'addThemeScripts');

/**
 * Helper function to enqueue styles or scripts based on conditions.
 *
 * @param array  $assets Array of assets to enqueue.
 * @param string $type   Type of asset ('style' or 'script').
 * @param string $uri    Base URI for assets.
 * @param string $path   Base path for assets.
 */
function enqueueAssets($assets, $type, $uri, $path)
{
    foreach ($assets as $name => $data) {
        $version = time();
        if (file_exists($path . $data['uri'])) {
            $version = filemtime($path . $data['uri']);
        }

        // Check if the condition to load the asset is met
        if (is_callable($data['condition']) && $data['condition']()) {
            enqueueAsset($type, $name, $uri . $data['uri'], $version);
        } elseif ($data['condition'] === 'is_global') {
            // For global assets
            enqueueAsset($type, $name, $uri . $data['uri'], $version);
        }
    }
}

/**
 * Helper function to enqueue a single style or script.
 *
 * @param string $type    Asset type ('style' or 'script').
 * @param string $name    Handle name for the asset.
 * @param string $url     URL of the asset.
 * @param string $version Version of the asset for cache busting.
 */
function enqueueAsset($type, $name, $url, $version, $dependencies = [])
{
    if ($type === 'style') {
        wp_enqueue_style($name, $url, [], $version);
    } elseif ($type === 'script') {
        wp_enqueue_script($name, $url, $dependencies, $version, true);
    }
}
