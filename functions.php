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
	add_image_size( 'category-large', 600 ); //600 wide and however high, 600 high and however wide
	add_image_size( 'category-medium', 300 ); // 300 pixels wide (and unlimited height) AND 300 high and however wide
    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
    //add_image_size( 'archive-thumb', 200, 133, true);//cropped - not needed here - in media
    add_image_size( 'tiny-thumb', 100, 150, true);//cropped, for book and back-issue thumbnails

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

function qod_remove_extra_data( $data, $post, $context ) {
  // We only want to modify the 'view' context, for reading posts
  if ( $context !== 'view' || is_wp_error( $data ) ) {
    return $data;
  }
  
  // Here, we unset any data we don't want to see on the front end:
  unset( $data['author'] );
  unset( $data['status'] );
  unset( $data['date_gmt'] );
  unset( $data['modified'] );
  // continue unsetting whatever other fields you want

  return $data;
}

add_filter( 'json_prepare_post', 'qod_remove_extra_data', 12, 3 );
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
  $first_img = $matches [1][0];
  if(empty($first_img)){
		//$first_img = 'http://www.sensitiveskinmagazine.com.dev/wp-content/uploads/2016/10/SensitiveSkinLogo300-200-300x200.jpg';
		$first_image = null;
    //bloginfo('url')."/wp-content/images/tns/default-img_inverted.jpg";
	
  }
  return $first_img;
}
/** used in the Related Posts plugin - good here too! **/

function get_excerpt_by_id($post_id, $numChars){
        $the_post = get_post($post_id); //Gets post ID
        $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
		if ($numChars===null){
			 $excerpt_length = 244; //Sets excerpt length by character count
		}else{
			 $excerpt_length = $numChars; 
		}
       
        $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
        if(strlen($the_excerpt) >= $excerpt_length) :
            $words =  substr($the_excerpt, 0, $excerpt_length).'...';
        endif;
		if (strlen($the_excerpt) <= 144):
			$words = get_the_excerpt();
		endif;

        return $words;
    }


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



/** uses the Google CDN version of Jquery instead of the WP version, and does NOT load it in the Head*/
/*
add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
        wp_enqueue_script('jquery');
    }
}
*/

/** ENABLE HTTPS TRANSPORT HEADERS*/
add_action( 'send_headers', 'tgm_io_strict_transport_security' );
/**
 * Enables the HTTP Strict Transport Security (HSTS) header.
 *
 * @since 1.0.0
 */
function tgm_io_strict_transport_security() {
 
    header( 'Strict-Transport-Security: max-age=10886400' );
 
}

/** fixe og url to see all fb likes*/
function update_og_url($url) {
  //return "http://www.sensitiveskinmagazine.com";
  return false;
}
//add_filter('wpseo_opengraph_url', 'update_og_url', 10, 1);
/**
 * Enqueue scripts and styles.
 */
