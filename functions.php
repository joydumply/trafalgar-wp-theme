<?php


function custom_theme_logo_support() {
  add_theme_support('custom-logo');
  add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme', 'custom_theme_logo_support');


function custom_excerpt_length() {
  return 17; 
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function custom_excerpt_more($more) {
  return '...'; 
}
add_filter('excerpt_more', 'custom_excerpt_more');

function custom_image_sizes() {
  add_image_size('hero', 693, 598, true); 
  add_image_size('testimonial_avatar', 141, 141, true); 
  add_image_size('post_thumbnails', 350, 246, true); 
}
add_action('after_setup_theme', 'custom_image_sizes');

function register_my_menus() {
  register_nav_menus(
      array(
          'header-menu' => __('Header Menu'),
          'footer-menu1'  => __('Footer Menu 1'),
          'footer-menu2'  => __('Footer Menu 2'),
          'footer-menu3'  => __('Footer Menu 3'),
      )
  );
}
add_action('init', 'register_my_menus');



function enqueue_webpack_scripts() {
  
  
  wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/css/slick.css');
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/build/main.min.css');
  
  wp_enqueue_script('slick-js', get_template_directory_uri().'/js/slick.min.js', array('jquery'), '1.8.1', true);
  wp_register_script('trafalgar-main-script', get_template_directory_uri() . '/js/build/main.min.js', array('jquery'), '1.0', true);
  wp_localize_script('trafalgar-main-script', 'ajax_params', array(
    'ajaxurl' => admin_url('admin-ajax.php')
  ));
  wp_enqueue_script('trafalgar-main-script');

    
}
add_action( 'wp_enqueue_scripts', 'enqueue_webpack_scripts' );



function load_more_services() {
  $offset = $_POST['offset'];
  $items_per_load = 3;

  $homepage_id = get_option('page_on_front');
  $service_items = get_field('services_service_item',$homepage_id);
  $response = array();

  if ($service_items) {
      $loaded_items = array_slice($service_items, $offset, $items_per_load);

      ob_start();
      foreach ($loaded_items as $item) {
        get_template_part('template-parts/content-service','item', array('item' => $item));
      }
      $response['items'] = ob_get_clean();

      $response['offset'] = $offset + $items_per_load;
      $response['hide_button'] = count($service_items) <= $offset + $items_per_load;
  }
    wp_send_json($response);
}

add_action('wp_ajax_load_more_services', 'load_more_services');
add_action('wp_ajax_nopriv_load_more_services', 'load_more_services');