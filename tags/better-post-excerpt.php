<?php
namespace ElementorPro\Modules\DynamicTags\Tags;

use Elementor\Controls_Manager;
use ElementorPro\Core\Utils;
use ElementorPro\Modules\DynamicTags\Tags\Base\Tag;
use ElementorPro\Modules\DynamicTags\Module;
use ElementorPro\Modules\Woocommerce\Tags\Base_Tag;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Better_Post_Excerpt_Tag extends Base_Tag {
    public function get_name() {
        return 'better-post-excerpt';
    }

    public function get_title() {
        return esc_html__( 'Better Post Excerpt', 'elementor-pro' );
    }

    public function get_group() {
        return Module::POST_GROUP;
    }

    protected function register_controls() {

        $this->add_control(
            'max_length',
            [
                'label' => esc_html__( 'Excerpt Length', 'elementor-pro' ),
                'type' => Controls_Manager::NUMBER,
            ]
        );
    }

    public function get_categories() {
        return [ Module::TEXT_CATEGORY ];
    }

    public function render() {
        // Allow only a real `post_excerpt` and not the trimmed `post_content` from the `get_the_excerpt` filter
        $post = get_post();

        if ( ! $post ) {
            return;
        }

        $settings = $this->get_settings_for_display();
        $max_length = (int) $settings['max_length'];
        $excerpt = get_the_excerpt();

        $excerpt = Utils::trim_words( $excerpt, $max_length ) . '...';

        echo wp_kses_post( $excerpt );
    }
}
