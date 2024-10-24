<?php

/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

include_once 'inc/enqueue-styles-scripts.php';
add_theme_support('automatic-feed-links');

if (function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));

add_filter('wp_get_nav_menu_items', 'my_wp_get_nav_menu_items', 10, 3);
function my_wp_get_nav_menu_items($items, $menu, $args)
{
	foreach ($items as $key => $item)
		$items[$key]->description = '';
	return $items;
}

// Remove content editor default for acf page
function remove_content_editor_for_specific_pages()
{
	global $pagenow, $post;

	if (is_admin() && $pagenow == 'post.php' && isset($post->ID)) {
		$pages_to_remove_editor = array(16, 1168, 451, 375);

		if (in_array($post->ID, $pages_to_remove_editor)) {
			remove_post_type_support('page', 'editor');
		}
	}
}

// remove the content editor in WordPress for pages
function remove_editor_for_specific_page_template() {
    // Check if we are in the admin area
    if (is_admin()) {
        // Get the current post ID
        $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : '');

        if (!empty($post_id)) {
            // Get the current page template
            $template_file = get_post_meta($post_id, '_wp_page_template', true);

            // List of templates for which the editor should be removed
            $templates_to_remove_editor = array(
                'templates/templates-lunch-learn.php',
                'templates/services.php',
                'templates/smsf-iq.php',
            );

            // Check if the current template is in the list
            if (in_array($template_file, $templates_to_remove_editor)) {
                // Remove the content editor
                remove_post_type_support('page', 'editor');
            }
        }
    }
}
add_action('admin_init', 'remove_editor_for_specific_page_template');