<?php
/**
 * Plugin Name: Better Elementor Excerpt
 * Description: Shows automatically generated excerpt
 * Version:     1.0.0
 * Author:      Patryk Kożuch
 * Author URI:  https://pkozuch.pl
 * Text Domain: better-elementor-excerpt
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widget_manager Elementor widgets manager.
 * @return void
 */
function register_better_excerpt_widget( $widget_manager ) {

    require_once( __DIR__ . '/widgets/post-excerpt.php' );

    $widget_manager->register( new \ElementorPro\Modules\ThemeBuilder\Widgets\Better_Post_Excerpt_Widget());

}
add_action( 'elementor/widgets/register', 'register_better_excerpt_widget' );

/**
 * Register widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Core\DynamicTags\Manager $tag_manager Elementor widgets manager.
 * @return void
 */
function register_better_excerpt_tag($tag_manager) {

    require_once( __DIR__ . '/tags/better-post-excerpt.php' );

    $tag_manager->register( new \ElementorPro\Modules\DynamicTags\Tags\Better_Post_Excerpt_Tag());

}
add_action( 'elementor/dynamic_tags/register', 'register_better_excerpt_tag' );