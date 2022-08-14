<?php
/**
 * Coffee Cafeteria Theme Customizer
 *
 * @package Coffee Cafeteria
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function coffee_cafeteria_customize_register( $wp_customize ) {
	
	function coffee_cafeteria_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->tranport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tranport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'coffee_cafeteria_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'coffee_cafeteria_customize_partial_blogdescription',
	) );
	
	/***************************************
	** Color Scheme
	***************************************/
	$wp_customize->add_setting('cafe_headerbg_color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'cafe_headerbg_color',array(
			'label' => __('Header Background color','coffee-cafeteria'),
			'description'	=> __('Select background color for header.','coffee-cafeteria'),
			'section' => 'colors',
			'settings' => 'cafe_headerbg_color'
		))
	);

	$wp_customize->add_setting('color_scheme', array(
		'default' => '#C19977',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','coffee-cafeteria'),
			'description' => __('Select theme main color from here.','coffee-cafeteria'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('sub_color_scheme', array(
		'default' => '#222D3B',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'sub_color_scheme',array(
			'label' => __('Sub Color Scheme','coffee-cafeteria'),
			'description' => __('Select theme sub color from here.','coffee-cafeteria'),
			'section' => 'colors',
			'settings' => 'sub_color_scheme'
		))
	);

	$wp_customize->add_setting('cafe_footer_color', array(
		'default' => '#222D3B',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'cafe_footer_color',array(
			'label' => __('Footer Background Color','coffee-cafeteria'),
			'description' => __('Select background color for footer.','coffee-cafeteria'),
			'section' => 'colors',
			'settings' => 'cafe_footer_color'
		))
	);

	/***************************************
	** Registerd Theme Setup Panel
	***************************************/
	$wp_customize->add_panel( 'cafe_theme_panel',
		array(
			'title'            => __( 'Theme Setup', 'coffee-cafeteria' ),
			'description'      => __( 'Theme Modifications like color scheme, header info, slider and sections can be done here', 'coffee-cafeteria' ),
		)
	);

	/***************************************
	** Top Header Section
	***************************************/
	$wp_customize->add_section(
		'cafe_head_top',
		array(
			'title' => __('Top Header Bar', 'coffee-cafeteria'),
			'priority' => null,
			'description'	=> __('Add top header bar information here.','coffee-cafeteria'),
			'panel' => 'cafe_theme_panel',
		)
	);

	$wp_customize->add_setting('head_top_add',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('head_top_add',array(
		'label'	=> __('Add Address Here.','coffee-cafeteria'),
		'section'	=> 'cafe_head_top',
		'setting'	=> 'head_top_add',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('head_top_mail',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('head_top_mail',array(
		'label'	=> __('Add Email Address Here.','coffee-cafeteria'),
		'section'	=> 'cafe_head_top',
		'setting'	=> 'head_top_mail',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('head_top_phn',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('head_top_phn',array(
		'label'	=> __('Add phone number Here.','coffee-cafeteria'),
		'section'	=> 'cafe_head_top',
		'setting'	=> 'head_top_phn',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('head_top_fb',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('head_top_fb',array(
		'type'	=> 'text',
		'label'	=> __('Add facebook account link here','coffee-cafeteria'),
		'section'	=> 'cafe_head_top'
	));
	
	$wp_customize->add_setting('head_top_tw',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('head_top_tw',array(
		'type'	=> 'text',
		'label'	=> __('Add twitter account link here','coffee-cafeteria'),
		'section'	=> 'cafe_head_top'
	));
	
	$wp_customize->add_setting('head_top_ins',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('head_top_ins',array(
		'type'	=> 'text',
		'label'	=> __('Add instagram account link here','coffee-cafeteria'),
		'section'	=> 'cafe_head_top'
	));
	
	$wp_customize->add_setting('head_top_pin',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('head_top_pin',array(
		'type'	=> 'text',
		'label'	=> __('Add pinterest account link here','coffee-cafeteria'),
		'section'	=> 'cafe_head_top'
	));
	
	$wp_customize->add_setting('head_top_yt',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('head_top_yt',array(
		'type'	=> 'text',
		'label'	=> __('Add youtube account link here','coffee-cafeteria'),
		'section'	=> 'cafe_head_top'
	));

	$wp_customize->add_setting('hide_head_top',array(
		'default' => true,
		'sanitize_callback' => 'coffee_cafeteria_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_head_top', array(
	   'settings' => 'hide_head_top',
	   'section'   => 'cafe_head_top',
	   'label'     => __('Check this to hide top header bar.','coffee-cafeteria'),
	   'type'      => 'checkbox'
	));

	$wp_customize->selective_refresh->add_partial('head_top_add', array(
        'selector' => '.top-header-col.icon-add'
    ));

	$wp_customize->selective_refresh->add_partial('head_top_mail', array(
        'selector' => '.top-header-col.icon-mail'
    ));

	$wp_customize->selective_refresh->add_partial('head_top_phn', array(
        'selector' => '.top-header-col.icon-tel'
    ));
	
	$wp_customize->selective_refresh->add_partial('head_top_fb', array(
        'selector' => '.top-header-col .social-icons'
    ));

	/***************************************
	** Header Button Section
	***************************************/
	$wp_customize->add_section(
		'cafe_head_btn',
		array(
			'title' => __('Header Button', 'coffee-cafeteria'),
			'priority' => null,
			'description'	=> __('Add header button text and header button link here','coffee-cafeteria'),
			'panel' => 'cafe_theme_panel',
		)
	);

	$wp_customize->add_setting('head_btn_txt',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('head_btn_txt',array(
		'label'	=> __('Add header button text / lable here.','coffee-cafeteria'),
		'section'	=> 'cafe_head_btn',
		'setting'	=> 'head_btn_txt',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('head_btn_lnk',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('head_btn_lnk',array(
		'label'	=> __('Add header button link here.','coffee-cafeteria'),
		'section'	=> 'cafe_head_btn',
		'setting'	=> 'head_btn_lnk',
		'type'	=> 'text'
	));

	$wp_customize->selective_refresh->add_partial('head_btn_txt', array(
        'selector' => '.header-button'
    ));

	/***************************************
	** Slider Section
	***************************************/
	$wp_customize->add_section(
		'cafe_theme_slider',
		array(
			'title' => __('Theme Slider', 'coffee-cafeteria'),
			'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','coffee-cafeteria'),
			'panel' => 'cafe_theme_panel',
		)
	);

	$wp_customize->add_setting('slide1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','coffee-cafeteria'),
			'section'	=> 'cafe_theme_slider'
	));

	$wp_customize->add_setting('slide2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','coffee-cafeteria'),
			'section'	=> 'cafe_theme_slider'
	));

	$wp_customize->add_setting('slide3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','coffee-cafeteria'),
			'section'	=> 'cafe_theme_slider'
	));

	$wp_customize->add_setting('slide_more',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('slide_more',array(
		'label'	=> __('Add slider link button text.','coffee-cafeteria'),
		'section'	=> 'cafe_theme_slider',
		'setting'	=> 'slide_more',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('cafe_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'coffee_cafeteria_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'cafe_hide_slider', array(
	   'settings' => 'cafe_hide_slider',
	   'section'   => 'cafe_theme_slider',
	   'label'     => __('Check this to hide slider.','coffee-cafeteria'),
	   'type'      => 'checkbox'
	));

	/***************************************
	** Features Section
	***************************************/
	$wp_customize->add_section(
		'cafe_feat_sec',
		array(
			'title' => __('Features Section', 'coffee-cafeteria'),
			'priority' => null,
			'description'	=> __('Select pages for homepage first section. This section will be displayed only when you select the static front page.','coffee-cafeteria'),
			'panel' => 'cafe_theme_panel',
		)
	);

	$wp_customize->add_setting('featsec_ttl',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('featsec_ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add section title here','coffee-cafeteria'),
		'section'	=> 'cafe_feat_sec'
	));

	$wp_customize->add_setting('feat1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first column','coffee-cafeteria'),
		'section'	=> 'cafe_feat_sec'
	));

	$wp_customize->add_setting('feat2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second column','coffee-cafeteria'),
		'section'	=> 'cafe_feat_sec'
	));

	$wp_customize->add_setting('feat3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third column','coffee-cafeteria'),
		'section'	=> 'cafe_feat_sec'
	));

	$wp_customize->add_setting('feat4',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat4',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for fourth column','coffee-cafeteria'),
		'section'	=> 'cafe_feat_sec'
	));

	$wp_customize->add_setting('cafe_hide_feat',array(
		'default' => true,
		'sanitize_callback' => 'coffee_cafeteria_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cafe_hide_feat', array(
	   'settings' => 'cafe_hide_feat',
	   'section'   => 'cafe_feat_sec',
	   'label'     => __('Check this to hide features section.','coffee-cafeteria'),
	   'type'      => 'checkbox'
	));

	/***************************************
	** About Section
	***************************************/
	$wp_customize->add_section(
		'cafe_intro_sec',
		array(
			'title' => __('About us Section', 'coffee-cafeteria'),
			'priority' => null,
			'description'	=> __('Select page for homepage first section. This section will be displayed only when you select the static front page.','coffee-cafeteria'),
			'panel' => 'cafe_theme_panel',
		)
	);
	
	$wp_customize->add_setting('cafe_intro',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('cafe_intro',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for display first section','coffee-cafeteria'),
		'section'	=> 'cafe_intro_sec'
	));
	
	$wp_customize->selective_refresh->add_partial('cafe_intro', array(
        'selector' => '.intro-content'
    ));
	
	$wp_customize->add_setting('intro_more',array(
		'default'	=> __('','coffee-cafeteria'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('intro_more',array(
		'label'	=> __('Add read more button text.','coffee-cafeteria'),
		'section'	=> 'cafe_intro_sec',
		'setting'	=> 'intro_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('cafe_hide_intro',array(
		'default' => true,
		'sanitize_callback' => 'coffee_cafeteria_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'cafe_hide_intro', array(
	   'settings' => 'cafe_hide_intro',
	   'section'   => 'cafe_intro_sec',
	   'label'     => __('Check this to hide first section.','coffee-cafeteria'),
	   'type'      => 'checkbox'
	));
}
add_action( 'customize_register', 'coffee_cafeteria_customize_register' );

function coffee_cafeteria_css_func(){ ?>
<style>
	#header{
		background-color:<?php echo esc_attr(get_theme_mod('cafe_headerbg_color','#ffffff')); ?>;
	}
	a,
	.tm_client strong,
	.postmeta a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.blog-date .date,
	p.site-description,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover,
	.sitenav ul li.current_page_item ul li a:hover,
	h2.section_title span{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#C19977'));?>;
	}
	h3.widget-title,
	.nav-links .page-numbers.current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	input[type="submit"].search-submit,
	.nivo-controlNav a,
	.top-header-col:nth-of-type(even),
	.cafe-slider .inner-caption .sliderbtn:hover,
	.read-more a,
	.imagebox-data h3:before,
	.imagebox-more a{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#C19977')); ?>;
	}
	h2.section_title span:before,
	h2.section_title span:after,
	.inner-header{
		border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#C19977')); ?>;
	}
	a:hover,
	#sidebar ul li a:hover,
	h2.section_title,
	.sitenav ul li a,
	.sitenav ul li.current_page_item ul li a{
		color:<?php echo esc_attr(get_theme_mod('sub_color_scheme','#222D3B')); ?>;
	}
	input[type="submit"].search-submit:hover,
	input[type="submit"].search-submit:focus,
	.nav-links .page-numbers,
	.top-header,
	.cafe-slider .inner-caption .sliderbtn,
	.read-more a:hover,
	.nivo-controlNav a.active,
	.imagebox-more a:hover{
		background-color:<?php echo esc_attr(get_theme_mod('sub_color_scheme','#222D3B')); ?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('cafe_footer_color','#222D3B')); ?>;
	}
</style>
<?php }
add_action('wp_head','coffee_cafeteria_css_func');

function coffee_cafeteria_customize_preview_js() {
	wp_enqueue_script( 'coffee-cafeteria-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'coffee_cafeteria_customize_preview_js' );