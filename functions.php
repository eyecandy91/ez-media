<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', '_s' ),
			'menu-2' => esc_html__( 'Secondary', '_s' ),
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
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
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
		
	}
	
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * add mobile version of logo
 */
function mobile_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo_mobile' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_mobile', array(
        'label'    => __( 'Logo (mobile version)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_mobile',
    ) ) );
}
add_action( 'customize_register', 'mobile_logo_customize_register' );

/**
 * add footer version of logo
 */
function footer_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo_footer' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer', array(
        'label'    => __( 'Logo (footer version)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_footer',
    ) ) );
}
add_action( 'customize_register', 'footer_logo_customize_register' );

/**
 * remove custom logo classes
 */
function helpwp_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-item is-hidden-touch', $html );
	$html = str_replace('custom-logo', 'logo-main', $html );
	return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '1', true );
	wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-2.2.4.min.js', array(), null, true);

}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_true');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );
function myplugin_register_settings() {
	add_option( 'myplugin_option_name', 'This is my option value.');
	register_setting( 'myplugin_options_group', 'myplugin_option_name', 'myplugin_callback' );
 }
 add_action( 'admin_init', 'myplugin_register_settings' );

// Remove contatc form scripts unless on contact page
add_action( 'wp_footer', 'redirect_cf7' );

function redirect_cf7() {
	if(is_page('contact')) {
		?>
		<script type="text/javascript">
		document.addEventListener( 'wpcf7mailsent', function( event ) {
		       location = '<?php the_field('redirect', 96); ?>';
		}, false );
		</script>
		<?php
	}
}

function custom_contact_script_conditional_loading(){
      //  Edit page IDs here
      if(! is_page('contact') )
      {
         wp_dequeue_script('contact-form-7'); // Dequeue JS Script file.
         wp_dequeue_style('contact-form-7');  // Dequeue CSS file.
         wp_dequeue_style('cf7cf-style');  // Dequeue CSS file.
      }
   }

add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );

