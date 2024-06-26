<?php

namespace WTS_EAE\Modules\Twitter\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Widget_Base;
use Elementor\Plugin;
use WTS_EAE\Base\EAE_Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} //Exit if accessed directly

class Twitter extends EAE_Widget_Base {

	public function get_name() {
		return 'wts-twitter';
	}

	public function get_title() {
		return __( 'EAE - Twitter', 'wts-eae' );
	}

	public function get_icon() {
		return 'eae-icon eae-twitter-feed';
	}

	public function get_categories() {
		return [ 'wts-eae' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'section_general',
			[
				'label' => __( 'General', 'wts-eae' ),
			]
		);

		$this->add_control(
			'embed_type',
			[
				'label'   => __( 'Type', 'wts-eae' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'handle',
				'options' => [
					'handle'  => __( 'Handle', 'wts-eae' ),
					'hashtag' => __( 'Hashtag', 'wts-eae' ),
				],
			]
		);

		$this->add_control(
			'url_collection',
			[
				'label'       => __( 'Enter URL', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://twitter.com/webtechhardik', 'wts-eae' ),
				'default'     => 'https://twitter.com/TwitterDev/timelines/539487832448843776',
				'condition'   => [
					'embed_type' => 'collection',
				],

			]
		);

		$this->add_control(
			'url_profile',
			[
				'label'       => __( 'Enter URL', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://twitter.com/TwitterDev', 'wts-eae' ),
				'default'     => 'https://twitter.com/TwitterDev',
				'condition'   => [
					'embed_type' => 'profile',
				],

			]
		);

		$this->add_control(
			'url_list',
			[
				'label'       => __( 'Enter URL', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://twitter.com/webtechhardik', 'wts-eae' ),
				'default'     => 'https://twitter.com/TwitterDev/lists/national-parks',
				'condition'   => [
					'embed_type' => 'list',
				],

			]
		);

		$this->add_control(
			'url_moments',
			[
				'label'       => __( 'Enter URL', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://twitter.com/webtechhardik', 'wts-eae' ),
				'default'     => 'https://twitter.com/i/moments/625792726546558977',
				'condition'   => [
					'embed_type' => 'moments',
				],

			]
		);

		$this->add_control(
			'url_likes',
			[
				'label'       => __( 'Enter URL', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://twitter.com/webtechhardik', 'wts-eae' ),
				'default'     => 'https://twitter.com/TwitterDev/likes',
				'condition'   => [
					'embed_type' => 'likes',
				],

			]
		);

		$this->add_control(
			'username',
			[
				'label'       => __( 'Enter UserName', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( '@username', 'wts-eae' ),
				'default'     => '@TwitterDev',
				'condition'   => [
					'embed_type' => 'handle',
				],
			]
		);

		$this->add_control(
			'hashtag',
			[
				'label'       => __( 'Enter Hashtag', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( '#hashtag', 'wts-eae' ),
				'condition'   => [
					'embed_type' => 'hashtag',
				],
			]
		);

		$this->add_control(
			'display_mode_collection',
			[
				'label'     => __( 'Display Mode', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'timeline',
				'options'   => [
					'timeline' => __( 'Timeline', 'wts-eae' ),
					'grid'     => __( 'Grid', 'wts-eae' ),
				],
				'condition' => [
					'embed_type' => 'collection',
				],

			]
		);

		$this->add_control(
			'no_of_tweets',
			[
				'label'     => __( 'Display No of Tweets', 'wts-eae' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 20,
				'min'       => '2',
				'max'       => '50',
				'step'      => '1',
				'condition' => [

					'display_mode_collection' => 'grid',
					'embed_type'              => 'collection',
				],
			]
		);

		$this->add_control(
			'height_collection_timeline',
			[
				'label'     => __( 'Height', 'wts-eae' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 500,
				],
				'range'     => [
					'px' => [
						'min'  => 250,
						'max'  => 1300,
						'step' => 10,
					],
				],
				'condition' => [

					'display_mode_collection' => 'timeline',
					'embed_type'              => 'collection',
				],
			]
		);

		$this->add_control(
			'theme_collection_timeline',
			[
				'label'     => __( 'Theme', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'light',
				'options'   => [
					'light' => __( 'Light', 'wts-eae' ),
					'dark'  => __( 'Dark', 'wts-eae' ),
				],
				'condition' => [
					'display_mode_collection' => 'timeline',
					'embed_type'              => 'collection',
				],
			]
		);

		$this->add_control(
			'link_color_collection',
			[
				'label'     => __( 'Display Link Color', 'wts-eae' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'display_mode_collection' => 'timeline',
					'embed_type'              => 'collection',
				],
			]
		);

		$this->add_control(
			'display_mode_profile',
			[
				'label'     => __( 'Display Mode', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'timeline',
				'options'   => [
					'timeline' => __( 'Timeline', 'wts-eae' ),
					'button'   => __( 'Button', 'wts-eae' ),
				],
				'condition' => [
					'embed_type' => [ 'profile', 'handle' ],
				],

			]
		);

		$this->add_control(
			'height_profile_timeline',
			[
				'label'     => __( 'Height', 'wts-eae' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 500,

				],
				'range'     => [
					'px' => [
						'min'  => 250,
						'max'  => 1300,
						'step' => 10,
					],
				],
				'condition' => [

					'display_mode_profile' => 'timeline',
					'embed_type'           => [ 'profile', 'handle' ],
				],
			]
		);

		$this->add_control(
			'theme_profile_timeline',
			[
				'label'     => __( 'Theme', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'light',
				'options'   => [
					'light' => __( 'Light', 'wts-eae' ),
					'dark'  => __( 'Dark', 'wts-eae' ),
				],
				'condition' => [
					'display_mode_profile' => 'timeline',
					'embed_type'           => [ 'profile', 'handle' ],
				],
			]
		);

		$this->add_control(
			'link_color_profile',
			[
				'label'     => __( 'Display Link Color', 'wts-eae' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [

					'display_mode_profile' => 'timeline',
					'embed_type'           => [ 'profile', 'handle' ],
				],
			]
		);

		$this->add_control(
			'button_type',
			[
				'label'     => __( 'Button Type', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'follow-button',
				'options'   => [
					'follow-button'  => __( 'Follow', 'wts-eae' ),
					'mention-button' => __( 'Mention', 'wts-eae' ),
				],
				'condition' => [
					'display_mode_profile' => 'button',
					'embed_type'           => [ 'profile', 'handle' ],
				],
			]
		);

		$this->add_control(
			'hide_name',
			[
				'label'        => __( 'Hide Name', 'wts-eae' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'Show', 'wts-eae' ),
				'label_off'    => __( 'Hide', 'wts-eae' ),
				'return_value' => 'yes',
				'condition'    => [

					'display_mode_profile' => 'button',
					'button_type'          => 'follow-button',
					'embed_type'           => [ 'profile', 'handle' ],

				],
			]
		);

		$this->add_control(
			'show_count',
			[
				'label'        => __( 'Show Count', 'wts-eae' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Show', 'wts-eae' ),
				'label_off'    => __( 'Hide', 'wts-eae' ),
				'return_value' => 'yes',
				'condition'    => [
					'embed_type'           => [ 'profile', 'handle' ],
					'display_mode_profile' => 'button',
					'button_type'          => 'follow-button',

				],
			]
		);

		$this->add_control(
			'prefill_text',
			[
				'label'       => __( 'Tweet Text', 'wts-eae' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => '',
				'description' => __( 'Do you want to prefill the Tweet text?', 'wts-eae' ),
				'condition'   => [
					'embed_type'           => [ 'profile', 'handle' ],
					'display_mode_profile' => 'button',
					'button_type'          => 'mention-button',
				],

			]
		);

		$this->add_control(
			'screen_name',
			[
				'label'     => __( 'Screen Name', 'wts-eae' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'embed_type'           => [ 'profile', 'handle' ],
					'display_mode_profile' => 'button',
					'button_type'          => 'mention-button',
				],
			]
		);

		$this->add_control(
			'large_button',
			[
				'label'        => __( 'Large Button', 'wts-eae' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'Yes', 'wts-eae' ),
				'label_off'    => __( 'No', 'wts-eae' ),
				'return_value' => 'yes',
				'condition'    => [
					'embed_type'           => [ 'profile', 'handle' ],
					'display_mode_profile' => 'button',

				],
			]
		);
		$this->add_control(
			'height_list',
			[
				'label'     => __( 'Height', 'wts-eae' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 500,

				],
				'range'     => [
					'px' => [
						'min'  => 250,
						'max'  => 1300,
						'step' => 10,
					],
				],
				'condition' => [
					'embed_type' => [ 'list', 'likes' ],
				],
			]
		);

		$this->add_control(
			'theme_list',
			[
				'label'     => __( 'Theme', 'wts-eae' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'light',
				'options'   => [
					'light' => __( 'Light', 'wts-eae' ),
					'dark'  => __( 'Dark', 'wts-eae' ),
				],
				'condition' => [
					'embed_type' => [ 'list', 'likes' ],
				],
			]
		);

		$this->add_control(
			'link_color_list',
			[
				'label'     => __( 'Display Link Color', 'wts-eae' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'condition' => [
					'embed_type' => [ 'list', 'likes' ],
				],
			]
		);

		$prefill_options = [];
		if ( is_single() ) {
			$prefill_options = [
				'post_title' => __( 'Post Title', 'wts-eae' ),
				'excerpt'    => __( 'Post Excerpt', 'wts-eae' ),
			];
		}

		$prefill_options['custom'] = 'Custom';
		$this->add_control(
			'prefill_text_hashtag',
			[
				'label'       => __( 'Pre Fill Text', 'wts-eae' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'post_title',
				'options'     => $prefill_options,
				'condition'   => [
					'embed_type' => 'hashtag',
				],
				'description' => __( 'Do you want to prefill the Tweet text?', 'wts-eae' ),
			]
		);
		$this->add_control(
			'prefill_custom',
			[
				'label'     => __( 'Custom Prefill Text', 'wts-eae' ),
				'type'      => Controls_Manager::TEXTAREA,
				'condition' => [
					'prefill_text_hashtag' => 'custom',
					'embed_type'           => 'hashtag',
				],

			]
		);

		$this->add_control(
			'hashtag_url',
			[
				'label'       => __( 'Fix Url in Tweet', 'wts-eae' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'description' => __( 'Do you want to set a specific URL in the Tweet?', 'wts-eae' ),
				'condition'   => [
					'embed_type' => 'hashtag',
				],
			]
		);

		$this->add_control(
			'language',
			[
				'label'   => __( 'Language', 'wts-eae' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $this->languages(),
				'default' => '',
			]
		);

		$this->add_control(
			'hashtag_large_button',
			[
				'label'        => __( 'Large Button', 'wts-eae' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'Yes', 'wts-eae' ),
				'label_off'    => __( 'No', 'wts-eae' ),
				'return_value' => 'yes',
				'condition'    => [
					'embed_type' => 'hashtag',
				],
			]
		);
	}

	public function languages() {
		$languages = [
			''      => __( 'Automatic', 'wts-eae' ),
			'en'    => __( 'English', 'wts-eae' ),
			'ar'    => __( 'Arabic', 'wts-eae' ),
			'bn'    => __( 'Bengali', 'wts-eae' ),
			'cs'    => __( 'Czech', 'wts-eae' ),
			'da'    => __( 'Danish', 'wts-eae' ),
			'de'    => __( 'German', 'wts-eae' ),
			'el'    => __( 'Greek', 'wts-eae' ),
			'es'    => __( 'Spanish', 'wts-eae' ),
			'fa'    => __( 'Persian', 'wts-eae' ),
			'fi'    => __( 'Finnish', 'wts-eae' ),
			'fil'   => __( 'Filipino', 'wts-eae' ),
			'fr'    => __( 'French', 'wts-eae' ),
			'he'    => __( 'Hebrew', 'wts-eae' ),
			'hi'    => __( 'Hindi', 'wts-eae' ),
			'hu'    => __( 'Hungarian', 'wts-eae' ),
			'id'    => __( 'Indonesian', 'wts-eae' ),
			'it'    => __( 'Italian', 'wts-eae' ),
			'ja'    => __( 'Japanese', 'wts-eae' ),
			'ko'    => __( 'Korean', 'wts-eae' ),
			'msa'   => __( 'Malay', 'wts-eae' ),
			'nl'    => __( 'Dutch', 'wts-eae' ),
			'no'    => __( 'Norwegian', 'wts-eae' ),
			'pl'    => __( 'Polish', 'wts-eae' ),
			'pt'    => __( 'Portuguese', 'wts-eae' ),
			'ro'    => __( 'Romania', 'wts-eae' ),
			'ru'    => __( 'Rus', 'wts-eae' ),
			'sv'    => __( 'Swedish', 'wts-eae' ),
			'th'    => __( 'Thai', 'wts-eae' ),
			'tr'    => __( 'Turkish', 'wts-eae' ),
			'uk'    => __( 'Ukrainian', 'wts-eae' ),
			'ur'    => __( 'Urdu', 'wts-eae' ),
			'vi'    => __( 'Vietnamese', 'wts-eae' ),
			'zh-cn' => __( 'Chinese (Simplified)', 'wts-eae' ),
			'zh-tw' => __( 'Chinese (Traditional)', 'wts-eae' ),
		];

		return $languages;
	}

	public function render() {
		// TODO: Implement render() method.
		$settings = $this->get_settings_for_display();

		switch ( $settings['embed_type'] ) {

			case 'handle':
				$this->get_handle_html( $settings );
				break;
			case 'hashtag':
				$this->get_hashtag_html( $settings );
				break;

		}

		?>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php
	}

	public function get_handle_html( $settings ) {

		$this->add_render_attribute( 'handle', 'data-lang', $settings['language'] );
		if ( $settings['large_button'] === 'yes' ) {
			$this->add_render_attribute( 'handle', 'data-size', 'large' );
		}

		if ( $settings['display_mode_profile'] === 'timeline' ) {
			$url = esc_url('https://www.twitter.com/' . $settings['username']);
			$this->add_render_attribute( 'handle', 'href',  $url);
			$this->add_render_attribute( 'handle', 'class', 'twitter-' . esc_attr($settings['display_mode_profile']) );
			$this->add_render_attribute( 'handle', 'data-partner', 'twitter-deck' );
			$this->add_render_attribute( 'handle', 'data-height', ($settings['height_profile_timeline']['size']) );
			$this->add_render_attribute( 'handle', 'data-theme', esc_attr($settings['theme_profile_timeline']) );
			$this->add_render_attribute( 'handle', 'data-link-color', esc_attr($settings['link_color_profile']) );

		}

		if ( $settings['display_mode_profile'] === 'button' && $settings['button_type'] === 'follow-button' ) {
			$this->add_render_attribute( 'handle', 'class', esc_attr('twitter-' . $settings['button_type']) );
			$button_url = esc_url('https://www.twitter.com/' . $settings['username']);
			$this->add_render_attribute( 'handle', 'href', $button_url );
			if ( $settings['hide_name'] === 'yes' ) {
				$this->add_render_attribute( 'handle', 'data-show-screen-name', 'false' );
			}
			if ( $settings['show_count'] === '' ) {
				$this->add_render_attribute( 'handle', 'data-show-count', 'false' );
			}
		}

		if ( $settings['display_mode_profile'] === 'button' && $settings['button_type'] === 'mention-button' ) {
			$this->add_render_attribute( 'handle', 'class', esc_attr('twitter-' . $settings['button_type']) );
			$this->add_render_attribute( 'handle', 'data-text', esc_attr($settings['prefill_text']) );
			$mention_button_url = esc_url('https://www.twitter.com/intent/tweet?screen_name=' . $settings['screen_name']);
			$this->add_render_attribute( 'handle', 'href', $mention_button_url );

		}

		?>
	<a <?php echo $this->get_render_attribute_string( 'handle' ); ?> > Handle <?php echo esc_html($settings['username']); ?></a>
		<?php
	}

	public function get_hashtag_html( $settings ) {

		$this->add_render_attribute( 'hashtag', 'class', 'twitter-hashtag-button' );
		$hastag_url = esc_url('https://twitter.com/intent/tweet?button_hashtag=' . $settings['hashtag']);
		$this->add_render_attribute( 'hashtag', 'href', $hastag_url );
		$this->add_render_attribute( 'hashtag', 'data-lang', esc_attr($settings['language']) );

		if ( $settings['prefill_text_hashtag'] === 'post_title' ) {

			$this->add_render_attribute( 'hashtag', 'data-text', $this->current_post_title() );
		}
		if ( $settings['prefill_text_hashtag'] === 'excerpt' ) {

			$this->add_render_attribute( 'hashtag', 'data-text', $this->current_post_excerpt() );
		}
		if ( $settings['prefill_text_hashtag'] === 'custom' ) {
			$this->add_render_attribute( 'hashtag', 'data-text', esc_attr($settings['prefill_custom']) );
		}
		if ( $settings['hashtag_large_button'] === 'yes' ) {
			$this->add_render_attribute( 'hashtag', 'data-size', 'large' );
		}
		$this->add_render_attribute( 'hashtag', 'data-url', esc_url($settings['hashtag_url']) );

		?>
		<a <?php echo $this->get_render_attribute_string( 'hashtag' ); ?> >Tweet<?php echo esc_html($settings['hashtag']); ?> </a>
		<?php
	}

	public function current_post_title() {
		global $post;
		$title = $post->post_title;
		return $title;
	}

	public function current_post_excerpt() {
		global $post;

		if ( has_excerpt( $post->ID ) ) {
			return get_the_excerpt( $post->ID );
		}
	}

}

