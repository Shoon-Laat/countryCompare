<?php
/**
 * dhl_custom_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dhl_custom_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dhl_custom_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dhl_custom_theme, use a find and replace
		* to change 'dhl_custom_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dhl_custom_theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dhl_custom_theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dhl_custom_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dhl_custom_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dhl_custom_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dhl_custom_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'dhl_custom_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dhl_custom_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dhl_custom_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dhl_custom_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dhl_custom_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dhl_custom_theme_scripts() {
	wp_enqueue_style( 'dhl_custom_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dhl_custom_theme-style', 'rtl', 'replace' );
	wp_enqueue_style( 'dhl_custom_theme_uikitstyle', get_template_directory_uri() . '/assets/css/uikit.min.css', array(), _S_VERSION );
    
    // Enqueue Custom Theme CSS
	wp_enqueue_style( 'dhl_custom_theme_customstyle', get_template_directory_uri() . '/assets/css/custom.css', array(), _S_VERSION );

	wp_enqueue_style( 'dhl_custom_theme_fontawesomestyle', get_template_directory_uri() . '/assets/css/fontawesome.css', array(), _S_VERSION );
    // Enqueue jQuery (WordPress includes jQuery by default, but if you’re using a custom version, make sure it’s compatible)
    // wp_enqueue_script( 'dhl_custom_theme-library', get_template_directory_uri() . '/assets/js/jquery.js', array(), _S_VERSION, true );

    // Enqueue UIkit JS (Make sure jQuery is loaded before UIkit)
    wp_enqueue_script( 'dhl_custom_theme-uikitlibrary', get_template_directory_uri() . '/assets/js/uikit.min.js', array( 'jquery' ), _S_VERSION, true );

    // Optionally, add UIkit Icons
    wp_enqueue_script( 'dhl_custom_theme-uikiticons',get_template_directory_uri() . '/assets/js/uikit-icons.min.js', array( ), _S_VERSION, true );

    // Enqueue Custom JavaScript Files
    wp_enqueue_script( 'dhl_custom_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'dhl_custom_theme-common', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), null, true );

	$post_id = 8;
	$custom_fields = get_post_meta($post_id);


	wp_localize_script('dhl_custom_theme-common', 'my_custom_data', $custom_fields);

	$country_images = json_encode(array(
        array(
            'name' => 'uk',
			"class" => 'map-1',
            'mapImgPath' => get_template_directory_uri().'/assets/img/img_uk.png',
            'flagImgPath' => get_template_directory_uri().'/assets/img/img_country_uk.png'
        ),
        array(
            'name' => 'germany',
			"class" => 'map-2',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_germany.png',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_germany.png'
        ),
        array(
            'name' => 'china',
			"class" => 'map-3',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_china.png',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_china.png'
        ),
		array(
            'name' => 'us',
			"class" => 'map-4',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_us.png',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_us.png'
        ),
        array(
            'name' => 'india',
			"class" => 'map-5',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_india.png',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_india.png'
        ),
        array(
            'name' => 'korea',
			"class" => 'map-6',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_korea.png',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_korea.png'
        ),
        array(
            'name' => 'japan',
			"class" => 'map-7',
            'mapImgPath' => get_template_directory_uri() . '/assets/img/img_jpn.webp',
            'flagImgPath' => get_template_directory_uri() . '/assets/img/img_country_jpn.png'
        ),
	));

	$inline_script = "const countryData = { images: $country_images };";

    wp_add_inline_script('dhl_custom_theme-common', $inline_script, 'before');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dhl_custom_theme_scripts' );

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


function expose_custom_fields_to_rest($response, $post, $request) {
    $custom_fields = get_post_meta($post->ID);
    $response->data['custom_fields'] = $custom_fields;
    return $response;
}

add_filter('rest_prepare_page', 'expose_custom_fields_to_rest', 10, 3);

// function add_favicon_to_admin_dashboard() {
//     echo '<link rel="icon" type="image/png" href="' . get_template_directory_uri() . '/assets/img/favicon.png">';
// }
// add_action('admin_head', 'add_favicon_to_admin_dashboard');


// http://localhost/project/dhl/wp-content/uploads/2024/11/favicon.png