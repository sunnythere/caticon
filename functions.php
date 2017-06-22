<?php
/**
 * caticon functions and definitions
 *
 * @package caticon
 */

if ( ! function_exists( 'caticon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function caticon_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
  load_theme_textdomain( 'caticon', get_template_directory() . '/languages' );

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
    'header_menu' => esc_html__( 'Header Menu', 'caticon'),
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
  add_theme_support( 'custom-background', apply_filters( 'caticon_custom_background_args', array(
    'default-color' => '555555',
    //'default-image' => 'get_theme_file_uri()' . '/img/smalldot.png',
    //'default-repeat' => 'repeat'
  ) ) );

  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'caticon_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function caticon_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'caticon_content_width', 640 );
}
add_action( 'after_setup_theme', 'caticon_content_width', 0 );


/**
 * Register custom 'caticon_event' post type
 */






/**
 * Register 'event' post taxonomies
 */

// function caticon_reg_event_tax() {

//   register_taxonomy(
//     'age',
//     'caticon_event',
//     array(
//       'labels'  => array(
//         'name'  =>  __('Age Range', 'taxonomy general name'),
//          'singular_name' => __('Age Range', 'taxonomy singular name'),
//          'search_items'   => __('Search Age Ranges'),
//          'all_items'      => __('All Age Range Categories'),
//          'edit_item'      => __('Edit Age Range'),
//          'update_item'    => __('Update Age Range'),
//          'add_new_item'   => __('Add New Age Range Category'),
//          'new_item_name'  => __('New Age Range'),
//          'menu_item'      => __('Age Range')
//        ),
//       'public'      => true,
//       'rewrite'     => array('slug' => 'age')
//     )
//   );
// }
// add_action( 'init', 'caticon_reg_event_tax' );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function caticon_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'caticon' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'caticon' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'caticon_widgets_init' );


/**
 * preconnect for Google fonts
 */
function caticon_resource_hints( $urls, $relation_type ) {
  if ( wp_style_is( 'caticon-style', 'queue' ) && 'preconnect' === $relation_type ) {
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin',
    );
  }

  return $urls;
}
add_filter( 'wp_resource_hints', 'caticon_resource_hints', 10, 2 );

/**
 * Google fonts
 */
function custom_add_google_fonts() {
  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,800|Rufina:400,700', false );
  }
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );


/**
 * Enqueue scripts and styles.
 */

function caticon_scripts() {

  wp_enqueue_style( 'style', get_stylesheet_uri() );

  wp_enqueue_script( 'caticon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'caticon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array());

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'caticon_scripts' );



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function caticon_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'caticon_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
