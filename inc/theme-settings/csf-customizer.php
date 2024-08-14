<?php

/*
 * Theme Customize Options
 * @package xgenious
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if (class_exists('CSF') ){
	$prefix = 'xgenious';

	CSF::createCustomizeOptions($prefix.'_customize_options');
	/*-------------------------------------
	** Theme Main panel
-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('Xgenious Options','xgenious'),
		'id' => 'xgenious_main_panel',
		'priority' => 11,
	));


	/*-------------------------------------
		** Theme Main Color
	-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('01. Main Color','xgenious'),
		'priority' => 10,
		'parent' => 'xgenious_main_panel',
		'fields' => array(
			array(
				'id'    => 'main_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Main Color One','xgenious'),
				'default' => '#73cb01',
				'desc' => esc_html__('This is theme primary color, means it\'ll affect most of elements that have default color of our theme primary color','xgenious')
			),
			array(
				'id'    => 'main_color_two',
				'type'  => 'color',
				'title' => esc_html__('Theme Main Color Two','xgenious'),
				'default' => '#ef5124',
				'desc' => esc_html__('This is theme primary color two, means it\'ll affect most of elements that have default color of our theme primary color','xgenious')
			),
			array(
				'id'    => 'secondary_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Secondary Color','xgenious'),
				'default' => '#30373f',
				'desc' => esc_html__('This is theme secondary color, means it\'ll affect most of elements that have default color of our theme secondary color','xgenious')
			),
			array(
				'id'    => 'heading_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Heading Color','xgenious'),
				'default' => '#272b2e',
				'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6','xgenious')
			),
			array(
				'id'    => 'paragraph_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Paragraph Color','xgenious'),
				'default' => '#878a95',
				'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc','xgenious')
			),
		)
	));
	/*-------------------------------------
		** Theme Header Options
	-------------------------------------*/

	CSF::createSection( $prefix.'_customize_options', array(
		'title'  => esc_html__('02. Header One Options','xgenious'),
		'parent' => 'xgenious_main_panel',
		'priority' => 11,
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Nav Bar Options','xgenious').'</h3>'
			),
			array(
				'id' => 'header_01_nav_bar_bg_color',
				'type' => 'color',
				'title' => esc_html__('Nav Bar Background Color','xgenious'),
				'default' => '#30373f'
			),
			array(
				'id' => 'header_01_nav_bar_color',
				'type' => 'color',
				'title' => esc_html__('Nav Bar Text Color','xgenious'),
				'default' => 'rgba(255, 255, 255, 0.8)'
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Dropdown Options','xgenious').'</h3>'
			),
			array(
				'id' => 'header_01_dropdown_bg_color',
				'type' => 'color',
				'title' => esc_html__('Dropdown Background Color','xgenious'),
				'default' => '#ffffff'
			),
			array(
				'id' => 'header_01_dropdown_color',
				'type' => 'color',
				'title' => esc_html__('Dropdown Text Color','xgenious'),
				'default' => '#878a95'
			)
		)
	));
	
	/*-------------------------------------
	  ** Theme Sidebar Options
  -------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('07. Sidebar','xgenious'),
		'priority' => 13,
		'parent' => 'xgenious_main_panel',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Sidebar Options','xgenious').'</h3>'
			),
			array(
				'id' => 'sidebar_widget_border_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Border Color','xgenious'),
				'default' => '#fafafa'
			),
			array(
				'id' => 'sidebar_widget_title_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Title Color','xgenious'),
				'default' => '#242424'
			),
			array(
				'id' => 'sidebar_widget_text_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Text Color','xgenious'),
				'default' => '#777777'
			),
		)
	));
	/*-------------------------------------
		** Theme Footer Options
	-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('08. Footer','xgenious'),
		'priority' => 14,
		'parent' => 'xgenious_main_panel',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Options','xgenious').'</h3>'
			),
			array(
				'id' => 'footer_area_bg_color',
				'type' => 'color',
				'title' => esc_html__('Footer Background Color','xgenious'),
				'default' => '#1d2228',

			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Widget Options','xgenious').'</h3>'
			),
			array(
				'id' => 'footer_widget_title_color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Title Color','xgenious'),
				'default' => '#ffffff'
			),
			array(
				'id' => 'footer_widget_text_color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Text Color','xgenious'),
				'default' => 'rgba(255, 255, 255, 0.7)'
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Copyright Area Options','xgenious').'</h3>'
			),
			array(
				'id' => 'copyright_area_bg_color',
				'type' => 'color',
				'title' => esc_html__('Copyright Area Background Color','xgenious'),
				'default' => '#161a1e'
			),
			array(
				'id' => 'copyright_area_text_color',
				'type' => 'color',
				'title' => esc_html__('Copyright Area Text Color','xgenious'),
				'default' => 'rgba(255, 255, 255, 0.6)'
			),
		)
	));

}//endif