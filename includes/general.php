<?php

//Evita que un usuario externo ejecute codigo php desde la barra del navegador
if (!defined('ABSPATH')) {
  exit;
}

// Variable logo plugin
if (!defined('IMG_SCAN')) {
  define('IMG_SCAN', URL_SCAN . '/admin/images/logo.png');
}

/*
 * Agrega el plugin de ScanToolWP al menu del administrador
 */

// Hook  'admin_menu'
add_action('admin_menu', 'scantoolwp_plugin_menu');

// Agregar Menu al administrador
function scantoolwp_plugin_menu() {

  $parent_slug = PATH_SCAN . 'admin/dashboard.php';

  add_menu_page('ScanToolWP','ScanToolWP', 'manage_options', $parent_slug ,'', 'dashicons-excerpt-view');
  add_submenu_page($parent_slug,'About', 'About', 'manage_options', PATH_SCAN . 'admin/about.php');
}

/*
 * Añade las hojas de estilo css y javaScript 
 */

// Agrega los estilos generales del admin del sitio
add_action("admin_enqueue_scripts", "scantoolwp_admin_style");
function scantoolwp_admin_style() {
  wp_enqueue_style('grid', URL_SCAN . 'admin/css/simple-grid.css');  
  wp_enqueue_style('admin_style', URL_SCAN . 'admin/css/style.css');   
}


// Agrega los estilos generales custom post type
add_action("wp_enqueue_scripts", "scantoolwp_post_style");
function scantoolwp_post_style() {
  
  wp_enqueue_style('books_style', URL_SCAN . 'books/css/style.css');
  wp_enqueue_script('books_script', URL_SCAN . '/books/js/script.js');
}
