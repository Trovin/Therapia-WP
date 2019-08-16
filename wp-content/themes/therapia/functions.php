<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() {
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
        'menu-1' => esc_html__( 'Primary', 'theme' ),
        'menu-2' => esc_html__( 'Footer', 'theme' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	// Styles
    wp_enqueue_style( 'bootstrap4-grid', get_template_directory_uri() . '/assets/css/grid.min.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
    wp_enqueue_style( 'niceSelect', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
	wp_enqueue_style( 'theme-main-style', get_template_directory_uri() . '/assets/dist/main.css' );
	wp_enqueue_style( 'theme-custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
    // Scripts
    wp_enqueue_script( 'select-js', get_template_directory_uri() . '/assets/scripts/jquery.nice-select.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/scripts/slick.js', array('jquery'), false, true );
    wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/assets/scripts/all.js');
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), false, true );
    wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/assets/scripts/parallax.min.js' );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

/**
 * Create custom post types.
 */
require get_template_directory() . '/include/custom-post-type.php';

/**
 * Include walker-menu
 */
require get_template_directory() . '/include/walker-menu.php';


/**
 * Add sub menu filter.
 */
add_filter('wp_nav_menu_objects', 'css_for_nav_parrent');
function css_for_nav_parrent( $items ){
    foreach( $items as $item ){
        if( __nav_hasSub( $item->ID, $items ) )
            $item->classes[] = 'menu-parent-item';
    }
    return $items;
}
function __nav_hasSub( $item_id, $items ){
    foreach( $items as $item ){
        if( $item->menu_item_parent && $item->menu_item_parent == $item_id )
            return true;
    }
    return false;
}


/**
 * Add bradcrums filter.
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'my_breadcrumbs_delimiter');
function my_breadcrumbs_delimiter($args) {
    $args['delimiter'] = '<span class="breadcrum-icon"> <i class="fas fa-arrow-right"></i> </span>';
    return $args;
}


/**
 *  Add svg support
 * */
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Add custom header.
 */
add_theme_support( 'custom-header' );


/**
 * Add class to primary menu li and links.
 */
function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'menu-1') {
        $classes[] = 'main-nav__li';
    }
    return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);

//li a add class
function add_link_atts($atts) {
    $atts['class'] = "main-nav__link main-nav__link-hover";
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

/**
 * Add acf theme options page.
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


/**
 * Add woocomerce.
 */
add_theme_support( 'woocommerce' );


/**
 * Woocomerce remove tabs headling.
 */
// Remove the Product Description Title
add_filter('woocommerce_product_description_heading', 'hjs_product_description_heading');
function hjs_product_description_heading() {
    return '';
}


/**
 * Woocomerce remove revievs counter.
 */
add_filter( 'woocommerce_product_tabs', 'wp_woo_rename_reviews_tab', 98);
function wp_woo_rename_reviews_tab($tabs) {
    global $product;
    $check_product_review_count = $product->get_review_count();
    if ( $check_product_review_count == 0 ) {
        $tabs['reviews']['title'] = 'Reviews';
    } else {
        $tabs['reviews']['title'] = 'Reviews('.$check_product_review_count.')';
    }
    return $tabs;
}


/**
 * Woocomerce change tabs name.
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tab', 98);
function woo_rename_tab($tabs) {
    $tabs['description']['title'] = 'Product Description';
    return $tabs;
}


/**
 * Woocomerce change single variable product price.
 */
function shuffle_variable_product_elements(){
    if ( is_product() ) {
        global $post;
        $product = wc_get_product( $post->ID );
        if ( $product->is_type( 'variable' ) ) {
            remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_single_variation', 20 );
        }
    }
}
add_action( 'woocommerce_before_single_product', 'shuffle_variable_product_elements' );

add_filter( 'woocommerce_product_variation_title_include_attributes', 'custom_product_variation_title', 10, 2 );
function custom_product_variation_title($should_include_attributes, $product){
    $should_include_attributes = false;
    return $should_include_attributes;
}


/**
 * Woocomerce cropp image size.
 */
add_image_size( 'custom-size-small', 60, 60, true );
add_image_size( 'custom-size-large', 300, 220, true );


/**
 * Woocomerce listening counter.
 */
function woocommerce_header_add_to_cart_fragment( $fragments = array()) {
    ob_start();
    $cart_count = WC()->cart->get_cart_contents_count();
    ?>

    <span id="cart-count" class="cart-counter">
        <?php echo $cart_count;?>
    </span>

    <?php
    $fragments['#cart-count'] = ob_get_clean();

    return $fragments;
} // end function woocommerce_add_to_cart_fragments
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment2( $fragments = array()) {
    ob_start();
    $cart_count = WC()->cart->get_cart_contents_count();
    ?>

    <span id="cart-count2" class="cart-counter">
        <?php echo $cart_count;?>
    </span>

    <?php
    $fragments['#cart-count2'] = ob_get_clean();

    return $fragments;
} // end function woocommerce_add_to_cart_fragments
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment2');




