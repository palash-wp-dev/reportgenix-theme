<?php
/**
 * Theme Options
 * @Packange Xgenious
 * @since 1.0.0
 */
if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}
// Control core classes for avoid errors
if( class_exists('CSF') ) {

	$allowed_html = Xgenious()->kses_allowed_html(array('mark'));
	$prefix = 'xgenious';
	// Create options
	CSF::createOptions( $prefix.'_theme_options', array(
		'menu_title' => esc_html__('Theme Options','xgenious'),
		'menu_slug'  => 'xgenious-theme-settings',
		'menu_parent'  => 'xgenious_theme_options',
		'menu_type' => 'submenu',
		'footer_credit' => ' ',
		'menu_icon' => 'fa fa-filter',
		'show_footer' => false,
		'enqueue_webfont' => false,
		'show_search'        => false,
		'show_reset_all'     => true,
		'show_reset_section' => false,
		'show_all_options'   => false,
		'theme' => 'dark',
		'framework_title' =>  Xgenious()->get_theme_info('name').'<a href="'.Xgenious()->get_theme_info('author_uri').'" class="author_link">'.'<span>'.esc_html__('Author - ','xgenious').' </span>'.Xgenious()->get_theme_info('author').'</a>'
	) );

	/*-------------------------------------------------------
		** General  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix.'_theme_options', array(
		'title'  => esc_html__('General','xgenious'),
		'id' => 'general_options',
		'icon'  => 'fa fa-wrench',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Preloader Options','xgenious').'</h3>'
			),
			array(
				'id' => 'preloader_enable',
				'title' => esc_html__('Preloader','xgenious'),
				'type' => 'switcher',
				'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader','xgenious'),$allowed_html),
				'default' => true,
			),
			array(
				'id' => 'preloader_bg_color',
				'title' => esc_html__('Background Color','xgenious'),
				'type' => 'color',
				'default' => '#ffffff',
				'desc' => wp_kses(__('you can set <mark>overlay color</mark> for breadcrumb background image','xgenious'),$allowed_html),
				'dependency' => array('preloader_enable','==','true')
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Back Top Options','xgenious').'</h3>'
			),
			array(
				'id' => 'back_top_enable',
				'title' => esc_html__('Back Top','xgenious'),
				'type' => 'switcher',
				'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
				'default' => true,
			),
			array(
				'id' => 'back_top_icon',
				'title' => esc_html__('Back Top Icon','xgenious'),
				'type' => 'icon',
				'default' => 'fa fa-angle-up',
				'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.','xgenious'),$allowed_html),
				'dependency' => array('back_top_enable','==','true')
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Product Archive Page Featured Product Options','xgenious').'</h3>'
			),
			 array(
                'id'    => 'enable_featured_product',
                'type'  => 'switcher',
                'title' => 'Enable Featured Product',
                'default' => false
              ),
			array(
                'id'    => 'featured_product_elementor_template',
                'type'  => 'select',
                'title' => 'Select Elementor Template',
                'options' => Xgenious()->get_post_list_by_post_type('megamenu')
            )
		)
	) );
	/*-------------------------------------------------------
	   ** Entire Site Header  Options
   --------------------------------------------------------*/
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'headers_settings',
		'title' => esc_html__('Headers Settings','xgenious'),
		'icon' => 'fa fa-header'
	));
	/* Header Style 01 */
	CSF::createSection( $prefix.'_theme_options', array(
		'title'  => esc_html__('Header One','xgenious'),
		'id' => 'theme_header_one_options',
		'icon' => 'fa fa-image',
		'parent' => 'headers_settings',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Logo Options','xgenious').'</h3>'
			),
			array(
				'id'      => 'header_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo','xgenious'),
				'library' => 'image',
				'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo','xgenious'),$allowed_html),
			),
			array(
				'id'      => 'header_white_logo',
				'type'    => 'media',
				'title'   => esc_html__('White Logo','xgenious'),
				'library' => 'image',
				'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded white logo','xgenious'),$allowed_html),
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Navbar Button Options','xgenious').'</h3>'
			),
			array(
				'id' => 'navbar_button_enable',
				'title' => esc_html__('Navbar Button','xgenious'),
				'type' => 'switcher',
				'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
				'default' => true,
			),
			array(
				'id'      => 'navbar_button_text',
				'type'    => 'text',
				'title'   => esc_html__('Button Text','xgenious'),
				'default' => __('My Account','xgenious')
			),
			array(
				'id'      => 'navbar_button_link',
				'type'    => 'select',
				'title'   => esc_html__('Button Page','xgenious'),
				'options' => Xgenious()->get_post_list_by_post_type('page')
			),


			array(
				'id' => 'navbar_button_two_enable',
				'title' => esc_html__('Navbar Button Two','xgenious'),
				'type' => 'switcher',
				'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
				'default' => true,
			),
			array(
				'id'      => 'navbar_button_two_text',
				'type'    => 'text',
				'title'   => esc_html__('Button Text Two','xgenious'),
				'default' => __('My Account','xgenious')
			),
			array(
				'id'      => 'navbar_button_two_link',
				'type'    => 'select',
				'title'   => esc_html__('Button Page Two','xgenious'),
				'options' => Xgenious()->get_post_list_by_post_type('page')
			)
		)
	));
	
	/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix.'_theme_options', array(
		'title'  => esc_html__('Footer','xgenious'),
		'id' => 'footer_options',
		'icon' => 'fa fa-copyright',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Options','xgenious').'</h3>'
			),
			array(
				'id' => 'newsletter_title',
				'title' => esc_html__('Newsletter Title','xgenious'),
				'type' => 'text',
				'desc' => wp_kses(__('use {c}color with anchor{/c} , use {b}break into new line{/b}','xgenious'),$allowed_html)
			),
			array(
				'id' => 'newsletter_link',
				'title' => esc_html__('Newsletter Link','xgenious'),
				'type' => 'text',
				'desc' => wp_kses(__('news letter link','xgenious'),$allowed_html)
			),
			array(
				'id' => 'newsletter_form',
				'title' => esc_html__('Newsletter Form','xgenious'),
				'type' => 'textarea',
				'desc' => wp_kses(__('use shortcode here ','xgenious'),$allowed_html)
			),


            // footer banner buttons
            array(
                'type' => 'subheading',
                'content' =>'<h3>'.esc_html__('Footer Banner Area','xgenious').'</h3>'
            ),

            array(
                'id'      => 'footer_area_title',
                'type'    => 'text',
                'title'   => esc_html__('Footer Area Title','xgenious'),
                'default' => __('Try it for 07 days!','xgenious')
            ),


            array(
                'id' => 'footer_button_one_enable',
                'title' => esc_html__('Footer Button One','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
            array(
                'id'      => 'footer_button_one_text',
                'type'    => 'text',
                'title'   => esc_html__('Footer Button One Text','xgenious'),
                'default' => __('My Account','xgenious')
            ),
            array(
                'id' => 'footer_button_one_link',
                'title' => esc_html__('Footer Button One Link','xgenious'),
                'type' => 'text',
                'desc' => wp_kses(__('footer button one link','xgenious'),$allowed_html)
            ),

            array(
                'id' => 'footer_button_two_enable',
                'title' => esc_html__('Footer Button Two','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
            array(
                'id'      => 'footer_button_two_text',
                'type'    => 'text',
                'title'   => esc_html__('Footer Button Two Text','xgenious'),
                'default' => __('My Account','xgenious')
            ),
            array(
                'id' => 'footer_button_two_link',
                'title' => esc_html__('Footer Button Two Link','xgenious'),
                'type' => 'text',
                'desc' => wp_kses(__('footer button two link','xgenious'),$allowed_html)
            ),
            //

			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Copyright Area Options','xgenious').'</h3>'
			),
			array(
				'id' => 'copyright_area_spacing',
				'title' => esc_html__('Copyright Area Spacing','xgenious'),
				'type' => 'switcher',
				'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing','xgenious'),$allowed_html),
				'default' => true,
			),
			array(
				'id' => 'copyright_text',
				'title' => esc_html__('Copyright Area Text','xgenious'),
				'type' => 'text',
				'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ','xgenious'),$allowed_html)
			),
			array(
				'id' => 'copyright_area_top_spacing',
				'title' => esc_html__('Copyright Area Top Spacing','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area top','xgenious'),$allowed_html),
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'unit' => 'px',
				'default' => 20,
				'dependency' => array('copyright_area_spacing' ,'==','true')
			),
			array(
				'id' => 'copyright_area_bottom_spacing',
				'title' => esc_html__('Copyright Area Bottom Spacing','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom','xgenious'),$allowed_html),
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'unit' => 'px',
				'default' => 20,
				'dependency' => array('copyright_area_spacing' ,'==','true')
			),
		)
	));
	/*-------------------------------------------------------
		  ** Blog  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'blog_settings',
		'title' => esc_html__('Blog Settings','xgenious'),
		'icon' => 'fa fa-rss'
	));
	CSF::createSection($prefix.'_theme_options',array(
		'parent' => 'blog_settings',
		'id' => 'blog_post_options',
		'title' => esc_html__('Blog Post','xgenious'),
		'icon' => 'fa fa-list-ul',
		'fields' => Xgenious_Group_Fields::post_meta('blog_post',esc_html__('Blog Page','xgenious'))
	));
	CSF::createSection($prefix.'_theme_options',array(
		'parent' => 'blog_settings',
		'id' => 'blog_single_post_options',
		'title' => esc_html__('Single Post','xgenious'),
		'icon' => 'fa fa-list-alt',
		'fields' => Xgenious_Group_Fields::post_meta('blog_single_post',esc_html__('Blog Single Page','xgenious'))
	));

    /*-------------------------------------------------------
		  ** Show Author Social Profile Links
   --------------------------------------------------------*/
    // Create a section for user profile link
    CSF::createSection( $prefix.'_theme_options', array(
        'title'  => 'User profile link',
        'fields' => array(
            array(
                'id'    => 'enable_user_profile_link',
                'type'  => 'switcher',
                'title' => 'Enable User Profile Link',
                'default' => true,
            ),
        )
    ) );

	/*-------------------------------------------------------
		  ** Pages & templates  Options
   --------------------------------------------------------*/
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'pages_and_template',
		'title' => esc_html__('Pages Settings','xgenious'),
		'icon' => 'fa fa-files-o'
	));
	/*  404 page options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => '404_page',
		'title' => esc_html__('404 Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' => '<h3>'.esc_html__('404 Page Options','xgenious').'</h3>',
			),
			array(
				'id' => '404_bg_color',
				'type' => 'color',
				'title' => esc_html__('Page Background Color','xgenious'),
				'default' => '#ffffff'
			),
			array(
				'id' =>'404_title',
				'title' => esc_html__('Title','xgenious'),
				'type' => 'text',
				'info' => wp_kses(__('you can change <mark>title</mark> of 404 page' ,'xgenious'),$allowed_html),
				'attributes' => array('placeholder'=>esc_html__('404','xgenious'))
			),
			array(
				'id' => '404_subtitle',
				'title' => esc_html__('Sub Title','xgenious'),
				'type' => 'text',
				'info' => wp_kses(__('you can change <mark>sub title</mark> of 404 page' ,'xgenious'),$allowed_html),
				'attributes' => array('placeholder'=>esc_html__('Oops! That page can’t be found.','xgenious'))
			),
			array(
				'id' => '404_paragraph',
				'title' => esc_html__('Paragraph','xgenious'),
				'type' => 'textarea',
				'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page' ,'xgenious'),$allowed_html),
				'attributes' => array('placeholder'=>esc_html__('It looks like nothing was found at this location. Maybe try one of the links below or a search?','xgenious'))
			),
			array(
				'id' => '404_button_text',
				'title' => esc_html__('Button Text','xgenious'),
				'type' => 'text',
				'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page' ,'xgenious'),$allowed_html),
				'attributes' => array('placeholder'=>esc_html__('back to home','xgenious'))
			),
			array(
				'id' => '404_spacing_top',
				'title' => esc_html__('Page Spacing Top','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.','xgenious'),$allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
			array(
				'id' => '404_spacing_bottom',
				'title' => esc_html__('Page Spacing Bottom','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.','xgenious'),$allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
		)
	));
	/*  blog page options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'blog_page',
		'title' => esc_html__('Blog Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-indent',
		'fields' => Xgenious_Group_Fields::page_layout_options(esc_html__('Blog','xgenious'),'blog')
	));
	/*  blog single page options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'blog_single_page',
		'title' => esc_html__('Blog Single Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-indent',
		'fields' => Xgenious_Group_Fields::page_layout_options(esc_html__('Blog Single','xgenious'),'blog_single')
	));
	/*  archive page options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'archive_page',
		'title' => esc_html__('Archive Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-archive',
		'fields' => Xgenious_Group_Fields::page_layout_options(esc_html__('Archive','xgenious'),'archive')
	));
	/*  search page options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'search_page',
		'title' => esc_html__('Search Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-search',
		'fields' => Xgenious_Group_Fields::page_layout_options(esc_html__('Search','xgenious'),'search')
	));
	/*  download archive options */
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'download_archive_page',
		'title' => esc_html__('Download Archive Page','xgenious'),
		'parent' => 'pages_and_template',
		'icon' => 'fa fa-check-square-o',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' => '<h3>'.esc_html__('Download Archive Page Page Options','xgenious').'</h3>',
			),
			array(
				'id' => 'download_archive_item',
				'type' => 'text',
				'title' => esc_html__('Archive Page Items','xgenious'),
				'default' => '9'
			),
			array(
				'id' => 'download_archive_bg_color',
				'type' => 'color',
				'title' => esc_html__('Page Background Color','xgenious'),
				'default' => '#ffffff'
			),
			array(
				'id' => 'download_archive_spacing_top',
				'title' => esc_html__('Page Spacing Top','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.','xgenious'),$allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
			array(
				'id' => 'download_archive_spacing_bottom',
				'title' => esc_html__('Page Spacing Bottom','xgenious'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.','xgenious'),$allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			)
		)
	));


	// /*-------------------------------------------------------
	// 	   ** Typography  Options
	// --------------------------------------------------------*/
	// CSF::createSection($prefix.'_theme_options',array(
	// 	'id' => 'typography',
	// 	'title' => esc_html__('Typography','xgenious'),
	// 	'icon' => 'fa fa-text-width',
	// 	'fields' => array(
	// 		array(
	// 			'type' => 'subheading',
	// 			'content' => '<h3>'.esc_html__('Body Font Options','xgenious').'</h3>',
	// 		),
	// 		array(
	// 			'type' => 'typography',
	// 			'title' => esc_html__('Typography','xgenious'),
	// 			'id' => '_body_font',
	// 			'default' => array(
	// 				'font-family' => 'Manrope',
	// 				'font-size'   => '16',
	// 				'line-height' => '26',
	// 				'unit'        => 'px',
	// 				'type'        => 'google',
	// 			),
	// 			'color' => false,
	// 			'subset' => false,
	// 			'text_align' => false,
	// 			'text_transform' => false,
	// 			'letter_spacing' => false,
	// 			'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)','xgenious'),$allowed_html),
	// 		),
	// 		array(
	// 			'id'          => 'body_font_variant',
	// 			'type'        => 'select',
	// 			'title'       => esc_html__('Load Font Variant','xgenious'),
	// 			'multiple'    => true,
	// 			'chosen'      => true,
	// 			'options' => array(
	// 				'300' => esc_html__('Light 300','xgenious'),
	// 				'400' => esc_html__('Regular 400','xgenious'),
	// 				'500' => esc_html__('Medium 500','xgenious'),
	// 				'600' => esc_html__('Semi Bold 600','xgenious'),
	// 				'700' => esc_html__('Bold 700','xgenious'),
	// 				'800' => esc_html__('Extra Bold 800','xgenious'),
	// 			),
	// 			'default'     => array('400','700')
	// 		),
	// 		array(
	// 			'type' => 'subheading',
	// 			'content' => '<h3>'.esc_html__('Heading Font Options','xgenious').'</h3>',
	// 		),
	// 		array(
	// 			'type' => 'switcher',
	// 			'id' => 'heading_font_enable',
	// 			'title' => esc_html__('Heading Font','xgenious'),
	// 			'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font','xgenious'),$allowed_html),
	// 			'default' => false
	// 		),
	// 		array(
	// 			'type' => 'typography',
	// 			'title' => esc_html__('Typography','xgenious'),
	// 			'id' => 'heading_font',
	// 			'default' => array(
	// 				'font-family' => 'IBM Plex Sans',
	// 				'type'        => 'google',
	// 			),
	// 			'color' => false,
	// 			'subset' => false,
	// 			'text_align' => false,
	// 			'text_transform' => false,
	// 			'letter_spacing' => false,
	// 			'font_size' => false,
	// 			'line_height' => false,
	// 			'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6','xgenious'),$allowed_html),
	// 			'dependency' => array('heading_font_enable' ,'==','true')
	// 		),
	// 		array(
	// 			'id'          => 'heading_font_variant',
	// 			'type'        => 'select',
	// 			'title'       => esc_html__('Load Font Variant','xgenious'),
	// 			'multiple'    => true,
	// 			'chosen'      => true,
	// 			'options' => array(
	// 				'300' => esc_html__('Light 300','xgenious'),
	// 				'400' => esc_html__('Regular 400','xgenious'),
	// 				'500' => esc_html__('Medium 500','xgenious'),
	// 				'600' => esc_html__('Semi Bold 600','xgenious'),
	// 				'700' => esc_html__('Bold 700','xgenious'),
	// 				'800' => esc_html__('Extra Bold 800','xgenious'),
	// 			),
	// 			'default'     => array('400','500','600','700','800'),
	// 			'dependency' => array('heading_font_enable' ,'==','true')
	// 		),
	// 	)
	// ));
	/*--------------------------------------------------------------
			Envato Api Option
		----------------------------------------------------------------*/

	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'envato_api_page',
		'title' => esc_html__('Envato API','xgenious'),
		'icon' => 'fa fa-indent',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' => '<h3>'.esc_html__('Envato API Settings','xgenious').'</h3>',
			),
			array(
				'type' => 'text',
				'id' => 'envato_api_token',
				'title' => esc_html__('API Token','xgenious'),
				'desc' => wp_kses(__('enter your <mark>API Token</mark> of envato api token app','xgenious'),$allowed_html),
			),
		)
	));
	/*--------------------------------------------------------------
		Envato Api Option
	----------------------------------------------------------------*/

	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'smtp_mail_setup',
		'title' => esc_html__('SMTP Setup','xgenious'),
		'icon' => 'fa fa-envelope',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' => '<h3>'.esc_html__('SMTP Settings','xgenious').'</h3>',
			),
			array(
				'type' => 'text',
				'id' => 'smtp_host',
				'title' => esc_html__('SMTP HOST','xgenious'),
				'desc' => wp_kses(__('enter your <mark>HOST</mark> name of smtp','xgenious'),$allowed_html),
			),
			array(
				'type' => 'text',
				'id' => 'smtp_port',
				'title' => esc_html__('SMTP PORT','xgenious'),
				'desc' => wp_kses(__('enter your <mark>PORT</mark> of smtp','xgenious'),$allowed_html),
			),
			array(
				'type' => 'text',
				'id' => 'smtp_username',
				'title' => esc_html__('SMTP USERNAME','xgenious'),
				'desc' => wp_kses(__('enter your <mark>USERNAME</mark> of smtp','xgenious'),$allowed_html),
			),
			array(
				'type' => 'text',
				'id' => 'smtp_password',
				'title' => esc_html__('SMTP PASSWORD','xgenious'),
				'desc' => wp_kses(__('enter your <mark>PASSWORD</mark> of smtp','xgenious'),$allowed_html),
			),
			array(
				'type' => 'text',
				'id' => 'smtp_enc',
				'title' => esc_html__('SMTP ENCRYPTION','xgenious'),
				'desc' => wp_kses(__('enter your <mark>ENCRYPTION</mark> of smtp','xgenious'),$allowed_html),
			),
			array(
				'type' => 'subheading',
				'content' => '<h3>'.esc_html__('Mail Settings','xgenious').'</h3>',
			),
			array(
				'type' => 'text',
				'id' => 'from_email',
				'title' => esc_html__('From Email','xgenious'),
				'desc' => wp_kses(__('enter your <mark>from</mark> mail','xgenious'),$allowed_html),
			),
			array(
				'type' => 'text',
				'id' => 'from_name',
				'title' => esc_html__('From Name','xgenious'),
				'desc' => wp_kses(__('enter your <mark>From</mark> name','xgenious'),$allowed_html),
			),
		)
	));
	/*-------------------------------------------------------
		   ** Backup  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix.'_theme_options',array(
		'id' => 'backup',
		'title' => esc_html__('Import / Export','xgenious'),
		'icon' => 'fa fa-upload',
		'fields' => array(
			array(
				'type' => 'notice',
				'style' => 'warning',
				'content' => esc_html__('You can save your current options. Download a Backup and Import.','xgenious'),
			),
			array(
				'type' => 'backup',
				'title' => esc_html__('Backup & Import','xgenious')
			)
		)
	));


}
