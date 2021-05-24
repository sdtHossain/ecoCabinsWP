<?php
/**
 * ecoCabins functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ecoCabins
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ecocabins_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ecocabins_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ecoCabins, use a find and replace
		 * to change 'ecocabins' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ecocabins', get_template_directory() . '/languages' );

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
				'topmenu' => esc_html__( 'Top Menu', 'ecocabins' ),
				'footermenu' => esc_html__( 'Footer Menu', 'ecocabins' ),
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
				'ecocabins_custom_background_args',
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
				'height'      => 135,
				'width'       => 26,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ecocabins_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecocabins_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecocabins_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecocabins_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecocabins_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ecocabins' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ecocabins' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ecocabins_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ecocabins_scripts() {
	wp_enqueue_style( 'google-fonts-merriweather', '//fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap', array(), time() );
	wp_enqueue_style( 'google-fonts-rubik', '//fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap', array(), time() );
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'ecocabins-theme-style', get_template_directory_uri() . '/dist/styles.css', array(), _S_VERSION );
//	wp_enqueue_style( 'ecocabins-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ecocabins-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ecocabins-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ecocabins-theme-js', get_template_directory_uri() . '/dist/app.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecocabins_scripts' );

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
 * Add class to topmenu nav li
 */
function ec_menu_li_classes($classes, $item, $args) {
    if( 'topmenu' == $args->theme_location ) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'ec_menu_li_classes', 10, 3);

/**
 * Add class to topmenu nav anchor
 */
function ec_menu_anchor_classes($classes, $item, $args) {
    if( 'topmenu' == $args->theme_location ) {
        $classes['class'] = 'nav-link';
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'ec_menu_anchor_classes', 10, 3);


/**
 * Add classes to topmenu last nav item
 */
function ec_last_menu_item_classes($items) {
    if (has_nav_menu("topmenu")) {
        $items[count($items)]->classes[] = 'last';
        return $items;
    }
}
add_filter('wp_nav_menu_objects', 'ec_last_menu_item_classes');

/**
 * Add custom header
 */
function ec_page_header() {
    if ( is_front_page() ) {
        if ( current_theme_supports( "custom-header") ) {
            ?>
            <style>
                .hero {
                    background-image: url(<?php echo header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: center center;
                    background-size: cover;
                }
                .hero-content-left {
                    color: #<?php echo get_header_textcolor(); ?>;
                }
            </style>
            <?php
        }
    }
}
add_action( "wp_head", "ec_page_header", 11);


/**
 * Add class to footermenu nav li
 */
function ec_footer_menu_li_classes($classes, $item, $args) {
    if( 'footermenu' == $args->theme_location ) {
        $classes[] = 'list-inline-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'ec_footer_menu_li_classes', 10, 3);

/**
 * Add class to footermenu nav anchor
 */
function ec_footer_menu_anchor_classes($classes, $item, $args) {
    if( 'footermenu' == $args->theme_location ) {
        $classes['class'] = 'text-white-60 text-decoration-none';
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'ec_footer_menu_anchor_classes', 10, 3);
