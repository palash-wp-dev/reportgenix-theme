<?php
/**
 * @package Xgenious
 * @author Ir Tech
 */
if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Class_Xgenious_Init')) {

	class Class_Xgenious_Init
	{
		/*
		* $instance
		* @since 1.0.0
		* */
		protected static $instance;

		public function __construct()
		{
			/*
			 * theme setup
			 * */
			add_action( 'after_setup_theme', array($this,'theme_setup') );

			/**
			 * Widget Init
			 * */
			add_action( 'widgets_init', array($this,'theme_widgets_init') );
			/**
			 * Theme Assets
			 * */
			add_action( 'wp_enqueue_scripts', array($this,'theme_assets') );
			/**
			 * Registers an editor stylesheet for the theme.
			 */
			add_action( 'admin_init', array($this,'add_editor_styles' ));

            add_action('show_user_profile', array( $this, 'custom_user_profile_fields' ) );
            add_action('edit_user_profile', array( $this, 'custom_user_profile_fields' ) );

            add_action('personal_options_update', array( $this, 'save_custom_user_profile_fields' ) );
            add_action('edit_user_profile_update', array( $this, 'save_custom_user_profile_fields' ) );
		}

		/**
		 * getInstance()
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

        /**
         * Add a new fields to the user profile page
         * @since 1.0
         */
        public function custom_user_profile_fields( $user ) {
            ?>
            <h3><?php esc_html_e( 'Author Social Profiles',  'xgenious' ); ?></h3>

            <table class="form-table">
                <tr>
                    <th><label for="user_facebook_profile"><?php esc_html_e( 'Facebook URL', 'xgenious' ); ?></label></th>
                    <td>
                        <input type="text" name="user_facebook_profile" id="user_facebook_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_facebook_profile', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e( 'Please enter your facebook profile url',  'xgenious' ); ?></span>
                    </td>
                </tr>
                <tr>
                    <th><label for="user_twitter_profile"><?php esc_html_e( 'Twitter URL',  'xgenious' ); ?></label></th>
                    <td>
                        <input type="text" name="user_twitter_profile" id="user_twitter_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter_profile', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e( 'Please enter your twitter profile url',  'xgenious' ); ?></span>
                    </td>
                </tr>
                <tr>
                    <th><label for="user_instagram_profile"><?php esc_html_e( 'Instagram URL',  'xgenious' ); ?></label></th>
                    <td>
                        <input type="text" name="user_instagram_profile" id="user_instagram_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_instagram_profile',  $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e('Please enter your instagram profile url', 'xgenious'); ?></span>
                    </td>
                </tr>
				<tr>
                    <th><label for="user_linkedin_profile"><?php esc_html_e( 'Linkedin URL',  'xgenious' ); ?></label></th>
                    <td>
                        <input type="text" name="user_linkedin_profile" id="user_linkedin_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_linkedin_profile',  $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e('Please enter your instagram profile url', 'xgenious'); ?></span>
                    </td>
                </tr>
                <tr>
                    <th><label for="user_youtube_prfile"><?php esc_html_e( 'Youtube URL',  'xgenious' ); ?></label></th>
                    <td>
                        <input type="text" name="user_youtube_profile" id="user_youtube_profile" value="<?php echo esc_attr( get_the_author_meta( 'user_youtube_profile', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e( 'Please enter your youtube channel url',  'xgenious' ); ?></span>
                    </td>
                </tr>
            </table>
            <?php
        }

        /**
         * Save custom user profile fields
         * @since 1.0
         */
        public function save_custom_user_profile_fields( $user_id ) {
            if ( current_user_can( 'edit_user', $user_id ) ) {
                update_user_meta( $user_id,  'user_facebook_profile', sanitize_text_field( $_POST['user_facebook_profile'] ) );
                update_user_meta( $user_id,  'user_twitter_profile', sanitize_text_field( $_POST['user_twitter_profile'] ) );
                update_user_meta( $user_id,  'user_instagram_profile', sanitize_text_field( $_POST['user_instagram_profile'] ) );
                update_user_meta( $user_id,  'user_youtube_profile', sanitize_text_field( $_POST['user_youtube_profile'] ) );
            }
        }

		/**
		 * Theme Setup
		 * @since 1.0.0
		 * */
		public function theme_setup(){
			/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on xgenious, use a find and replace
		 * to change 'xgenious' to the name of your theme in all the template files.
		 */
			load_theme_textdomain( 'xgenious', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'main-menu' => esc_html__( 'Primary Menu', 'xgenious' ),
                'footer-bottom' => esc_html__( 'Bottom Footer', 'xgenious' )
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'xgenious_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );
			//woocommerce support
			add_theme_support('woocommerce');
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

			//add theme support for post format
			add_theme_support('post-formats',array('image','video','gallery','link','quote'));
			// This variable is intended to be overruled from themes.
			// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
			$GLOBALS['content_width'] = apply_filters( 'xgenious_content_width', 740 );
			//add image sizes
			add_image_size('xgenious_classic',930,450);
			add_image_size('xgenious_grid',370,270,true);

			self::load_theme_dependency_files();
		}

		/**
		 * Theme Widget Init
		 * @since 1.0.0
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 * */
		public function theme_widgets_init(){
			register_sidebar( array(
				'name'          => esc_html__( 'Sidebar', 'xgenious' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'xgenious' ),
				'before_widget' => '<div id="%1$s" class="single-sidebar-wraper mt-30 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="sidebar-heading">',
				'after_title'   => '</h4>',
			) );
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Widget Area', 'xgenious' ),
				'id'            => 'footer-widget',
				'description'   => esc_html__( 'Add widgets here.', 'xgenious' ),
				'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="footerWidget widget footer-widget %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="footerWidget__title">',
				'after_title'   => '</h4>',
			) );
			if (class_exists('Easy_Digital_Downloads')){
				register_sidebar( array(
					'name'          => esc_html__( 'Download Widget Area', 'xgenious' ),
					'id'            => 'download-sidebar',
					'description'   => esc_html__( 'Add widgets here.', 'xgenious' ),
					'before_widget' => '<div id="%1$s" class="widget practice-widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				) );
			}
		}

		/**
		 * Theme Assets
		 * @since 1.0.0
		 * */
		public function theme_assets(){
			self::load_theme_css();
			self::load_theme_js();
		}
		/*
	   * load theme options google fonts css
	   * @since 1.0.0
	   * */
		public static function load_google_fonts(){

			$enqueue_fonts = array();
			//body font enqueue
			$body_font = cs_get_option('_body_font') ? cs_get_option('_body_font') : [];
			$body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : [];
			$body_font['family'] = ( is_array($body_font) && isset($body_font['font-family']) && !empty($body_font['font-family']) ) ? ($body_font['font-family'] ?? '') : 'Poppins';
			$body_font['font'] = (  is_array($body_font) && isset($body_font['type']) && !empty($body_font['type']) ) ? $body_font['type'] : 'google';
			$body_font_variant = !empty($body_font_variant) ? $body_font_variant : array(400,700,600,500);
			$google_fonts = array();

			if ( !empty($body_font_variant) ){
				foreach ($body_font_variant as $variant){
					$google_fonts[] = array(
						'family' => $body_font['family'],
						'variant' => $variant,
						'font' => $body_font['font']
					);
				}
			}
			//heading font enqueue
			$heading_font_enable = false;
			if (null == cs_get_option('heading_font_enable')){
				$heading_font_enable = false;
			}elseif ('0' == cs_get_option('heading_font_enable')){
				$heading_font_enable = true;
			}elseif('1' == cs_get_option('heading_font_enable')){
				$heading_font_enable = false;
			}
			$heading_font = cs_get_option('heading_font') ? cs_get_option('heading_font') : [];
			$heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : [];
			$heading_font['family'] = ( isset($heading_font['font-family']) && !empty($heading_font['font-family']) ) ? $heading_font['font-family'] : 'Source Serif Pro';
			$heading_font['font'] = ( isset($heading_font['type']) && !empty($heading_font['type']) ) ? $heading_font['type'] : 'google';
			$heading_font_variant = !empty($heading_font_variant) ? $heading_font_variant : array(400,500,600,700,800);
			if ( !empty($heading_font_variant) &&  !$heading_font_enable){
				foreach ($heading_font_variant as $variant){
					$google_fonts[] = array(
						'family' => $heading_font['family'],
						'variant' => $variant,
						'font' => $heading_font['font']
					);
				}
			}

			if ( ! empty( $google_fonts ) ) {
				foreach ( $google_fonts as $font ) {
					if( !empty( $font['font'] ) && $font['font'] == 'google' ) {
						$variant = ( !empty( $font['variant'] ) && $font['variant'] !== 'regular' ) ? ':'. $font['variant'] : '';
						if( !empty($font['family']) ){
							$enqueue_fonts[] = $font['family'] . $variant;
						}
					}
				}
			}

			$enqueue_fonts = array_unique($enqueue_fonts);
			return $enqueue_fonts;
		}
		/**
		 * Load Theme Css
		 * @since 1.0.0
		 * */
		public function load_theme_css(){
			$theme_version = XGENIOUS_DEV ? time() :  Xgenious()->get_theme_info('version');
			//load google fonts
			$enqueue_google_fonts = self::load_google_fonts();
			if ( ! empty( $enqueue_google_fonts ) ) {
			//	wp_enqueue_style( 'xgenious-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $enqueue_google_fonts ) ) , '//fonts.googleapis.com/css' ) ), array(), null );
			}

			$all_css_files = array(
				// array(
				// 	'handle' => 'animate',
				// 	'src' => XGENIOUS_CSS .'/animate.css',
				// 	'deps' => array(),
				// 	'ver' => $theme_version,
				// 	'media' => 'all',
				// ),
				array(
					'handle' => 'bootstrap',
					'src' => XGENIOUS_CSS .'/bootstrap.min.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				array(
					'handle' => 'font-awesome',
					'src' => XGENIOUS_CSS .'/font-awesome.min.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				array(
					'handle' => 'magnific-popup',
					'src' => XGENIOUS_CSS .'/magnific-popup.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				// array(
				// 	'handle' => 'default-style',
				// 	'src' => XGENIOUS_CSS .'/default-style.css',
				// 	'deps' => array(),
				// 	'ver' => $theme_version,
				// 	'media' => 'all',
				// ),
				
				// array(
				// 	'handle' => 'xgenious-responsive',
				// 	'src' => XGENIOUS_CSS .'/responsive.css',
				// 	'deps' => array(),
				// 	'ver' => $theme_version,
				// 	'media' => 'all',
				// ),
				// array(
				// 	'handle' => 'font-awesome',
				// 	'src' => '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
				// 	'deps' => array(),
				// 	'ver' => $theme_version,
				// 	'media' => 'all',
				// ),
				// array(
				// 	'handle' => 'nice-select',
				// 	'src' => XGENIOUS_CSS .'/nice-select.css',
				// 	'deps' => array(),
				// 	'ver' => $theme_version,
				// 	'media' => 'all',
				// ),
				array(
					'handle' => 'main-style',
					'src' => XGENIOUS_CSS .'/main-style.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				array(
					'handle' => 'theme-style',
					'src' => XGENIOUS_CSS .'/theme-style.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				array(
					'handle' => 'xgenious-responsive',
					'src' => XGENIOUS_CSS .'/responsive.css',
					'deps' => array(),
					'ver' => $theme_version,
					'media' => 'all',
				),
				
			);

			$all_css_files = apply_filters('xgenious_theme_enqueue_style',$all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)){
				foreach ($all_css_files as $css){
					call_user_func_array('wp_enqueue_style',$css);
				}
			}
			wp_enqueue_style( 'xgenious-style', get_stylesheet_uri() );

			if (Xgenious()->is_xgenious_master_active()){
				if (file_exists(XGENIOUS_DYNAMIC_STYLESHEETS .'/xgenious-inline-style.php')){
					require_once XGENIOUS_DYNAMIC_STYLESHEETS .'/xgenious-inline-style.php';
					wp_add_inline_style('xgenious-style',Xgenious()->minify_css_lines($GLOBALS['xgenious_inline_css']));
					// wp_add_inline_style('xgenious-style',Xgenious()->minify_css_lines($GLOBALS['theme_customize_css']));
				}

			}
		}

		/**
		 * Load Theme js
		 * @since 1.0.0
		 * */
		public function load_theme_js(){
			$theme_version =  XGENIOUS_DEV ? time() : Xgenious()->get_theme_info('version');

			$all_js_files = array(
				// array(
				// 	'handle' => 'popper',
				// 	'src' => XGENIOUS_JS .'/popper.min.js',
				// 	'deps' => array('jquery'),
				// 	'ver' => $theme_version,
				// 	'in_footer' => true,
				// ),
				array(
					'handle' => 'bootstrap',
					'src' => XGENIOUS_JS .'/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $theme_version,
					'args' => [
					    'in_footer' => true
					    ]
				),
				// array(
				// 	'handle' => 'nice-select',
				// 	'src' => XGENIOUS_JS .'/jquery.nice-select.js',
				// 	'deps' => array('jquery'),
				// 	'ver' => $theme_version,
				// 	'in_footer' => true,
				// ),
				array(
					'handle' => 'magnific-popup',
					'src' => XGENIOUS_JS .'/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $theme_version,
					'args' => [
					    'in_footer' => true
					    ]
				),
				array(
					'handle' => 'xgenious-main-script',
					'src' => XGENIOUS_JS .'/main.js',
					'deps' => array('jquery'),
					'ver' => $theme_version,
					'args' => [
					    'in_footer' => true
					    ]
				),
				// array(
				// 	'handle' => 'xgenious-comporess-all-script',
				// 	'src' => XGENIOUS_JS .'/compress-all.js',
				// 	'deps' => array('jquery'),
				// 	'ver' => $theme_version,
				// 	'in_footer' => true,
				// ),
			);

			$all_js_files = apply_filters('xgenious_theme_enqueue_script',$all_js_files);

			if (is_array($all_js_files) && !empty($all_js_files)){
				foreach ($all_js_files as $js){
					call_user_func_array('wp_enqueue_script',$js);
				}
			}
			wp_localize_script('xgenious-main-script','xgenious',
			array(
				'ajaxUrl' => admin_url('admin-ajax.php'),
				'xgNonce' => wp_create_nonce(),
 			));
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Load THeme Dependency Files
		 * @since 1.0.0
		 * */
		public function load_theme_dependency_files(){
			$includes_files = array(
				array(
					'file-name' => 'activation',
					'file-path' => XGENIOUS_TGMA
				),
				array(
					'file-name' => 'breadcrumb',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'class-megamenu-walker',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'class-xgenious-excerpt',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'class-xgenious-hook-customize',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'comments-modifications',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'customizer',
					'file-path' => XGENIOUS_INC
				),
				array(
					'file-name' => 'csf-group-fields',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'csf-group-fields-value',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'csf-metabox',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'csf-shortcode-options',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'csf-customizer',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'csf-options',
					'file-path' => XGENIOUS_THEME_SETTINGS
				),
				array(
					'file-name' => 'class-ajax-request',
					'file-path' => XGENIOUS_INC
				),
			);

			if (defined('XGENIOUS_MASTER_SELF_PATH')){
				// $includes_files[] = array(
				// 	'file-name' => 'xgenious-options-style',
				// 	'file-path' => XGENIOUS_DYNAMIC_STYLESHEETS
				// );
			}
			if (class_exists('WooCommerce')){
				$includes_files[] = array(
					'file-name' => 'class-woocommerce-customize',
					'file-path' => XGENIOUS_INC
				);
			}
			if (class_exists('Easy_Digital_Downloads')){
				$includes_files[] = array(
					'file-name' => 'class-edd-customize',
					'file-path' => XGENIOUS_INC
				);
			}

			if (is_array($includes_files) && !empty($includes_files)){
				foreach ($includes_files as $file){
					if (file_exists($file['file-path'].'/'.$file['file-name'].'.php')){
						require_once $file['file-path'].'/'.$file['file-name'].'.php';
					}
				}
			}

		}

		/**
		 * add editor style
		 * @since 1.0.0
		 * */
		public function add_editor_styles(){
			add_editor_style(get_template_directory_uri().'/assets/css/editor-style.css');
		}

	}//end class

	if (class_exists('Class_Xgenious_Init')){
		Class_Xgenious_Init::getInstance();
	}
}
