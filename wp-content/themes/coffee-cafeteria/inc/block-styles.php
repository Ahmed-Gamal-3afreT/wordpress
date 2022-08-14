<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Coffee Cafeteria 1.0
	 *
	 * @return void
	 */
	function coffee_cafeteria_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'coffee-cafeteria-columns-overlap',
				'label' => esc_html__( 'Overlap', 'coffee-cafeteria' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'coffee-cafeteria-border',
				'label' => esc_html__( 'Borders', 'coffee-cafeteria' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'coffee-cafeteria-border',
				'label' => esc_html__( 'Borders', 'coffee-cafeteria' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'coffee-cafeteria-border',
				'label' => esc_html__( 'Borders', 'coffee-cafeteria' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'coffee-cafeteria-image-frame',
				'label' => esc_html__( 'Frame', 'coffee-cafeteria' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'coffee-cafeteria-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'coffee-cafeteria' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'coffee-cafeteria-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'coffee-cafeteria' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'coffee-cafeteria-border',
				'label' => esc_html__( 'Borders', 'coffee-cafeteria' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'coffee-cafeteria-separator-thick',
				'label' => esc_html__( 'Thick', 'coffee-cafeteria' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'coffee-cafeteria-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'coffee-cafeteria' ),
			)
		);
	}
	add_action( 'init', 'coffee_cafeteria_register_block_styles' );
}
