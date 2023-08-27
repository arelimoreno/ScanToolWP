<?php

//Evita que un usuario externo ejecute codigo php desde la barra del navegador
if (!defined('ABSPATH')) {
  exit;
}


// function para crear el custom post type 
add_action('init', 'scantoolwp_register_post_type');
function scantoolwp_register_post_type() {

  // Libros 
  $labels = array(
    'name' => __('Libros', 'post type general name'),
    'singular_name' => __('Libro', 'post type singular name'),
    'add_new' => __('Añadir nuevo'),
    'add_new_item' => __('añadir nuevo libro'),
    'edit_item' => __('Editar libro'),
    'new_item' => __('Nuevo libro'),
    'view_item' => __('Ver libro'),
    'all_items' => __('Todos los libros'),
    'search_items' => __('Buscar libros'),
    'not_found' => __('No hay libros.'),
    'not_found_in_trash' => __('No hay libros en la papelera.')
  );

  $args = array(
    'labels' => $labels,
    'has_archive' => false,
    'public' => true,
    'hierarchical' => false,
    'menu_icon'    => 'dashicons-book',
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'thumbnail',
      'page-attributes'
    ),
    'rewrite'   => array('slug' => 'book'),
    'show_in_rest' => true
  );
  register_post_type('book', $args);
}


//Función para registrar las taxonomías al custom post type
add_action('init', 'scantoolwp_register_taxonomies');
function scantoolwp_register_taxonomies() {

  // Taxonomía género
  register_taxonomy('genre', 'book', array(
    "hierarchical" => true,
    "label" => "Género",
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'genre'),
    'public' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
    'show_in_nav_menus' => false
  ));

  // Taxonomía autor
  register_taxonomy('writer', 'book', array(
    "hierarchical" => true,
    "label" => "Autor",
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'writer'),
    'public' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
    'show_in_nav_menus' => false
  ));


  // Taxonomía Año publicación
  register_taxonomy('date', 'book', array(
    "hierarchical" => true,
    "label" => "Año publicación",
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'date'),
    'public' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
    'show_in_nav_menus' => false
  ));

}

// Validar si existe la función que crea el custom post type - libros
if (function_exists('scantoolwp_register_post_type')) {
  include_once PATH_SCAN  . 'books/shortcode-books.php';
}