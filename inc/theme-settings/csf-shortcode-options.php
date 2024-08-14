<?php
/**
 * theme shortcode generator
 * @since 1.0.0
 * */
if (!defined('ABSPATH')){
	exit(); //exit if access it directly
}

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {
	$prefix = 'xgenious';
	CSF::createShortcoder( $prefix.'_shortcodes', array(
		'button_title'   => esc_html__('Add Shortcode','xgenious'),
		'select_title'   => esc_html__('Select a shortcode','xgenious'),
		'insert_title'   => esc_html__('Insert Shortcode','xgenious')
	) );

	/*------------------------------------
		Inline info link options
	-------------------------------------*/
	CSF::createSection( $prefix.'_shortcodes', array(
		'title'     => esc_html__('Inline Info Link','xgenious'),
		'view'      => 'group',
		'shortcode' => 'xgenious_info_item_wrap',
		'group_shortcode' => 'xgenious_info_link',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','xgenious'),
			),
			array(
				'id'      => 'text',
				'type'    => 'text',
				'title'   => esc_html__('Text','xgenious'),
			),
			array(
				'id'      => 'url',
				'type'    => 'text',
				'title'   => esc_html__('URL','xgenious'),
			)
		)
	) );
	/*------------------------------------
		info item two
	-------------------------------------*/
	CSF::createSection( $prefix.'_shortcodes', array(
		'title'     => esc_html__('Info Item Two','xgenious'),
		'view'      => 'group',
		'shortcode' => 'xgenious_info_item_two_wrap',
		'group_shortcode' => 'xgenious_info_item_two',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','xgenious'),
			),
			array(
				'id'      => 'title',
				'type'    => 'text',
				'title'   => esc_html__('Title','xgenious'),
			),
			array(
				'id'      => 'link',
				'type'    => 'text',
				'title'   => esc_html__('Link','xgenious'),
			)
		)
	) );

	/*------------------------------------
		info item Text
	-------------------------------------*/
	CSF::createSection( $prefix.'_shortcodes', array(
		'title'     => esc_html__('Info Item Text','xgenious'),
		'view'      => 'group',
		'shortcode' => 'xgenious_info_text_wrap',
		'group_shortcode' => 'xgenious_info_text_item',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','xgenious'),
			),
			array(
				'id'      => 'text',
				'type'    => 'text',
				'title'   => esc_html__('Text','xgenious'),
			)
		)
	) );

}
