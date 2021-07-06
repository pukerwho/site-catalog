<?php
include('inc/enqueues.php');
// require_once get_template_directory() . '/inc/TGM/example.php';

function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support('woocommerce');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/term-meta.php';

function genich_scripts() {
    wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/css/tailwind.css', false, time() );
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/css/bundle.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/js/all.js', '','',true);
};
add_action( 'wp_enqueue_scripts', 'genich_scripts' );


register_nav_menus( array(
    'main_header' => 'Основное меню',
    'main_footer' => 'ФУТЕР',
) );

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'site',
    array(
      'labels' => array(
          'name' => __( 'Сайты' ),
          'singular_name' => __( 'Сайт' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}

function your_prefix_register_taxonomy() {
  $args = array (
    'label' => 'Категории',
    'labels' => array(
      'menu_name' => 'Категории',
      'all_items' => esc_html__( 'Все категории', 'text-domain' ),
      'edit_item' => esc_html__( 'Редактировать категорию', 'text-domain' ),
      'view_item' => esc_html__( 'View category', 'text-domain' ),
      'update_item' => esc_html__( 'Update category', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new category', 'text-domain' ),
      'new_item_name' => esc_html__( 'New category', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent category', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent category:', 'text-domain' ),
      'search_items' => esc_html__( 'Search category', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular category', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate category with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove category', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used category', 'text-domain' ),
      'not_found' => esc_html__( 'No category found', 'text-domain' ),
      'name' => 'Категории',
      'singular_name' => 'Категория',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'dan-category',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'dan-category', array('site'), $args );
}
add_action( 'init', 'your_prefix_register_taxonomy');

function register_taxonomy_list() {
  $args = array (
    'label' => 'Подборки',
    'labels' => array(
      'menu_name' => 'Подборки',
      'all_items' => esc_html__( 'Все Подборки', 'text-domain' ),
      'edit_item' => esc_html__( 'Редактировать категорию', 'text-domain' ),
      'view_item' => esc_html__( 'View category', 'text-domain' ),
      'update_item' => esc_html__( 'Update category', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new category', 'text-domain' ),
      'new_item_name' => esc_html__( 'New category', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent category', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent category:', 'text-domain' ),
      'search_items' => esc_html__( 'Search category', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular category', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate category with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove category', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used category', 'text-domain' ),
      'not_found' => esc_html__( 'No category found', 'text-domain' ),
      'name' => 'Подборки',
      'singular_name' => 'Подборка',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'dan-list',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'dan-list', array('site'), $args );
}
add_action( 'init', 'register_taxonomy_list');

function editLoginPageTitle() {
  return 'sb.com.ru';
}

add_action('login_headertext', 'editLoginPageTitle');

function editLoginPageTitleUrl() {
  return 'http://sb.com.ru';
}

add_action('login_headerurl', 'editLoginPageTitleUrl');

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');

// Создаем скриншот (shortcode)
add_shortcode( 'snapshot', function ( $atts ) {
  $atts = shortcode_atts( array(
    'alt'    => '',
    'url'    => 'http://www.wordpress.org',
    'width'  => '400',
    'height' => '300'
  ), $atts );
  $params = array(
    'w' => $atts['width'],
    'h' => $atts['height'],
  );
  $url = urlencode( $atts['url'] );
  $src = 'http://s.wordpress.com/mshots/v1/' . $url . '?' . http_build_query( $params, null, '&' );

  $cache_key = 'snapshot_' . md5( $src );
  $data_uri = get_transient( $cache_key );
  if ( ! $data_uri ) {
    $response = wp_remote_get( $src );
    if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
      $image_data = wp_remote_retrieve_body( $response );
      if ( $image_data && is_string( $image_data ) ) {
        $src = $data_uri = 'data:image/jpeg;base64,' . base64_encode( $image_data );
        set_transient( $cache_key, $data_uri, DAY_IN_SECONDS );
      }
    }
  }

  return '<img src="' . esc_attr( $src ) . '" alt="' . esc_attr( $atts['alt'] ) . '" class="w-full h-48 object-cover object-top rounded-t-lg"/>';
} );