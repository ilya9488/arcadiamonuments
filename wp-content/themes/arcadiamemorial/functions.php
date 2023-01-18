<?php
  /**
   * arcadiamemorial functions and definitions
   *
   * @link https://developer.wordpress.org/themes/basics/theme-functions/
   *
   * @package arcadiamemorial
   */

  if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
  }

  function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCU1bc0R8O5dAHLCAztbZNcKCV88gRno-4';
    return $api;
  }
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

  include get_template_directory() . '/acf-includes/ACF_Field_Unique_ID.php';
  ACF_Unique_ID_Field\ACF_Field_Unique_ID::init();

  if (!function_exists('arcadiamemorial_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function arcadiamemorial_setup()
    {
      /*
       * Make theme available for translation.
       * Translations can be filed in the /languages/ directory.
       * If you're building a theme based on arcadiamemorial, use a find and replace
       * to change 'arcadiamemorial' to the name of your theme in all the template files.
       */
      load_theme_textdomain('arcadiamemorial', get_template_directory() . '/languages');

      // Add default posts and comments RSS feed links to head.
      add_theme_support('automatic-feed-links');

      /*
       * Let WordPress manage the document title.
       * By adding theme support, we declare that this theme does not use a
       * hard-coded <title> tag in the document head, and expect WordPress to
       * provide it for us.
       */
      add_theme_support('title-tag');

      /*
       * Enable support for Post Thumbnails on posts and pages.
       *
       * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
       */
      add_theme_support('post-thumbnails');

      // This theme uses wp_nav_menu() in one location.
      register_nav_menus(
        array(
          'menu-1' => esc_html__('Header', 'arcadiamemorial'),
          'menu-2' => esc_html__('Personal Area', 'arcadiamemorial'),
          'menu-3' => esc_html__('Header Login', 'arcadiamemorial'),
          'menu-4' => esc_html__('Header No-Login buttons', 'arcadiamemorial'),
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
          'arcadiamemorial_custom_background_args',
          array(
            'default-color' => 'ffffff',
            'default-image' => '',
          )
        )
      );

      // Add theme support for selective refresh for widgets.
      add_theme_support('customize-selective-refresh-widgets');

      /**
       * Add support for core custom logo.
       *
       * @link https://codex.wordpress.org/Theme_Logo
       */
      add_theme_support(
        'custom-logo',
        array(
          'height' => 250,
          'width' => 250,
          'flex-width' => true,
          'flex-height' => true,
        )
      );
    }
  endif;
  add_action('after_setup_theme', 'arcadiamemorial_setup');

  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  function arcadiamemorial_content_width()
  {
    $GLOBALS['content_width'] = apply_filters('arcadiamemorial_content_width', 640);
  }

  add_action('after_setup_theme', 'arcadiamemorial_content_width', 0);

  /**
   * Register widget area.
   *
   * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
   */
  function arcadiamemorial_widgets_init()
  {
    register_sidebar(
      array(
        'name' => esc_html__('Sidebar', 'arcadiamemorial'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'arcadiamemorial'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
      )
    );
  }

  add_action('widgets_init', 'arcadiamemorial_widgets_init');

  /**
   * Enqueue scripts and styles.
   */
  define('RAND', mt_rand(100000, 999999));
  function directinvest_scripts()
  {
    //remove Gutenberg CSS
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    //remove Gutenberg CSS

    wp_enqueue_style('directinvest-critical', get_template_directory_uri() . '/static/css/header.min.css', array(), RAND);
    wp_deregister_script('jquery');
    wp_register_script('jquery', "//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js", array(), '3.5.1');
    wp_enqueue_script('directinvest-script', get_template_directory_uri() . '/static/js/common.min.js', array("jquery"), RAND, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }
  }

  add_action('wp_enqueue_scripts', 'directinvest_scripts');

  /**
   * Enqueue footer scripts and styles.
   */
  function directinvest_add_footer_styles()
  {
    wp_enqueue_style('directinvest-style', get_template_directory_uri() . '/static/css/style.min.css', array(), RAND);
  }

  add_action('get_footer', 'directinvest_add_footer_styles');

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
   * Custom post types.
   */
  require get_template_directory() . '/inc/post_types.php';

  /**
   * Load Jetpack compatibility file.
   */
  if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
  }
  
// search only by post type memorials
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'memorials');
  }
  return $query;
}
add_filter('pre_get_posts','SearchFilter');

// Register image size
  add_image_size('about-us', 500, 600, true);
  add_image_size('our-offers', 960, 752, true);
  add_image_size('answers-faq', 500, 685, true);
  add_image_size('more', 260, 65, true);
  add_image_size('concept_features', 65, 65, true);
  add_image_size('search-img', 160, 200, true);
  add_image_size('contact-us-form', 960, 630, true);
  add_image_size('memorial-photo', 350, 450, true);
  add_image_size('memorial-gallery', 255, 255, true);


// custom form login
require get_template_directory() . '/inc/castom-login-form.php';
require get_template_directory() . '/inc/forgot-password-form.php';
require get_template_directory() . '/inc/custom-signup-form.php';
require get_template_directory() . '/inc/webp-upload.php';

// Add an edit option to comment editing screen
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box() {
  add_meta_box( 'title', 'Comments Photos', 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

function extend_comment_meta_box ( $comment ) {
  $photos = get_comment_meta( $comment->comment_ID, 'photos' );
  wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );

  if(!empty($photos[0])){
    foreach($photos[0] as $photo){
      echo '<img width="300" src="' . $photo . '">';
    }
  }
}

function get_ajax_posts() {
    // The Query
    $ajax_count_posts = wp_count_posts('memorials')->publish;

    echo json_encode( $ajax_count_posts );
    exit;
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Main settings',
        'menu_title' => 'Settings theme',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));


}

if ( SITECOOKIEPATH != COOKIEPATH ) {
    setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
}

function delete_favorites() {

    $count_key = $_POST['postkey'];
    $postID= $_POST['postid'];
    $userID = $_POST['userid'];

    $user_favorites = $favorites = get_user_meta( $userID, $count_key, true );
    $favorites_saved = array_search($postID, $user_favorites);

    if( FALSE !== $favorites_saved ){
        // Remove $author_saved
        unset($user_favorites[$favorites_saved]);
        $favorites_arr = ( is_array( $user_favorites ) ) ? $user_favorites : array( $user_favorites );
        update_user_meta( $userID, $count_key, $favorites_arr );
    }

    wp_die();
}

add_action( 'wp_ajax_delete_favorites', 'delete_favorites' );
add_action( 'wp_ajax_nopriv_delete_favorites', 'delete_favorites' );

add_filter( 'preprocess_comment', 'wpb_preprocess_comment' );
function wpb_preprocess_comment($comment) {
    if ( strlen( $comment['comment_content'] ) > 4000 ) {
        wp_die('The comment is too long. Please write no more than 4000 characters.');
    }
    if ( strlen( $comment['comment_content'] ) < 20 ) {
        wp_die('The comment is too short. Please write at least 5 characters.');
    }
    return $comment;
}