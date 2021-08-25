<?php
function wordpressify_resources()
{
	wp_enqueue_style( 'google-fonts__poppins', '//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script('header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false);
	wp_enqueue_script('footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true);
}

add_action('wp_enqueue_scripts', 'wordpressify_resources');

function custom_excerpt_length()
{
	return 22;
}

add_filter('excerpt_length', 'custom_excerpt_length');

function wordpressify_setup()
{
	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');
	add_image_size('small-img', 960, 640, true);
	add_image_size('medium-img', 1280, 720, true);
	add_image_size('square-img', 80, 80, true);
	add_image_size('banner-image', 1920, 1080, true);
}

add_action('after_setup_theme', 'wordpressify_setup');

show_admin_bar(false);

function is_search_has_results()
{
	return 0 != $GLOBALS['wp_query']->found_posts;
}

function wordpressify_widgets()
{
	register_sidebar(
		[
			'name' => 'Sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		]
	);
}

add_action('widgets_init', 'wordpressify_widgets');


function cefet_features() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'cefet_features' );

function ignoreNodeModules($exclude_filters) {
    $exclude_filters[] = 'themes/cefet-memoria-theme/node_modules';
    return $exclude_filters;
  }
  
  
  add_filter( 'ai1wm_exclude_content_from_export', 'ignoreNodeModules' );


  //////////////////////////////// CUSTOM POST TYPES //////////////////////////////////////

function cefet_post_types() {
    register_post_type( 'epocas', array(
        'show_in_rest' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true, 
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'has_archive' => 'epocas',
        'public' => true,
        'labels' => array(
          'name' => 'Épocas',
          'add_new_item' => 'Incluir Época',
          'edit_item' => 'Editar Época',
          'all_itens' => 'Todos as Épocas',
          'singular_name' => 'Época'
        ),
        'menu_icon' => 'dashicons-backup'      
      ));

      register_post_type( 'registros', array(
        'show_in_rest' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true, 
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'taxonomies' => array( 'category' ),
        'has_archive' => 'historias',
        'public' => true,
        'labels' => array(
          'name' => 'Registros',
          'add_new_item' => 'Incluir Registro',
          'edit_item' => 'Editar Registro',
          'all_itens' => 'Todos os Registros',
          'singular_name' => 'Registro'
        ),
        'menu_icon' => 'dashicons-media-document'      
      ));
}

add_action( 'init', 'cefet_post_types' );

?>
