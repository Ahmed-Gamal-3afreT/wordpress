<?php
/**
 * Coffee Cafeteria functions and definitions
 *
 * @package Coffee Cafeteria
 */

if ( ! function_exists( 'coffee_cafeteria_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function coffee_cafeteria_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'coffee-cafeteria', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('coffee-cafeteria-homepage-thumb',true);
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'coffee-cafeteria' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	add_filter('use_widgets_block_editor', '__return_false');
	
	/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
	// Enqueue editor styles.
		add_editor_style( 'style.css' );
}
endif; // coffee_cafeteria_setup
add_action( 'after_setup_theme', 'coffee_cafeteria_setup' );


function coffee_cafeteria_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'coffee-cafeteria' ),
		'description'   => __( 'Appears on blog page sidebar', 'coffee-cafeteria' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'coffee_cafeteria_widgets_init' );

function coffee_cafeteria_enqueue_assets() {
	// Include the file.
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	// Load the theme stylesheet.
	wp_enqueue_style(
		'coffee-cafeteria',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		'1.0'
	);
	// Load the webfont.
	wp_enqueue_style(
		'oswald roboto slab',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap' ),
		array(),
		'1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'coffee_cafeteria_enqueue_assets' );

function coffee_cafeteria_scripts() {
	wp_enqueue_style( 'coffee-cafeteria-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'coffee-cafeteria-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css');
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );	
	wp_enqueue_script( 'coffee-cafeteria-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20190715', true );
	wp_enqueue_script( 'jquery-nivo-slider-js', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'coffee-cafeteria-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script( 'coffee-cafeteria-navigation', 'NavigationScreenReaderText', array() );
}
add_action( 'wp_enqueue_scripts', 'coffee_cafeteria_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function coffee_cafeteria_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'coffee_cafeteria_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/*
 * Load customize pro
 */
require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

add_filter('use_widgets_block_editor', '__return_false');