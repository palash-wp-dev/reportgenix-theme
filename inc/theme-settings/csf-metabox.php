<?php
/*
 * Theme Metabox Options
 * @package Xgenious
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( class_exists('CSF') ){

	$allowed_html = Xgenious()->kses_allowed_html(array('mark'));

	$prefix = 'xgenious';
	/*-------------------------------------
		Post Format Options
	-------------------------------------*/
	CSF::createMetabox($prefix.'_post_video_options',array(
		'title' => esc_html__('Video Post Format Options','xgenious'),
		'post_type' => 'post',
		'post_formats' => 'video'
	));
	CSF::createSection($prefix.'_post_video_options',array(
		'fields' => array(
			array(
				'id' => 'video_url',
				'type' => 'text',
				'title' => esc_html__('Enter Video URL','xgenious'),
				'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend','xgenious'),$allowed_html)
			)
		)
	));
	CSF::createMetabox($prefix.'_post_gallery_options',array(
		'title' => esc_html__('Gallery Post Format Options','xgenious'),
		'post_type' => 'post',
		'post_formats' => 'gallery'
	));
	CSF::createSection($prefix.'_post_gallery_options',array(
		'fields' => array(
			array(
				'id' => 'gallery_images',
				'type' => 'gallery',
				'title' => esc_html__('Select Gallery Photos','xgenious'),
				'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend','xgenious'),$allowed_html)
			)
		)
	));

    /*-------------------------------------
	    Table of Content
	-------------------------------------*/
    CSF::createMetabox( $prefix.'-metabox-field', array(
        'title'     => 'Table Of Content',
        'post_type' => 'post',
    ) );
    // Create a section
    CSF::createSection( $prefix.'-metabox-field', array(
        'title'  => esc_html__('TBA Table of content','bytesed-master'),
        'fields' => array(

            array(
                'id'    => 'tba-section-title',
                'type'  => 'text',
                'title' => 'Section Title'
            ),

            array(
                'id'     => 'tba-meta-field',
                'type'   => 'repeater',
                'title'  => 'Repeater',
                'fields' => array(

                    array(
                        'id'    => 'meta-field-title',
                        'type'  => 'text',
                        'title' => 'TBA Title'
                    ),
                    array(
                        'id'    => 'meta-field-id',
                        'type'  => 'text',
                        'title' => 'TBA Id'
                    ),

                ),
            ),

        )
    ) );

    /*-------------------------------------
	    Related Tags
	-------------------------------------*/
    CSF::createMetabox($prefix.'_related_tags',array(
        'title' => esc_html__('Related Tags','xgenious'),
        'post_type' => 'post'
    ));

    CSF::createSection($prefix.'_related_tags',array(
        'fields' => array(
            array(
                'id' => 'related_tags_title',
                'type' => 'text',
                'title' => esc_html__('Related Tags Title','xgenious'),
                'default' => esc_html__('Related Tags','xgenious'),
                'desc' => wp_kses(__('enter <mark>enter related post title</mark> to show in frontend','xgenious'),$allowed_html)
            ),
            array(
                'id'          => 'all_related_tags',
                'type'        => 'select',
                'title'       => 'Select tags',
                'placeholder' => 'Select tags',
                'chosen'      => true,
                'ajax'        => true,
                'multiple'    => true,
                'sortable'    => true,
                'options'     => 'tags',
                'desc' => wp_kses(__('select <mark>related post</mark> to show in frontend','xgenious'),$allowed_html)
            )
        )
    ));

    /*-------------------------------------
       Post Share
   -------------------------------------*/
    CSF::createMetabox($prefix.'_post_share',array(
        'title' => esc_html__('Share Post','xgenious'),
        'post_type' => 'post'
    ));

    CSF::createSection($prefix.'_post_share',array(
        'fields' => array(
            array(
                'id' => 'post_share_title',
                'type' => 'text',
                'title' => esc_html__('Share Post Title','xgenious'),
                'default' => esc_html__('Share: ','xgenious'),
                'desc' => wp_kses(__('enter <mark>enter post share title</mark> to show in frontend','xgenious'),$allowed_html)
            ),

            array(
                'id' => 'enable_facebook_share',
                'title' => esc_html__('Enable Facebook','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'enable_twitter_share',
                'title' => esc_html__('Enable Twitter','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'enable_linkedin_share',
                'title' => esc_html__('Enable Linkedin','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'enable_vimeo_share',
                'title' => esc_html__('Enable Vimeo','xgenious'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top','xgenious'),$allowed_html),
                'default' => true,
            ),
        )
    ));


    /*-------------------------------------
	    Related Post 
	-------------------------------------*/
	CSF::createMetabox($prefix.'_related_options',array(
		'title' => esc_html__('Related Posts Options','xgenious'),
		'post_type' => 'post'
	));

	CSF::createSection($prefix.'_related_options',array(
		'fields' => array(
		    array(
			'id' => 'title',
			'type' => 'text',
			'title' => esc_html__('Related Post Title','xgenious'),
			'default' => esc_html__('You May Also Like','xgenious'),
			'desc' => wp_kses(__('enter <mark>enter related post title</mark> to show in frontend','xgenious'),$allowed_html)
			),
		   array(
              'id'          => 'related_posts',
              'type'        => 'select',
              'title'       => 'Select posts',
              'placeholder' => 'Select posts',
              'chosen'      => true,
              'ajax'        => true,
              'multiple'    => true,
              'sortable'    => true,
              'options'     => 'posts',
              'desc' => wp_kses(__('select <mark>related post</mark> to show in frontend','xgenious'),$allowed_html)
            )
		)
	));
	
	/* right side banner content metabox */
	CSF::createMetabox($prefix.'_blog_single_right_side_content_options',array(
		'title' => esc_html__('Right Side Banner Content Options','xgenious'),
		'post_type' => 'post'
	));
	CSF::createSection($prefix.'_blog_single_right_side_content_options',array(
		'fields'=> array(
		    array(
                  'id'     => 'banner-content-repeater',
                  'type'   => 'repeater',
                  'title'  => 'Banner Content',
                  'fields' => array(
            
                    array(
                      'id'    => 'banner-left',
                      'type'  => 'media',
                      'title' => 'Banner Image',
                    ),
                    array(
                      'id'    => 'banner-left-link',
                      'type'  => 'text',
                      'title' => 'Link'
                    ),
            
              ),
            )
            
        )
	));
	
	
	/*-------------------------------------
	  Page Container Options
  -------------------------------------*/
	CSF::createMetabox($prefix.'_page_container_options',array(
		'title' => esc_html__('Page Options','xgenious'),
		'post_type' => array('page'),
	));
	CSF::createSection($prefix.'_page_container_options',array(
		'title' => esc_html__('Layout & Colors','xgenious'),
		'icon' => 'fa fa-columns',
		'fields' => Xgenious_Group_Fields::page_layout()
	));
	CSF::createSection($prefix.'_page_container_options',array(
		'title' => esc_html__('Header & Breadcrumb','xgenious'),
		'icon' => 'fa fa-header',
		'fields' => Xgenious_Group_Fields::Page_Container_Options('header_options')
	));
	CSF::createSection($prefix.'_page_container_options',array(
		'title' => esc_html__('Width & Padding','xgenious'),
		'icon' => 'fa fa-file-o',
		'fields' => Xgenious_Group_Fields::Page_Container_Options('container_options')
	));

	/*------------------------------------
		Download Metabox
	------------------------------------*/
	CSF::createMetabox($prefix.'_product_info',array(
		'title' => esc_html__('Product Information','xgenious'),
		'post_type' => 'download',
		'data_type' => 'unserialize'
	));
	CSF::createSection($prefix.'_product_info',array(
		'fields' => array(
		    array(
				'id' => $prefix.'_breadcrumb',
				'type' => 'switcher',
				'title' => esc_html__('Breadcrum Enable/Disable','xgenious'),
				'default' => 'yes'
			),
			array(
				'id' => $prefix.'_thumbnail',
				'type' => 'media',
				'title' => esc_html__('Thumbnail','xgenious'),
			),
			array(
				'id' => $prefix.'_subtitle',
				'type' => 'text',
				'title' => esc_html__('Subtitle','xgenious'),
			),
			array(
				'id' => $prefix.'_cut_price',
				'type' => 'text',
				'title' => esc_html__('Cut Price','xgenious'),
			),
			array(
				'id' => $prefix.'_type',
				'type' => 'select',
				'options' => array(
					''  => esc_html__('Website','xgenious'),
					'envato' => esc_html__('Envato','xgenious')
				),
				'title' => esc_html__('Type','xgenious'),
				'default' => 'envato'
			),
			array(
				'id' => $prefix.'_extended_price',
				'type' => 'text',
				'title' => esc_html__('Extended Price','xgenious'),
			),
			array(
				'id' => $prefix.'_columns',
				'type' => 'text',
				'title' => esc_html__('Columns','xgenious'),
				'default' => esc_html__('4+','xgenious')
			),
			array(
				'id' => $prefix.'_compatible_browsers',
				'type' => 'textarea',
				'title' => esc_html__('Compatible Browsers','xgenious'),
			),
			array(
				'id' => $prefix.'_demo_url',
				'type' => 'text',
				'title' => esc_html__('Demo URL','xgenious'),
			),
			array(
				'id' => $prefix.'_item_url',
				'type' => 'text',
				'title' => esc_html__('Envato Item URL','xgenious'),
			),
			array(
				'id' => $prefix.'_high_resolution',
				'type' => 'switcher',
				'title' => esc_html__('High Resolution','xgenious'),
			),
			array(
				'id' => $prefix.'_layout',
				'type' => 'text',
				'title' => esc_html__('Layout','xgenious'),
			),
			array(
				'id' => $prefix.'_themeforest_files_included',
				'type' => 'textarea',
				'title' => esc_html__('ThemeForest Files Included','xgenious'),
			),
			array(
				'id' => $prefix.'_rating',
				'type' => 'text',
				'title' => esc_html__('Rating','xgenious'),
			),
			array(
				'id' => $prefix.'_rating_count',
				'type' => 'text',
				'title' => esc_html__('Rating Count','xgenious'),
			),
			array(
				'id' => $prefix.'_published_at',
				'type' => 'text',
				'title' => esc_html__('Created','xgenious'),
			),
			array(
				'id' => $prefix.'_updated_at',
				'type' => 'text',
				'title' => esc_html__('Last Update','xgenious'),
			),
			array(
				'id' => $prefix.'_compatible-software',
				'type' => 'text',
				'title' => esc_html__('Software Version','xgenious'),
			),
			array(
				'id' => $prefix.'_compatible-with',
				'type' => 'text',
				'title' => esc_html__('Compatible With','xgenious'),
			),
			array(
				'id' => $prefix.'_gutenberg-optimized',
				'type' => 'switcher',
				'title' => esc_html__('Gutenberg Optimized','xgenious'),
			),
			array(
				'id' => $prefix.'_source-files-included',
				'type' => 'textarea',
				'title' => esc_html__('Codecanyon Files Included','xgenious'),
			),
			array(
				'id' => $prefix.'_envato_product_id',
				'type' => 'text',
				'title' => esc_html__('Envato Product ID','xgenious'),
			),
			array(
				'id' => $prefix.'_software_framework',
				'type' => 'text',
				'title' => esc_html__('Software Framework','xgenious'),
			),
		)
	));
	/*-------------------------------------
	 Practice Area Options
  -------------------------------------*/
	CSF::createMetabox($prefix.'_wedocs_area_options',array(
		'title' => esc_html__('Documentaion Options','xgenious'),
		'post_type' => array('docs'),
		'priority'           => 'high',
	));
	CSF::createSection($prefix.'_wedocs_area_options',array(
		'fields' => array(
			array(
				'id' => 'image',
				'type' => 'media',
				'title' => esc_html__('Thumbnail','xgenious'),
			)
		)
	));

	// Control core classes for avoid errors

		//
		// Set a unique slug-like ID
		$prefix = 'xgenious_taxonomy_options';

		//
		// Create taxonomy options
		CSF::createTaxonomyOptions( $prefix, array(
			'taxonomy'  => 'download_category',
//			'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
		) );

		//
		// Create a section
		CSF::createSection( $prefix, array(
			'fields' => array(

				array(
					'id'    => 'category_image',
					'type'  => 'media',
					'title' => __('Category Image'),
				),


			)
		) );
		
		
		
		// Set a unique slug-like ID
  $prefix = '_xgenious_menu_options';

  //
  // Create profile options
  CSF::createNavMenuOptions( $prefix, array(
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );
  
  CSF::createSection( $prefix, array(
    'fields' => array(
        array(
        'id'    => 'enable_mega_menu',
        'type'  => 'switcher',
        'title' => 'Enable Mega Menu',
        'default' => false
      ),
      array(
        'id'    => 'elementor_template',
        'type'  => 'select',
        'title' => 'Select Elementor Template',
        'options' => Xgenious()->get_post_list_by_post_type('megamenu')
      ),
      array(
        'id'    => 'subtitle',
        'type'  => 'text',
        'title' => 'Subtitle'
      ),
      array(
        'id'    => 'subtitle_theme',
        'type'  => 'select',
        'title' => 'Select Subtitle Theme',
        'options' => [
            'blue' => 'Blue', 
            'green' => 'Green',
            'orange' => "Orange",
            'yellow' => 'Yellow',
            'violet' => 'Voilet',
            'pink' => 'Pink',
            'purple' => 'Purple',
            'brown' => 'Brown',
            'black' => 'Black',
            'gray' => 'Gray',
            'red' => 'Red'
        ])
    )
  ) );




}//endif