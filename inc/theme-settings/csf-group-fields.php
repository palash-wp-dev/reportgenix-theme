<?php
/*
 * @package Xgenious
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Xgenious_Group_Fields') ){

	class Xgenious_Group_Fields{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {

		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * page layout options
		 * @since 1.0.0
		 * */
		public static function page_layout(){
			$fields = array(
				array(
					'type'    => 'subheading',
					'content' => esc_html__('Page Layouts & Colors Options','xgenious'),
				),
				array(
					'id' => 'page_layout',
					'type' => 'image_select',
					'title' => esc_html__('Select Page Layout','xgenious'),
					'options' => array(
						'default' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/default.png',
						'left-sidebar' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/left-sidebar.png',
						'right-sidebar' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/right-sidebar.png',
						'blank' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/blank.png',
					),
					'default' => 'default'
				),
				array(
					'id' => 'page_bg_color',
					'type' => 'color',
					'title' => esc_html__('Page Background Color','xgenious'),
					'default' => '#ffffff'
				),
				array(
					'id' => 'page_content_bg_color',
					'type' => 'color',
					'title' => esc_html__('Page Content Background Color','xgenious'),
					'default' => '#ffffff'
				)
			);

			return $fields;
		}

		/**
		 * page container options
		 * @since 1.0.0
		 * */
		public static function  Page_Container_Options($type){
			$fields = array();
			$allowed_html = Xgenious()->kses_allowed_html(array('mark'));
			if ('header_options' == $type){
				$fields = array(
					array(
						'type'    => 'subheading',
						'content' => esc_html__('Page Header & Breadcrumb Options','xgenious'),
					),
					array(
						'id' => 'navbar_type',
						'title' => esc_html__('Navbar Type','xgenious'),
						'type' => 'select',
						'options' => array(
							'' => esc_html__('Default','xgenious'),
							'navbar-absolute' => esc_html__('Absolute','xgenious'),
						),
						'default' => '',
					),
                    array(
                        'id' => 'logo_type',
                        'title' => esc_html__('Logo Type','xgenious'),
                        'type' => 'select',
                        'options' => array(
                            '' => esc_html__('Light','xgenious'),
                            'dark_logo' => esc_html__('Dark','xgenious'),
                        ),
                        'default' => '',
                    ),
					array(
						'id' => 'page_title',
						'type' => 'switcher',
						'title' => esc_html__('Page Title','xgenious'),
						'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page title.','xgenious'),$allowed_html),
						'text_on' => esc_html__('Yes','xgenious'),
						'text_off' => esc_html__('No','xgenious'),
						'default' => true
					),
					array(
						'id' => 'page_breadcrumb',
						'type' => 'switcher',
						'title' => esc_html__('Page Breadcrumb','xgenious'),
						'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page breadcrumb.','xgenious'),$allowed_html),
						'text_on' => esc_html__('Yes','xgenious'),
						'text_off' => esc_html__('No','xgenious'),
						'default' => true
					),
				);
			}elseif ('container_options' == $type){
				$fields = array(
					array(
						'type'    => 'subheading',
						'content' => esc_html__('Page Width & Padding Options','xgenious'),
					),
					array(
						'id' => 'page_container',
						'type' => 'switcher',
						'title' => esc_html__('Page Full Width','xgenious'),
						'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page container full width.','xgenious'),$allowed_html),
						'text_on' => esc_html__('Yes','xgenious'),
						'text_off' => esc_html__('No','xgenious'),
						'default' => false
					),
					array(
						'type'    => 'subheading',
						'content' => esc_html__('Page Spacing Options','xgenious'),
					),
					array(
						'id' => 'page_spacing_top',
						'title' => esc_html__('Page Spacing Top','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page container.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 120,
					),
					array(
						'id' => 'page_spacing_bottom',
						'title' => esc_html__('Page Spacing Bottom','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page container.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 120,
					),
					array(
						'type'    => 'subheading',
						'content' => esc_html__('Page Content Spacing Options','xgenious'),
					),
					array(
						'id' => 'page_content_spacing',
						'type' => 'switcher',
						'title' => esc_html__('Page Content Spacing','xgenious'),
						'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page content spacing.','xgenious'),$allowed_html),
						'text_on' => esc_html__('Yes','xgenious'),
						'text_off' => esc_html__('No','xgenious'),
						'default' => false
					),
					array(
						'id' => 'page_content_spacing_top',
						'title' => esc_html__('Page Spacing Bottom','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 0,
						'dependency' => array('page_content_spacing' ,'==','true')
					),
					array(
						'id' => 'page_content_spacing_bottom',
						'title' => esc_html__('Page Spacing Bottom','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 0,
						'dependency' => array('page_content_spacing' ,'==','true')
					),
					array(
						'id' => 'page_content_spacing_left',
						'title' => esc_html__('Page Spacing Left','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for page content area.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 0,
						'dependency' => array('page_content_spacing' ,'==','true')
					),
					array(
						'id' => 'page_content_spacing_right',
						'title' => esc_html__('Page Spacing Right','xgenious'),
						'type' => 'slider',
						'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for page content area.','xgenious'),$allowed_html),
						'min'     => 0,
						'max'     => 500,
						'step'    => 1,
						'unit'    => 'px',
						'default' => 0,
						'dependency' => array('page_content_spacing' ,'==','true')
					),
				);
			}

			return $fields;
		}
		/**
		 * page layout options
		 * */
		public static function page_layout_options($title,$prefix){
			$allowed_html = Xgenious()->kses_allowed_html(array('mark'));
			$fields = array(
				array(
					'type' => 'subheading',
					'content' => '<h3>'.$title.esc_html__(' Page Options','xgenious').'</h3>',
				),
				array(
					'id' => $prefix.'_layout',
					'type' => 'image_select',
					'title' => esc_html__('Select Page Layout','xgenious'),
					'options' => array(
						'right-sidebar' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/right-sidebar.png',
						'left-sidebar' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/left-sidebar.png',
						'no-sidebar' => XGENIOUS_THEME_SETTINGS_IMAGES .'/page/no-sidebar.png',
					),
					'default' => 'right-sidebar'
				),
				array(
					'id' => $prefix.'_bg_color',
					'type' => 'color',
					'title' => esc_html__('Page Background Color','xgenious'),
					'default' => '#ffffff'
				),
				array(
					'id' => $prefix.'_spacing_top',
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
					'id' => $prefix.'_spacing_bottom',
					'title' => esc_html__('Page Spacing Bottom','xgenious'),
					'type' => 'slider',
					'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.','xgenious'),$allowed_html),
					'min'     => 0,
					'max'     => 500,
					'step'    => 1,
					'unit'    => 'px',
					'default' => 120,
				),
			);

			return $fields;
		}

		/**
		 * Post meta
		 * @since 1.0.0
		 * */
		public static function post_meta($prefix,$title){
			$allowed_html = Xgenious()->kses_allowed_html(array('mark'));
			$fields = array(
				array(
					'type' => 'subheading',
					'content' => '<h3>'.$title.esc_html__(' Post Options','xgenious').'</h3>',
				),
				array(
					'id' => $prefix.'_posted_by',
					'type' => 'switcher',
					'title' => esc_html__('Posted By','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted by.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				),
				array(
					'id' => $prefix.'_posted_on',
					'type' => 'switcher',
					'title' => esc_html__('Posted On','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted on.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				)
			);

			if ( 'blog_post' == $prefix){
				$fields[] = array(
					'id' => $prefix.'_posted_cat',
					'type' => 'switcher',
					'title' => esc_html__('Posted Category','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				);
				$fields[] =  array(
					'id' => $prefix.'_readmore_btn',
					'type' => 'switcher',
					'title' => esc_html__('Read More Button','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide read more button.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				);
				$fields[] =  array(
					'id' => $prefix.'_readmore_btn_text',
					'type' => 'text',
					'title' => esc_html__('Read More Text','xgenious'),
					'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.','xgenious'),$allowed_html),
					'default' => esc_html__('Read More','xgenious'),
					'dependency' => array($prefix.'_readmore_btn' ,'==','true')
				);
				$fields[] =  array(
					'id' => $prefix.'_excerpt_more',
					'type' => 'text',
					'title' => esc_html__('Excerpt More','xgenious'),
					'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.','xgenious'),$allowed_html),
					'attributes' => array(
						'placeholder' => esc_html__('....','xgenious')
					)
				);
				$fields[] =  array(
					'id' => $prefix.'_excerpt_length',
					'type' => 'select',
					'options' => array(
						'25' => esc_html__('Short','xgenious'),
						'55' => esc_html__('Regular','xgenious'),
						'100' => esc_html__('Long','xgenious'),
					),
					'title' => esc_html__('Excerpt Length','xgenious'),
					'desc' => wp_kses(__('you can set <mark> excerpt length</mark> for post.','xgenious'),$allowed_html),
				);
			}elseif('blog_single_post' == $prefix){

				$fields[] =array(
					'id' => $prefix.'_posted_category',
					'type' => 'switcher',
					'title' => esc_html__('Posted Category','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				);
				$fields[] =  array(
					'id' => $prefix.'_posted_tag',
					'type' => 'switcher',
					'title' => esc_html__('Posted Tags','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post tags.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				);
				$fields[] =  array(
					'id' => $prefix.'_posted_share',
					'type' => 'switcher',
					'title' => esc_html__('Post Share','xgenious'),
					'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post share.','xgenious'),$allowed_html),
					'text_on' => esc_html__('Yes','xgenious'),
					'text_off' => esc_html__('No','xgenious'),
					'default' => true
				);
			}

			return $fields;
		}

	}//end class

}//end if

