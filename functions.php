<?php
/**
 * Sensitive Skin Bootstrap functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sensitive_Skin_Bootstrap
 */

if ( ! function_exists( 'sensitive_skin_bootstrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sensitive_skin_bootstrap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sensitive Skin Bootstrap, use a find and replace
	 * to change 'sensitive-skin-bootstrap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sensitive-skin-bootstrap', get_template_directory() . '/languages' );

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
	add_image_size( 'category-large', 600 );
	add_image_size( 'category-medium', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
    add_image_size( 'archive-thumb', 200, 133, true);//cropped

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'sensitive-skin-bootstrap' ),
	) );

	register_nav_menus( array(
		'footer-menu' => esc_html__( 'Footer Menu', 'sensitive-skin-bootstrap' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sensitive_skin_bootstrap_custom_background_args', array(
		'default-color' => 'ccffff',
		'default-image' => '',
	) ) );
}
endif; // sensitive_skin_bootstrap_setup
add_action( 'after_setup_theme', 'sensitive_skin_bootstrap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


function sensitive_skin_bootstrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sensitive_skin_bootstrap_content_width', 640 );
}
add_action( 'after_setup_theme', 'sensitive_skin_bootstrap_content_width', 0 );


/*customizing jetpack so it does not place social and like buttons after content automatically
otherwise the buttons show up in the bottom links area. Added custom code to content-single so 
social buttons show up before AND after content*/
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );
/*************************NAVIGATION***********************/

/*great pagination script! no worries about nested categories */
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 0; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 20; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = '&laquo; previous'; //text of the "Previous page" link
  $a['next_text'] = 'next &raquo;'; //text of the "Next page" link
 
  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

/* used when grabbing thumbnails from posts; if no thumbnail, or assigned post-img, grab the first image off the page and resize it */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = '';
    //bloginfo('url')."/wp-content/images/tns/default-img_inverted.jpg";
  }
  return $first_img;
}
/* used with the old music player system*/
// function popitup(url, params) {
//             newwindow=window.open(url,'name', params);
//             if (window.focus) {newwindow.focus()}
//             return false;
//         }

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sensitive_skin_bootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sensitive-skin-bootstrap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Download', 'sensitive-skin-bootstrap' ),
		'id'            => 'download',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'sensitive_skin_bootstrap_widgets_init' );


// add_action( 'init', 'prowp_register_my_post_types' );

// function prowp_register_my_post_types() {

//     register_post_type( 'books', array(
// 		'labels' => array( 'name' => 'Books' ),
// 		'public' => true, ))
// };

// }
/**
* nRegister custom posts for books
*/
//function sensitive_skin_bootstrap_register_post_types(){
  
  //register_post_type('books', $args);
 //    register_post_type( 'books', array(
	// 'labels' => array( 'name' => 'Books' ),
	// 'public' => true, )
//};
      //     $labels = array(
      //   'name'=>'Books',
      //   'singular_name'=>'Book',
      //   'add_new'=>'Add New Book',
      //   'edit_item'=>'Edit Book',
      //   'new_item'=>'New Book',
      //   'all_items'=>'All Books',
      //   'view_item'=>'View Book',
      //   'search_items'=>'Search Books',
      //   'not_found'=>'No Books Found',
      //   'not_found_in_trash'=>'No books found in trash.',
      //   'menu_name'=>'Books'
      //   );
      // $args = array(
      //   'labels'=>$labels,
      //   'public'=>true,
      //   'show_in_nav_menus'=>true,
      //   'has_archive'=>true,
      //   'taxonomies'=>array('category', 'post_tag'),
      //   'rewrite'=>array('slug'=>'books'),
      //   'supports'=>array('title', 'editor', 'author', 'thumbnail', 'custom-fields')
      //   );

    
  
//}
//add_action ('init', 'sensitive-skin-bootstrap_register_post_types');

/**
 * Enqueue scripts and styles.
 */
function sensitive_skin_bootstrap_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', 'all' );
	wp_enqueue_style( 'bootstrap-social', get_template_directory_uri() . '/css/bootstrap-social.css', array(), '4.4.0', 'all' );

	/* we have particular ssm stles, leftover from older versions - load these BEFORE bootstrap styles, so bootstrap is favored */
	wp_enqueue_style( 'ssm-styles', get_template_directory_uri() . '/css/ssm.min.css', array(), '1.0', 'all' );

	wp_enqueue_style( 'sensitive-skin-bootstrap-style', get_stylesheet_uri() );

	wp_enqueue_script( 'respond-js', get_template_directory_uri() . '/js/respond.min.js', array('jquery'), '1.4.2', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'sensitive-skin-bootstrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '2.01', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '3.1.8', true );

	/* my custom jquery scripts - handles isotope, etc. */
	wp_enqueue_script( 'sensitive-skin-bootstrap-main', get_template_directory_uri() . '/js/main.js', array(), '3.3.5', true );

	wp_enqueue_script( 'sensitive-skin-bootstrap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/* handles drag and drop for Nancy cut up post */
	wp_enqueue_script('preload', "https://code.createjs.com/createjs-2015.05.21.min.js", array(), '0.6.0', true);
    wp_enqueue_script( 'random-image',  '/wp-content/js/random-image-dnd.js', array('preload', 'underscore'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sensitive_skin_bootstrap_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Bootstrap Menu.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Load Custom Post Types.
 */
require get_template_directory() . '/inc/post-types/CPT.php';
require get_template_directory() . '/inc/post-types/register-book.php';
//require get_template_directory() . '/inc/post-types/register-backissues.php';

/**
 * Easy Digital Downloads - change post type from "download" to "issue"
 */
require get_template_directory() . '/inc/edd.php';
define('EDD_SLUG', 'downloads'); 