function sensitive_skin_bootstrap_scripts() {
	//wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', 'all' );
	//wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', 'all' );
	//wp_enqueue_style( 'bootstrap-social', get_template_directory_uri() . '/css/bootstrap-social.min.css', array(), '4.4.0', 'all' );

	/* we have particular ssm stles, leftover from older versions - load these BEFORE bootstrap styles, so bootstrap is favored */
	//wp_register_style( 'ssm-styles', get_template_directory_uri().'/css/ssm.min.css', array(), filemtime( get_template_directory().'/css/ssm.min.css' ), 'all' );
    //wp_enqueue_style( 'ssm-styles' );
	wp_register_style( 'ssm-styles', get_template_directory_uri().'/css/output.min.css', array(), filemtime( get_template_directory().'/css/output.min.css' ), 'all' );
    wp_enqueue_style( 'ssm-styles' );

	//wp_register_style( 'sensitive-skin-bootstrap-style', get_stylesheet_uri(), array(), '10-23-16', 'all' );
	//wp_enqueue_style( 'sensitive-skin-bootstrap-style', get_stylesheet_uri() );

	wp_enqueue_script( 'respond-js', get_template_directory_uri() . '/js/respond.min.js', array('jquery'), '1.4.2', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'sensitive-skin-bootstrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '2.01', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '3.1.8', true );

	/* my custom jquery scripts - handles isotope, etc. */
	wp_enqueue_script( 'sensitive-skin-bootstrap-main', get_template_directory_uri() . '/js/main.js', array(), '3.3.5', true );

	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', array(), '1.0', true );

	wp_enqueue_script( 'sensitive-skin-bootstrap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/* handles drag and drop for Nancy cut up post */
		wp_enqueue_script('preload', "https://code.createjs.com/createjs-2015.05.21.min.js", array(), '0.6.0', true);
    	wp_enqueue_script( 'random-image',  '/wp-content/js/random-image-dnd.js', array('preload', 'underscore'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sensitive_skin_bootstrap_scripts' );



// add_action( 'pre_amp_render_post', 'gd_amp_add_custom_actions' );

// function gd_amp_add_custom_actions() {
//     //adding CTAs only the b2b blog at this point
//     $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//     $pos = strpos($url, 'employers.glassdoor');
//     if ($pos){
//         add_filter( 'the_content', 'gd_amp_add_ctas' );
//     }

// }

// function gd_amp_add_ctas( $content ) {
//     $cta_title = '<h2 class="aligncenter gd-amp-center">' .  __('Getting Started', 'gd') . '</h2>';
//     $table_in = '<div class="gd-amp-center">';

//     $cta_free = '<div><a href="/employers/index.htm?source=blog-amp" class="btn gd-amp-btn gradient gd-amp-btn-1"><span>' . __('Get a FREE Employer Account', 'gd') . '</span></a></div>';
//     $table_middle = '<div><span>' . __(' -or- ', 'gd') . '</span></div>';
//     $cta_job = '<div><a href="/post-job?src=b2b-blog-amp" class="btn gradient gd-amp-btn gd-amp-btn-2 margBot  noMarg"><span>' . __('Post a Job', 'gd') . '</span></a></div>';
//     $table_out = '</div>';
//     $content = $content . $cta_title . $table_in . $cta_free . $table_middle . $cta_job . $table_out;

//     return $content;
// }


add_action( 'amp_post_template_css', 'ssm_amp_additional_css_styles' );

/** overrides built-in css */
function ssm_amp_additional_css_styles( $amp_template ) {
    // only CSS here please...
    ?>
    #top{
        background: #000;
    }
    .amp-wp-header{
        background-color: #000;
    }
    .amp-wp-header a{
        color: white;
    }
   a {
        color: #337ab7;
        text-decoration: none;
    }


    body {
        font-family: "Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
    }

    div.amp-wp-meta.amp-wp-comments-link, div.amp-wp-meta.amp-wp-tax-category{
        display: none;
    }

    .amp-wp-footer div{
        display: none;
    }

    .recommended-posts{
        display: none;
    }
	figcaption{
		font-size: 12px;
		line-height: 1.2em;
		padding-top: 7px;
	}

    .amp-wp-byline amp-img{
        display: none;
    }
	div.amp-wp-meta.amp-wp-posted-on{
		display: none;
	}
	span.amp-wp-author{
		font-weight: bold;
		text-transform: uppercase;
	}

    .gd-amp-btn{
        box-sizing: border-box;
        display: inline-block;
        height: 34px;
        padding: 0 21px;
        text-align: center;
        border-radius: 2px;
        vertical-align: middle;
        outline: 0;
        white-space: nowrap;
        font-weight: 700;
        font-size: 14px;
    }
    .gd-amp-btn-1 {
        background-color: #2c84cc;
        box-shadow: 0 2px 0 0 #336c9b;
        border-width: 0;
        color: white;
    }
    .gd-amp-btn-2{
        background-color: #f1f1f1;
        box-shadow: 0 2px 0 0 #ccc;
        border: 1px solid #ccc;
    }
    .gd-amp-center{
        text-align: center;
        width: 100%;
    }
    .gd-amp-align span{
        position: relative:
        top: 3.5px;
    }
    <?php

}
/** allows external files to access the JSON file */
//header("Access-Control-Allow-Origin: *");

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

require get_template_directory() . '/lib/image-inventory.php';




