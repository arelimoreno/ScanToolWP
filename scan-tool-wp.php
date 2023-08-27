<?php
/* 
Plugin Name: ScanToolWP
Description: Plugin para scannear el estado general del sitio y  creación de libros
Version: 1.0 
Author: Luz Areli Moreno 
Author URI: https://github.com/arelimoreno
PHP Version:  5.6
*/

//Evita que un usuario externo ejecute codigo php desde la barra del navegador
if (!defined('ABSPATH')) {
  exit;
}

//Se definen la constante de la ruta de la carpeta del plugin
if (!defined('PATH_SCAN')) {
define('PATH_SCAN', plugin_dir_path(__FILE__));
}

if (!defined('URL_SCAN')) {
  define('URL_SCAN', plugin_dir_url(__FILE__));
}



//Archivos externos
require_once PATH_SCAN . 'includes/general.php';
require_once PATH_SCAN . 'books/post-books.php';