// Remove Query String from Static Resources
function remove_css_js_ver( $src ) {
if( strpos( $src, '?ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_css_js_ver', 10, 2 );

/**
 * Remove all the BS trash
 */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
      
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
      
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink


add_filter('jpeg_quality', create_function( '', 'return 85;' ) );

function pundits_redirect () {
    global $wp_query, $post;

    if ( is_attachment() ) {
        $post_parent = $post->post_parent;

        if ( $post_parent ) {
            wp_redirect( get_permalink($post->post_parent), 301 );
            exit;
        }

        $wp_query->set_404();

        return;
    }

    if ( is_author() || is_date() ) {
        $wp_query->set_404();
    }
}
add_action( 'template_redirect', 'pundits_redirect' );


// custom post for pricing table
function custom_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Pricing', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'pricing', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Pricing', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Parent pricing', 'twentythirteen' ),
			'all_items'           => __( 'All Pricing', 'twentythirteen' ),
			'view_item'           => __( 'View pricing', 'twentythirteen' ),
			'add_new_item'        => __( 'Add New pricing', 'twentythirteen' ),
			'add_new'             => __( 'Add New pricing', 'twentythirteen' ),
			'edit_item'           => __( 'Edit pricing', 'twentythirteen' ),
			'update_item'         => __( 'Update pricing', 'twentythirteen' ),
			'search_items'        => __( 'Search pricing', 'twentythirteen' ),
			'not_found'           => __( 'Not Found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
		);
	
	// Set other options for Custom Post Type
	
		$args = array(
			'label'               => __( 'Pricing', 'twentythirteen' ),
			'description'         => __( 'Pricing', 'twentythirteen' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => array( 'Pricing' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			'taxonomies'            => array( 'category'),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
	
		// Registering your Custom Post Type
		register_post_type( 'Pricing', $args );
	
}
	
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
	
add_action( 'init', 'custom_post_type', 0 );

// custom post for Clients table
function custom_post_type_2() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Clients', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'Clients', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Clients', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Parent clients', 'twentythirteen' ),
			'all_items'           => __( 'All clients', 'twentythirteen' ),
			'view_item'           => __( 'View clients', 'twentythirteen' ),
			'add_new_item'        => __( 'Add New clients', 'twentythirteen' ),
			'add_new'             => __( 'Add New clients', 'twentythirteen' ),
			'edit_item'           => __( 'Edit clients', 'twentythirteen' ),
			'update_item'         => __( 'Update clients', 'twentythirteen' ),
			'search_items'        => __( 'Search clients', 'twentythirteen' ),
			'not_found'           => __( 'Not Found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
		);
	
	// Set other options for Custom Post Type
	
		$args = array(
			'label'               => __( 'Clients', 'twentythirteen' ),
			'description'         => __( 'Clients', 'twentythirteen' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'thumbnail', ),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => array( 'Clients' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			// 'taxonomies'            => array( 'category'),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
	
		// Registering your Custom Post Type
		register_post_type( 'Clients', $args );
	
}
	
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
	
add_action( 'init', 'custom_post_type_2', 0 );


	/**
	 * Create A Simple Theme Options Panel
	 *
	 */
	
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	// Start Class
	if ( ! class_exists( 'WPEX_Theme_Options' ) ) {
	
		class WPEX_Theme_Options {
	
			/**
			 * Start things up
			 *
			 * @since 1.0.0
			 */
			public function __construct() {
	
				// We only need to register the admin panel on the back-end
				if ( is_admin() ) {
					add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
					add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
				}
	
			}
	
			/**
			 * Returns all theme options
			 *
			 * @since 1.0.0
			 */
			public static function get_theme_options() {
				return get_option( 'theme_options' );
			}
	
			/**
			 * Returns single theme option
			 *
			 * @since 1.0.0
			 */
			public static function get_theme_option( $id ) {
				$options = self::get_theme_options();
				if ( isset( $options[$id] ) ) {
					return $options[$id];
				}
			}
	
			/**
			 * Add sub menu page
			 *
			 * @since 1.0.0
			 */
			public static function add_admin_menu() {
				add_menu_page(
					esc_html__( 'Theme Settings', 'text-domain' ),
					esc_html__( 'Theme Settings', 'text-domain' ),
					'manage_options',
					'theme-settings',
					array( 'WPEX_Theme_Options', 'create_admin_page' )
				);
			}
	
			/**
			 * Register a setting and its sanitization callback.
			 *
			 * We are only registering 1 setting so we can store all options in a single option as
			 * an array. You could, however, register a new setting for each option
			 *
			 * @since 1.0.0
			 */
			public static function register_settings() {
				register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
			}
	
			/**
			 * Sanitization callback
			 *
			 * @since 1.0.0
			 */
			public static function sanitize( $options ) {
	
				// If we have options lets sanitize them
				if ( $options ) {
	
					// Checkbox
					// if ( ! empty( $options['checkbox_example'] ) ) {
					// 	$options['checkbox_example'] = 'on';
					// } else {
					// 	unset( $options['checkbox_example'] ); // Remove from options if not checked
					// }
	
					// // Input
					// if ( ! empty( $options['input_example'] ) ) {
					// 	$options['input_example'] = sanitize_text_field( $options['input_example'] );
					// } else {
					// 	unset( $options['input_example'] ); // Remove from options if empty
					// }

					// Input
					if ( ! empty( $options['footer_copyright'] ) ) {
						$options['footer_copyright'] = sanitize_text_field( $options['footer_copyright'] );
					} else {
						unset( $options['footer_copyright'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['telephone'] ) ) {
						$options['telephone'] = sanitize_text_field( $options['telephone'] );
					} else {
						unset( $options['telephone'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['twitter_handle'] ) ) {
						$options['twitter_handle'] = sanitize_text_field( $options['twitter_handle'] );
					} else {
						unset( $options['twitter_handle'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['twitter_url'] ) ) {
						$options['twitter_url'] = sanitize_text_field( $options['twitter_url'] );
					} else {
						unset( $options['twitter_url'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['address'] ) ) {
						$options['address'] = sanitize_text_field( $options['address'] );
					} else {
						unset( $options['address'] ); // Remove from options if empty
					}

					// Input
					if ( ! empty( $options['email_address'] ) ) {
						$options['email_address'] = sanitize_text_field( $options['email_address'] );
					} else {
						unset( $options['email_address'] ); // Remove from options if empty
					}
					
					// Input
					if ( ! empty( $options['email_address'] ) ) {
						$options['email_address'] = sanitize_text_field( $options['email_address'] );
					} else {
						unset( $options['email_address'] ); // Remove from options if empty
					}
	
					// // Select
					// if ( ! empty( $options['select_example'] ) ) {
					// 	$options['select_example'] = sanitize_text_field( $options['select_example'] );
					// }
	
				}
	
				// Return sanitized options
				return $options;
	
			}
	
			/**
			 * Settings page output
			 *
			 * @since 1.0.0
			 */
			public static function create_admin_page() { ?>
	
				<div class="wrap">
	
					<h1><?php esc_html_e( 'EZ Options', 'text-domain' ); ?></h1>
	
					<form method="post" action="options.php">
	
						<?php settings_fields( 'theme_options' ); ?>
	
						<table class="form-table wpex-custom-admin-login-table">
	
							<!-- <?php // Checkbox example ?>
							<tr valign="top">
								<th scope="row"><?php// esc_html_e( 'Checkbox Example', 'text-domain' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'checkbox_example' ); ?>
									<input type="checkbox" name="theme_options[checkbox_example]" <?php// checked( $value, 'on' ); ?>> <?php// esc_html_e( 'Checkbox example description.', 'text-domain' ); ?>
								</td>
							</tr>
	
							<?php// // Text input example ?>
							<tr valign="top">
								<th scope="row"><?php// esc_html_e( 'Input Example', 'text-domain' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'input_example' ); ?>
									<input type="text" name="theme_options[input_example]" value="<?php// echo esc_attr( $value ); ?>">
								</td>
							</tr> -->
							
							<?php // footer copyright ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Footer copyright text', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'footer_copyright' ); ?>
									<input type="text" name="theme_options[footer_copyright]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<?php // telephone number ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Telephone number', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'telephone' ); ?>
									<input type="text" name="theme_options[telephone]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<?php // twitter handle ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Twitter handle', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'twitter_handle' ); ?>
									<input type="text" name="theme_options[twitter_handle]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<?php // twitter url ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Twitter url', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'twitter_url' ); ?>
									<input type="text" name="theme_options[twitter_url]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<?php // twitter url ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Address', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'address' ); ?>
									<textarea type="text" name="theme_options[address]" cols="50" rows="8" /><?php echo esc_attr( $value ); ?></textarea>
								</td>
							</tr>

							<?php // email ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Email address', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'email_address' ); ?>
									<input type="text" name="theme_options[email_address]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>
	
							<!-- <?php// // Select example ?>
							<tr valign="top" class="wpex-custom-admin-screen-background-section">
								<th scope="row"><?php// esc_html_e( 'Select Example', 'text-domain' ); ?></th>
								<td>
									<?php// $value = self::get_theme_option( 'select_example' ); ?>
									<select name="theme_options[select_example]">
										<?php//
										//$options = array(
										//	'1' => esc_html__( 'Option 1', 'text-domain' ),
										//	'2' => esc_html__( 'Option 2', 'text-domain' ),
										//	'3' => esc_html__( 'Option 3', 'text-domain' ),
										//);
										//foreach ( $options as $id => $label ) { ?>
											<option value="<?php// echo esc_attr( $id ); ?>" <?php// selected( $value, $id, true ); ?>>
												<?php// echo strip_tags( $label ); ?>
											</option>
										<?php// } ?>
									</select>
								</td>
							</tr> -->
	
						</table>
	
						<?php submit_button(); ?>
	
					</form>
	
				</div><!-- .wrap -->
			<?php }
	
		}
	}
	new WPEX_Theme_Options();
	
	// Helper function to use in your theme to return a theme option value
	function myprefix_get_theme_option( $id = '' ) {
		return WPEX_Theme_Options::get_theme_option( $id );
	}

	/**
 * Custom pagination
 */
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}
