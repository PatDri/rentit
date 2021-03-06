<?php
/*--------------------------------------------------------------
## Position
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Layout & Position Section
--------------------------------------------------------------*/

	// General
	$wp_customize->add_section('bellini_general_layout',array(
		'title' => esc_html__( 'Site Wide Layouts', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 1,
		'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Header Layout Section
	$wp_customize->add_section('bellini_header_section_layout',array(
		'title' => esc_html__( 'Header Layouts', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 2,
		'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Posts Layout
	$wp_customize->add_section('bellini_post_layout_settings',array(
			'title' => esc_html__( 'Post Layouts', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 3,
			'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Page Layout
	$wp_customize->add_section('bellini_page_layout_settings',array(
			'title' => esc_html__( 'Page Layouts', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 3,
			'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Footer Layout
	$wp_customize->add_section('bellini_layout_settings_footer',array(
			'title' => esc_html__( 'Footer Layouts', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 4,
			'panel' => 'bellini_placeholder_layout_panel'
		)
	);

	// Other Layout
	$wp_customize->add_section('bellini_layout_settings_other',array(
			'title' => esc_html__( 'Other Layouts', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 5,
			'panel' => 'bellini_placeholder_layout_panel'
		)
	);
/*--------------------------------------------------------------
## General Layout
--------------------------------------------------------------*/

	// Website Width Title
	$wp_customize->add_setting( 'bellini[bellini_website_width_layout_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_website_width_layout_helper', array(
					'type' => 'info',
					'label' => esc_html__('Website Width','bellini'),
					'section' => 'bellini_general_layout',
					'settings'    => 'bellini[bellini_website_width_layout_helper]',
					'priority'   => 1,
			)) );


	//Canvas Width
	$wp_customize->add_setting('bellini[bellini_website_width]',
			      array(
			          'default'         => '100',
			          'sanitize_callback' => 'sanitize_key',
			          'transport'       => 'postMessage',
			          'type'            => 'option'
			      )
		  );


		  $wp_customize->add_control(new WP_Customize_Control($wp_customize,'bellini_website_width',
		            array(
		                'label'          => esc_html__( 'Canvas Width', 'bellini' ),
		                'description'    => esc_html__( 'From Box to Full Width', 'bellini' ),
		                'section'        => 'bellini_general_layout',
		                'settings'       => 'bellini[bellini_website_width]',
		                'type'           => 'range',
               			'priority'   	 => 2,
		                'input_attrs' => array(
						    'min' => '0',
						    'max' => '100',
						    'step' => '5',
					  	),
		            )
		        )
		   );

	//Site Width
	$wp_customize->add_setting('bellini[bellini_canvas_width]', array(
			'type' 				=> 'option',
			'default'         	=> '1200px',
			'sanitize_callback' => 'esc_attr',
			'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control('bellini_canvas_width',array(
				'type' 			=>'text',
               'label'      	=> esc_html__( 'Site Width', 'bellini' ),
               'description' 	=> esc_html__( 'Write your width in px. Example: 1200px. Your content will be confined within this area.', 'bellini' ),
               'section'    	=> 'bellini_general_layout',
               'settings'   	=> 'bellini[bellini_canvas_width]',
               'priority'   	=> 3,
			));


/*--------------------------------------------------------------
## Header Layout
--------------------------------------------------------------*/

	// Choose Fonts Heading
	$wp_customize->add_setting( 'bellini[bellini_header_section_layout_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_header_section_layout_helper', array(
					'type' => 'info',
					'label' => esc_html__('Header Layouts','bellini'),
					'section' => 'bellini_header_section_layout',
					'settings'    => 'bellini[bellini_header_section_layout_helper]',
					'priority'   => 1,
			)) );



	// Menu Position -- Settings
	$wp_customize->add_setting( 'bellini[bellini_header_menu_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

		$wp_customize->add_control( 'bellini_header_menu_layout',array(
				'label'      => esc_html__( 'Header Layouts', 'bellini' ),
				'section'    => 'bellini_header_section_layout',
				'settings'   => 'bellini[bellini_header_menu_layout]',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
							1   => esc_html__( 'Logo + Menu', 'bellini' ),
							2  	=> esc_html__( 'Menu + Logo', 'bellini' ),
							3 	=> esc_html__( 'Logo + Menu + More..', 'bellini' ),
					),
			)
		);


	// Header Style -- Settings
	$wp_customize->add_setting( 'bellini[bellini_other_header_items_selector]' ,
		array(
			'default' 			=> 1,
			'type' 				=> 'option',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

		$wp_customize->add_control( 'bellini_other_header_items_selector',
			array(
				'label'      	=> esc_html__( 'Display More Header Items', 'bellini' ),
				'description'   => esc_html__( 'Before selecting Cart & Search, make sure you have WooCommerce installed.', 'bellini' ),
				'section'    	=> 'bellini_header_section_layout',
				'settings'   	=> 'bellini[bellini_other_header_items_selector]',
			    'priority'   	=> 3,
			    'type'       	=> 'radio',
					'choices'   => array(
							1   	=> esc_html__( 'WooCommerce Cart & Search', 'bellini' ),
							2  		=> esc_html__( 'Social Icons', 'bellini' ),
					),
			)
		);

	// Header Style -- Settings
	$wp_customize->add_setting( 'bellini[bellini_header_orientation]' ,
		array(
			'default' 			=> 'header__general',
			'type' 				=> 'option',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'sanitize_html_class',
		)
	);

		$wp_customize->add_control( 'bellini_header_orientation',
			array(
				'label'      	=> esc_html__( 'Header Section Behaviour', 'bellini' ),
				'section'    	=> 'bellini_header_section_layout',
				'settings'   	=> 'bellini[bellini_header_orientation]',
			    'priority'   	=> 4,
			    'type'       	=> 'radio',
					'choices'    => array(
						'header__general'   => esc_html__( 'Solid Color', 'bellini' ),
						'header__trans'  	=> esc_html__( 'Transparent', 'bellini' ),
					),
			)
		);

/*--------------------------------------------------------------
## Header Menu Layout
--------------------------------------------------------------*/

	// Choose Fonts Heading
	$wp_customize->add_setting( 'bellini[bellini_header_menu_layout_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_header_menu_layout_helper', array(
					'type' => 'info',
					'label' => esc_html__('Header Menu','bellini'),
					'section' => 'bellini_header_section_layout',
					'settings'    => 'bellini[bellini_header_menu_layout_helper]',
					'priority'   => 6,
			)) );


	// Header Menu Layout
	$wp_customize->add_setting( 'bellini[bellini_menu_layout]' ,
		array(
			'default' => 'general',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_menu_layout',array(
				'label'      => esc_html__( 'Header Navigation Type', 'bellini' ),
				'section'    => 'bellini_header_section_layout',
				'settings'   => 'bellini[bellini_menu_layout]',
			    'priority'   => 7,
			    'type'       => 'radio',
				'choices'    => array(
					'general'   => esc_html__( 'Full Menu', 'bellini' ),
					'hamburger'  => esc_html__( 'Hamburger Icon', 'bellini' ),
				),
			)
		);


	// Menu Position -- Settings
	$wp_customize->add_setting( 'bellini[bellini_menu_position]' ,
		array(
			'default' => 'right',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_menu_position',array(
				'label'      => esc_html__( 'Navigation Alignment', 'bellini' ),
				'section'    => 'bellini_header_section_layout',
				'settings'   => 'bellini[bellini_menu_position]',
			    'priority'   => 8,
			    'type'       => 'radio',
				'choices'    => array(
					'left'   => esc_html__( 'Left', 'bellini' ),
					'right'  => esc_html__( 'Right', 'bellini' ),
					'center' => esc_html__( 'Center', 'bellini' ),
				),
			)
		);


/*--------------------------------------------------------------
## Post Layout
--------------------------------------------------------------*/


	// Blog Posts Layout
	$wp_customize->add_setting( 'bellini[bellini_layout_blog]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_layout_blog',array(
				'label'      => esc_html__( 'Blog Posts Layout', 'bellini' ),
				'description' => esc_html__( 'Applies to Index, Blog page template, category and archive post list.', 'bellini' ),
				'section'    => 'bellini_post_layout_settings',
				'settings'   => 'bellini[bellini_layout_blog]',
			    'priority'   => 1,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
					5   => esc_html__( 'Layout 5', 'bellini' ),
				),
			)
		);

	// Single Posts Layout
	$wp_customize->add_setting( 'bellini[bellini_layout_single-post]' ,
		array(
			'default' => 3,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

		$wp_customize->add_control( 'bellini_layout_single-post',array(
				'label'      => esc_html__( 'Single Post Layout', 'bellini' ),
				'section'    => 'bellini_post_layout_settings',
				'settings'   => 'bellini[bellini_layout_single-post]',
			    'priority'   => 2,
			    'type'       => 'radio',
				'choices'    => array(
					3   => esc_html__( 'Layout 3', 'bellini' ),
				),
			)
		);


/*--------------------------------------------------------------
## Page Layout
--------------------------------------------------------------*/

	// Page Title Position -- Settings
	$wp_customize->add_setting( 'bellini[page_title_position]' ,
		array(
			'default' => 'center',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'page_title_position',array(
				'label'      => esc_html__( 'Page Title Alignment', 'bellini' ),
				'section'    => 'bellini_page_layout_settings',
				'settings'   => 'bellini[page_title_position]',
			    'priority'   => 2,
			    'type'       => 'radio',
				'choices'    => array(
					'left'   => esc_html__( 'Left', 'bellini' ),
					'right'  => esc_html__( 'Right', 'bellini' ),
					'center' => esc_html__( 'Center', 'bellini' ),
				),
			)
		);


/*--------------------------------------------------------------
## Footer Layout
--------------------------------------------------------------*/

	// Footer Layout
	$wp_customize->add_setting( 'bellini[bellini_footer_layout_type]' ,
		array(
			'default' 			=> 2,
			'type' 				=> 'option',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

		$wp_customize->add_control( 'bellini_footer_layout_type',
			array(
				'label'      	=> esc_html__( 'Footer Layout', 'bellini' ),
				'section'    	=> 'bellini_layout_settings_footer',
				'settings'   	=> 'bellini[bellini_footer_layout_type]',
			    'priority'   	=> 1,
			    'type'       	=> 'radio',
					'choices'   => array(
								2   => esc_html__( 'Layout 2', 'bellini' ),
					),
			)
		);


	// Footer Widget Column
	$wp_customize->add_setting( 'bellini[bellini_footer_widget_column_selector]' ,
		array(
			'default' 			=> 3,
			'type' 				=> 'option',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

		$wp_customize->add_control( 'bellini_footer_widget_column_selector',
			array(
				'label'      	=> esc_html__( 'Footer Widget Columns', 'bellini' ),
				'description'   => esc_html__( 'Display the footer widgets in 1, 2, 3 or 4 columns', 'bellini' ),
				'section'    	=> 'bellini_layout_settings_footer',
				'settings'   	=> 'bellini[bellini_footer_widget_column_selector]',
			    'priority'   	=> 2,
			    'type'       	=> 'select',
					'choices'   => array(
								1   => esc_html__( '1 Column', 'bellini' ),
								2  	=> esc_html__( '2 Columns', 'bellini' ),
								3  	=> esc_html__( '3 Columns', 'bellini' ),
								4  	=> esc_html__( '4 Columns', 'bellini' ),
					),
			)
		);

/*--------------------------------------------------------------
## Other Layout
--------------------------------------------------------------*/

	// Pagination Layout
	$wp_customize->add_setting( 'bellini[bellini_blog_pagination_type]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_blog_pagination_type',array(
				'label'      => esc_html__( 'Pagination Type', 'bellini' ),
				'description' => sprintf( __( 'Before selecting WP PageNavi, make sure you have <a target="_blank" href="%s">WP PageNavi</a> installed.', 'bellini' ),esc_url( 'https://wordpress.org/plugins/wp-pagenavi/' )),
				'section'    => 'bellini_layout_settings_other',
				'settings'   => 'bellini[bellini_blog_pagination_type]',
			    'priority'   => 1,
			    'type'       => 'select',
				'choices'    => array(
					1   => esc_html__( 'Next / Previous', 'bellini' ),
					2   => esc_html__( 'Numeric 1 2 3', 'bellini' ),
					3   => esc_html__( 'WP PageNavi', 'bellini' ),
				),
			)
		);

	// Breadcrumb Type
	$wp_customize->add_setting( 'bellini[bellini_page_breadcrumb_type]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_page_breadcrumb_type',array(
				'label'      => esc_html__( 'Breadcrumb Type', 'bellini' ),
				'description' => sprintf( __( 'Before selecting Breadcrumb NavXT, make sure you have <a target="_blank" href="%s">Breadcrumb NavXT</a> plugin installed.', 'bellini' ),esc_url( 'https://wordpress.org/plugins/breadcrumb-navxt/' )),
				'section'    => 'bellini_layout_settings_other',
				'settings'   => 'bellini[bellini_page_breadcrumb_type]',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
					1   => esc_html__( 'Breadcrumb NavXT', 'bellini' ),
					2   => esc_html__( 'Yoast Breadcrumb', 'bellini' ),
					3   => esc_html__( 'WooCommerce Breadcrumb', 'bellini' ),
				),
			)
		);