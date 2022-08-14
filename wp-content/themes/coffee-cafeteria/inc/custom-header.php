<?php
/**
 * @package Coffee Cafeteria
 * Setup the WordPress core custom header feature.
 *
 * @uses coffee_cafeteria_header_style()

 */
function coffee_cafeteria_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'coffee_cafeteria_custom_header_args', array(
		'default-text-color'     => '222D3B',
		'width'                  => 1600,
		'height'                 => 700,
		'wp-head-callback'       => 'coffee_cafeteria_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'coffee_cafeteria_custom_header_setup' );

if ( ! function_exists( 'coffee_cafeteria_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see coffee_cafeteria_custom_header_setup().
 */
function coffee_cafeteria_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		#header{
			background-image: url(<?php echo esc_url(get_header_image()); ?>);
			background-position: center top;
		}
		h1.site-title a { color:#<?php echo esc_attr(get_header_textcolor()); ?>;}
	<?php endif; ?>	
	</style>
	<?php
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
    <style type="text/css">
		.logo {
			margin: 0 auto;
		}

		h1.site-title,
		p.site-description{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
    </style>
	
    <?php
	
}
endif; // coffee_cafeteria_header_style